<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\User;
use DB;

class PaymentController extends AdminController
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

    protected $payment_rules;
    public function __construct()
    {
        parent::__construct();
        $this->class = "payment";
        $this->table        = "payments";
        $this->payment__rules = array_merge($this->main_rules, [
            'type' => 'required|string',
        ]);
    }

    public function index(Request $request)
    {
        $data = Payment::defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        return view('admin.payments.index', compact('route_create', 'data','class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $class = $this->class;
        $image_active = $order_id = 1;
        return view('admin.payments.create', compact('order_id', 'image_active', 'class'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request, $this->payment_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
        $input['image'] = $this->getImage($input['image']);
        Payment::create($input);
        return redirect()->route('admin.payments.index')->with('success', __('Payment created successfully'));
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
        $payment = Payment::find($id);
        if (!empty($payment)) {
            $class = $this->class;
            $name_en = $name_ar = $content_en = $content_ar = NULL;
            $image = $payment->image;
            if (!empty($payment->name)) {
                $name_ar = $payment->name['ar'];
                $name_en = $payment->name['en'];
            }
            if (!empty($payment->content)) {
                $content_ar = $payment->content['ar'];
                $content_en = $payment->content['en'];
            }
            $image_active   = 1;
            $new = 0;
            return view('admin.payments.edit', compact('new', 'image', 'image_active', 'name_en', 'name_ar', 'content_en', 'content_ar', 'payment', 'class'));
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
        $payment = Payment::find($id);
        if (!empty($payment)) {
            $this->validate($request, $this->payment_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
            $input['image'] = $this->getImage($input['image']);
            $payment->update($input);
            return redirect()->route('admin.payments.index')->with('success', __('Payment updated successfully'));
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
    //     $payment = Payment::find($id);
    //     if (!empty($payment)) {
    //             Payment::find($id)->delete();
    //             return redirect()->route('admin.payments.index')->with('success', __('Payment deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
