<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        parent::__construct();
        $this->class        = "review";
        $this->table        = "reviews";
    }



    public function index(Request $request) {

        $input = $request->all();
        $product_id = isset($input['product_id']) ? (int) $input['product_id'] : 0;
        $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $order_id = isset($input['order_id']) ? (int) $input['order_id'] : 0;
        $rating = isset($input['rating']) ? (int) $input['rating'] : 0;
        $data_all = Review::with('user','order','product')->latest();
        if (in_array($this->type, $this->user_admins)) {
            if($user_id > 0){
                $data_all->where('user_id',$user_id);
            }
            if($order_id > 0){
                $data_all->where('order_id',$order_id);
            }
            if($product_id > 0){
                $data_all->where('product_id',$product_id);
            }
            if($rating > 0 && $rating <=5){
                $data_all->where('review',$rating);
            }
        }
        $data = $data_all->paginate($this->limit);
        $class = "review";
        $user = $this->user;
        if($product_id == 0){
            $product_id = NULL;
        }
        if($order_id == 0){
            $order_id = NULL;
        }
        if($user_id == 0){
            $user_id = NULL;
        }
        if($rating == 0){
            $rating = NULL;
        }
        return view('admin.reviews.index', compact('data','class','user','user_id','product_id','order_id','rating'))->with('i', ($request->input('page', 1) - 1) * 5);
    }


    // public function destroy($id) {
    //     $review = Review::find($id);
    //     if (!empty($review)) {
    //         Review::find($id)->delete();
    //             return redirect()->route('admin.reviews.index')->with('success', __('Review deleted successfully'));
    //     } else {
    //         return $this->pageError();
    //     }
    // }

}
