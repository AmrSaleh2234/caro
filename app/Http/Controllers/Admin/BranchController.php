<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Branch;
use App\Models\City;
use App\Models\Region;
use Illuminate\Support\Str;

class BranchController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    protected $branch_rules;
    public function __construct()
    {
        parent::__construct();
        $this->class = "branch";
        $this->table = "branches";
        $this->branch_rules = array_merge($this->main_rules, [
            'address_ar' => 'required|string',
            'address_en' => 'required|string',
            // 'city_id' => 'required|integer|exists:cities,id',
            // 'region_id' => 'required|integer|exists:regions,id',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
        ]);
    }



    public function index(Request $request)
    {
        $input = $request->all();
        $country_id = isset($input['country_id']) ? (int) $input['country_id'] : 0;
        $city_id = isset($input['city_id']) ? (int) $input['city_id'] : 0;
        $region_id = isset($input['region_id']) ? (int) $input['region_id'] : 0;
        $data_all = Branch::with('region', 'city', 'country')->latest();
        if (in_array($this->type, $this->user_admins)) {
            if ($region_id > 0) {
                $data_all->where('region_id', $region_id);
            }
            if ($city_id > 0) {
                $data_all->where('city_id', $city_id);
            }
            if ($country_id > 0) {
                $data_all->where('country_id', $country_id);
            }
        }
        $data = $data_all->paginate($this->limit);
        $class = $this->class;
        $user = $this->user;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.branches.index', compact('data', 'route_create','class', 'user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create(Request $request)
    {
        $class = $this->class;
        $lang = $this->user->locale;
        $cities = $this->getCities($lang);
        $regions = $this->getRegions($lang);
        $image_active = $order_id =1;
        return view('admin.branches.create', compact('class','order_id', 'image_active'));
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->branch_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['address'] = $this->getName($input['address_ar'], $input['address_en']);
        $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
        $input['image'] = $this->getImage($input['image']);
        // $city = Region::find($input['region_id']);
        // $input['city_id'] = $city->city_id;
        $input['country_id'] = 1;
        Branch::create($input);
        return redirect()->route('admin.branches.index')->with('success', __('Branch created successfully'));
    }

    public function show(Request $request, $id)
    {
        return $this->edit($id);
    }
    public function edit($id)
    {

        $branch = Branch::find($id);
        if (!empty($branch)) {
            $class = $this->class;
            $lang = $this->user->locale;
            $cities = $this->getCities($lang);
            $regions = $this->getRegions($lang);
            $image_active = 1;
            $image = $branch->image;
            $name_en = $name_ar = $address_en = $address_ar = $content_en = $content_ar = NULL;
            if (!empty($branch->address)) {
                $address_ar = $branch->address['ar'];
                $address_en = $branch->address['en'];
            }
            if (!empty($branch->name)) {
                $name_ar = $branch->name['ar'];
                $name_en = $branch->name['en'];
            }
            if (!empty($branch->content)) {
                $content_ar = $branch->content['ar'];
                $content_en = $branch->content['en'];
            }
            return view('admin.branches.edit', compact(
                'class',
                'branch',
                'name_en',
                'name_ar',
                'address_en',
                'address_ar',
                'content_en',
                'content_ar',
                'image',
                'image_active'
            ));
        } else {
            return $this->pageError();
        }
    }

    public function update(Request $request, $id)
    {

        $branch = Branch::find($id);
        if (!empty($branch)) {
            $this->validate($request,$this->branch_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['address'] = $this->getName($input['address_ar'], $input['address_en']);
            $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
            $input['image'] = $this->getImage($input['image']);
            // $city = Region::find($input['region_id']);
            // $input['city_id'] = $city->city_id;
            $branch->update($input);
            return redirect()->route('admin.branches.index')->with('success', __('Branch updated successfully'));
        } else {
            return $this->pageError();
        }
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        if (!empty($branch)) {
            Branch::find($id)->delete();
            return redirect()->route('admin.branches.index')->with('success', __('Branch deleted successfully'));
        } else {
            return $this->pageError();
        }
    }
}
