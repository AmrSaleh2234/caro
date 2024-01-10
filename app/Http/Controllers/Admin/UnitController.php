<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends AdminController
{
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
    public function __construct()
    {
        parent::__construct();
        $this->class        = "unit";
        $this->table        = "units";
    }

    public function index(Request $request)
    {
        $data = Unit::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.units.index', compact('route_create','data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $class = $this->class;
        $order_id = 1;
        return view('admin.units.create', compact('order_id', 'class'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request,$this->main_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        Unit::create($input);
        return redirect()->route('admin.units.index')->with('success', __('Unit created successfully'));
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
    public function edit($id)
    {
        $unit = Unit::find($id);
        if (!empty($unit)) {
            $class = $this->class;
            $name_en = $name_ar = NULL;
            if (!empty($unit->name)) {
                $name_ar = $unit->name['ar'];
                $name_en = $unit->name['en'];
            }
            return view('admin.units.edit', compact('name_en', 'name_ar', 'unit', 'class'));
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
    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        if (!empty($unit)) {
            $this->validate($request,$this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $unit->update($input);
            return redirect()->route('admin.units.index')->with('success', __('Unit updated successfully'));
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
    //     $unit = Unit::find($id);
    //     if (!empty($unit)) {
    //             Unit::find($id)->delete();
    //             return redirect()->route('admin.units.index')->with('success', __('Unit deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
