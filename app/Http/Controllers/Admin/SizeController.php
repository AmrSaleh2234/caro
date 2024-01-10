<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends AdminController
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
        $this->class        = "size";
        $this->table        = "sizes";
    }

    public function index(Request $request)
    {
        $data = Size::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.sizes.index', compact('route_create','data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
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
        return view('admin.sizes.create', compact('order_id', 'class'));
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
        Size::create($input);
        return redirect()->route('admin.sizes.index')->with('success', __('Size created successfully'));
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
        $size = Size::find($id);
        if (!empty($size)) {
            $class = $this->class;
            $name_en = $name_ar = NULL;
            if (!empty($size->name)) {
                $name_ar = $size->name['ar'];
                $name_en = $size->name['en'];
            }
            return view('admin.sizes.edit', compact('name_en', 'name_ar', 'size', 'class'));
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
        $size = Size::find($id);
        if (!empty($size)) {
            $this->validate($request,$this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $size->update($input);
            return redirect()->route('admin.sizes.index')->with('success', __('Size updated successfully'));
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
    //     $size = Size::find($id);
    //     if (!empty($size)) {
    //             Size::find($id)->delete();
    //             return redirect()->route('admin.sizes.index')->with('success', __('Size deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
