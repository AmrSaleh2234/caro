<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use DB;

class CityController extends AdminController {
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $city_rules;
    public function __construct()
    {
        parent::__construct();
        $this->class        = "city";
        $this->table = "cities";
        $this->city_rules = array_merge($this->main_rules, [
            'shipping' => 'nullable|numeric',
        ]);
    }

    public function index(Request $request) {
        $data = City::with('country')->defaultOrder()->paginate($this->limit);
        $class= $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.cities.index', compact('route_create','data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create() {
        $class= $this->class;
        $lang = $this->user->locale;
        $countries= $this->getCountries($lang);
        return view('admin.cities.create', compact('countries','class'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request) {
        $this->validate($request,$this->main_rules);
        $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'],$input['name_en']);
            $input['country_id'] = 1;
            City::create($input);
        return redirect()->route('admin.cities.index')->with('success', __('City created successfully'));
    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show(Request $request, $id)
    {
        return $this->edit($id);
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit($id) {
        $city = City::find($id);
        if (!empty($city)) {
            $class= $this->class;
            $name_en = $name_ar = NULL;
            if(!empty($city->name)){
                $name_ar = $city->name['ar'];
                $name_en = $city->name['en'];
            }
            $lang = $this->user->locale;
            return view('admin.cities.edit', compact('name_en','name_ar','city','class'));
        } else {
            return $this->pageError();
        }
    }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function update(Request $request, $id) {
        $city = City::find($id);
        if (!empty($city)) {
            $this->validate($request,$this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'],$input['name_en']);
            $city->update($input);
            return redirect()->route('admin.cities.index')->with('success', __('City updated successfully'));
        } else {
            return $this->pageError();
        }
    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    // public function destroy($id) {
    //     $city = City::find($id);
    //     if (!empty($city)) {
    //             City::find($id)->delete();
    //             return redirect()->route('admin.cities.index')->with('success', __('City deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    public function search() {
        $data= City::with('country')->orderBy("name->".$this->user->locale)->get();
        $class= $this->class;
        return view('admin.cities.search', compact('data', 'class'));
    }

}
