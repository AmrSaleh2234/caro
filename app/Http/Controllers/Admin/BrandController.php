<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends AdminController
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
        $this->class = "brand";
        $this->table = "brands";
    }

    public function index(Request $request)
    {
        $data = Brand::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.brands.index', compact('data','route_create', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
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
        return view('admin.brands.create', compact('order_id', 'class'));
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
        $input['image'] = $this->getImage($input['image']);
        Brand::create($input);
        return redirect()->route('admin.brands.index')->with('success', __('Brand created successfully'));
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
        $brand = Brand::find($id);
        if (!empty($brand)) {
            $class = $this->class;
            $name_en = $name_ar = NULL;
            if (!empty($brand->name)) {
                $name_ar = $brand->name['ar'];
                $name_en = $brand->name['en'];
            }
            $image_active = 1;
            $image = $brand->image;
            return view('admin.brands.edit', compact('image_active', 'image','name_en', 'name_ar', 'brand', 'class'));
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
        $brand = Brand::find($id);
        if (!empty($brand)) {
            $this->validate($request,$this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['image'] = $this->getImage($input['image']);
            $brand->update($input);
            return redirect()->route('admin.brands.index')->with('success', __('Brand updated successfully'));
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
    //     $brand = Brand::find($id);
    //     if (!empty($brand)) {
    //             Brand::find($id)->delete();
    //             return redirect()->route('admin.brands.index')->with('success', __('Brand deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
