<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;
use App\Models\Order;
use DB;

class CouponController extends AdminController
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
        $this->class = "coupon";
        $this->table = "coupons";
    }

    public function index(Request $request)
    {
        $data = Coupon::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.coupons.index', compact('data','route_create', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $class = $this->class;
        $order_id= 1;
        return view('admin.coupons.create', compact('class','order_id'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar'       => 'required|string',
            'name_en'       => 'required|string',
            'code'          => 'nullable',
            'discount'      => 'required|numeric', //|min:1|max:100
            'use_limit'     => 'nullable|integer|min:0',
            'user_limit'    => 'nullable|integer|min:0',
            'count_used'    => 'nullable|integer|min:0',
            'min_order'     => 'nullable|numeric|min:0',
            'max_discount'  => 'nullable|numeric|min:0',
            'date_start'    => 'nullable|date',
            'date_expire'   => 'nullable|date|after_or_equal:date_start',
            'order_id' => 'required|integer|min:1|max:127',
            'finish'        => 'required|in:0,1',
            'active'        => 'required|in:0,1',
        ]);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                if ($input[$key] == "" && in_array($key, ['use_limit', 'user_limit', 'count_used', 'min_order', 'max_discount'])) {
                    $input[$key] = NULL;
                }
            }
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
        if ($input['code'] == "") {
            $input['code'] = str_random(8);
        }
        $input['use_count'] = 0;
        if ($input['type'] == "percentage" && $input['discount'] > 100) {
            $input['discount'] = 10;
        }
        Coupon::create($input);
        return redirect()->route('admin.coupons.index')->with('success', __('Coupon created successfully'));
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
        $coupon = Coupon::find($id);
        if (!empty($coupon)) {
            $class = $this->class;
            $name_en = $name_ar = $content_ar = $content_en = NULL;
            if (!empty($coupon->name)) {
                $name_ar = $coupon->name['ar'];
                $name_en = $coupon->name['en'];
            }
            if (!empty($coupon->content)) {
                $content_ar = $coupon->content['ar'];
                $content_en = $coupon->content['en'];
            }
            return view('admin.coupons.edit', compact('name_en', 'name_ar', 'content_en', 'content_ar', 'coupon', 'class'));
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
        $coupon = Coupon::find($id);
        if (!empty($coupon)) {
            $this->validate($request, [
                'name_ar'       => 'required|string',
                'name_en'       => 'required|string',
                'code'          => 'required|string',
                'discount'      => 'required|numeric', //|min:1|max:100
                'use_limit'     => 'nullable|integer|min:0',
                'user_limit'    => 'nullable|integer|min:0',
                'count_used'    => 'nullable|integer|min:0',
                'min_order'     => 'nullable|numeric|min:0',
                'max_discount'  => 'nullable|numeric|min:0',
                'date_start'    => 'required|date',
                'date_expire'   => 'required|date|after_or_equal:date_start',
                'order_id' => 'required|integer|min:1|max:127',
                'finish'        => 'required',
                'active'        => 'required',
            ]);

            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                    if ($input[$key] == "" && in_array($key, ['use_limit', 'user_limit', 'count_used', 'min_order', 'max_discount'])) {
                        $input[$key] = NULL;
                    }
                }
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
            if ($input['type'] == "percentage" && $input['discount'] >= 100) {
                $input['discount'] = 10;
            }
            $coupon->update($input);
            return redirect()->route('admin.coupons.index')->with('success', __('Coupon updated successfully'));
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
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if (!empty($coupon)) {
            Coupon::find($id)->delete();
            return redirect()->route('admin.coupons.index')->with('success', __('Coupon deleted successfully'));
        } else {
            return $this->pageError();
        }
    }
}
