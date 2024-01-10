<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;

use App\Models\User;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AddressController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        parent::__construct();
        $this->class = "address";
        $this->table = "addresses";
    }



    public function index(Request $request)
    {
        $input = $request->all();
        $city_id    = isset($input['city_id']) ? (int) $input['city_id'] : 0;
        $user_id    = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $region_id  = isset($input['region_id']) ? (int) $input['region_id'] : 0;
        $data_all = Address::latest()->with('user', 'city', 'region');
        if (in_array($this->type, $this->user_admins)) {
            if ($user_id > 0) {
                $data_all->where('user_id', $user_id);
            }
            if ($city_id > 0) {
                $data_all->where('city_id', $city_id);
            }
            if ($region_id > 0) {
                $data_all->where('region_id', $region_id);
            }
        }
        $data = $data_all->paginate($this->limit);
        $route_create = $this->checkPerm($this->table . ".create");
        $class = $this->class;
        $user = $this->user;
        return view('admin.addresses.index', compact('data', 'route_create', 'class', 'user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create(Request $request)
    {
        $input = $request->all();
        $city_id = isset($input['city_id']) ? (int) $input['city_id'] : 0;
        $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $users = $this->getClients();
        $class = $this->class;;
        $lang = $this->user->locale;
        $cities = $this->getCities($lang);
        $regions = $this->getRegions($lang);
        $new = 1;
        return view('admin.addresses.create', compact('class', 'new', 'city_id', 'user_id', 'cities', 'regions', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'address' => 'required',
            // 'city_id' => 'required',
            'user_id' => 'required|integer|exists:users,id',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            if ($input[$key] == "" || $input[$key] <= 0) {
                $input[$key] = NULL;
            }
        }
        $input['geo_address'] = $input['address'];
        Address::create($input);
        return redirect()->route('admin.addresses.index')->with('success', __('Address created successfully'));
    }

    public function edit($id)
    {

        $model = Address::find($id);
        if (!empty($model)) {
            $class = 'address';
            $users = User::active()->select('name', 'phone_code', 'phone', 'id')->get();
            $lang = $this->user->locale;
            $cities = $this->getCities($lang);
            $regions = $this->getRegions($lang);
            $new = 0;
            return view('admin.addresses.edit', compact('class', 'new', 'city_id', 'user_id', 'users', 'model', 'cities', 'regions'));
        } else {
            return $this->pageError();
        }
    }

    public function update(Request $request, $id)
    {

        $address = Address::find($id);
        if (!empty($address)) {
            $this->validate($request, [
                'type' => 'required',
                'address' => 'required',
                // 'city_id' => 'required',
                // 'user_id' => 'required|integer|exists:users,id',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                if ($input[$key] == "" || $input[$key] <= 0) {
                    $input[$key] = NULL;
                }
            }
            $input = Arr::except($input, array('user_id'));
            $address->update($input);
            return redirect()->route('admin.addresses.index')->with('success', __('Address updated successfully'));
        } else {
            return $this->pageError();
        }
    }

    public function destroy($id)
    {
        $address = Address::find($id);
        if (!empty($address)) {
            // Address::find($id)->delete();
            // return redirect()->route('admin.addresses.index')->with('success', __('Address deleted successfully'));
        } else {
            return $this->pageError();
        }
    }

}
