<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\UserMeta;
use App\Models\Region;
use DB;

class RegionController extends AdminController {
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

     protected $region_rules;
     public function __construct()
     {
         parent::__construct();
         $this->class        = "region";
         $this->table        = "regions";
         $this->region_rules = array_merge($this->main_rules, [
             'shipping' => 'nullable|numeric',
             'city_id' => 'required|integer|exists:cities,id',
         ]);
     }

    public function index(Request $request) {
        $data = Region::with('city')->latest()->paginate($this->limit);
        $class= $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.regions.index', compact('route_create','data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create() {
        $class= $this->class;
        $lang = $this->user->locale;
        $cities= $this->getCities($lang);
        return view('admin.regions.create', compact('cities','class'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request) {
        $this->validate($request,$this->region_rules);
        $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'],$input['name_en']);
            Region::create($input);
            return redirect()->route('admin.regions.index')->with('success', __('Region created successfully'));
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
        $region = Region::find($id);
        if (!empty($region)) {
            $class= $this->class;
            $name_en = $name_ar = NULL;
            if(!empty($region->name)){
                $name_ar = $region->name['ar'];
                $name_en = $region->name['en'];
            }

            $lang = $this->user->locale;
            $cities= $this->getCities($lang);
            return view('admin.regions.edit', compact('cities','name_en','name_ar','region','class'));
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
        $region = Region::find($id);
        if (!empty($region)) {
            $this->validate($request,$this->region_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'],$input['name_en']);
            $region->update($input);
            return redirect()->route('admin.regions.index')->with('success', __('Region updated successfully'));
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
    //     $region = Region::find($id);
    //     if (!empty($region)) {
    //             Region::find($id)->delete();
    //             return redirect()->route('admin.regions.index')->with('success', __('Region deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

    public function search() {
        $country_multiple = $this->country_multiple;
        $country_id = $this->country_id;
        $data_all = Region::with('city')->latest()->get();
        $class= $this->class;

        return view('admin.regions.search', compact('data', 'class'));
    }

}
