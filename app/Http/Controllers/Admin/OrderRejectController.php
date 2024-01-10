<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OrderReject;

class OrderRejectController extends AdminController
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
        $this->class        = "order_reject";
        $this->table        = "order_rejects";
    }

    public function index(Request $request)
    {
        $data = OrderReject::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.order_rejects.index', compact('route_create','data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
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
        return view('admin.order_rejects.create', compact('order_id', 'class'));
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
        OrderReject::create($input);
        return redirect()->route('admin.order_rejects.index')->with('success', __('OrderReject created successfully'));
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
        $order_reject = OrderReject::find($id);
        if (!empty($order_reject)) {
            $class = $this->class;
            $name_en = $name_ar = NULL;
            if (!empty($order_reject->name)) {
                $name_ar = $order_reject->name['ar'];
                $name_en = $order_reject->name['en'];
            }
            return view('admin.order_rejects.edit', compact('name_en', 'name_ar', 'order_reject', 'class'));
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
        $order_reject = OrderReject::find($id);
        if (!empty($order_reject)) {
            $this->validate($request,$this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $order_reject->update($input);
            return redirect()->route('admin.order_rejects.index')->with('success', __('OrderReject updated successfully'));
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
    //     $order_reject = OrderReject::find($id);
    //     if (!empty($order_reject)) {
    //             OrderReject::find($id)->delete();
    //             return redirect()->route('admin.order_rejects.index')->with('success', __('OrderReject deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
