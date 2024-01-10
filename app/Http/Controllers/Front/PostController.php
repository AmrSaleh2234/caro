<?php

namespace App\Http\Controllers\Front;

use DB;
use App\Models\Cart;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\View;

class PostController extends FrontController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $title = __('Products') . $this->site_mark . $this->site_title;
        $lang  = $this->lang;
        $categories = $this->getCategories($lang,true,0,true,true);
        $input  = $request->all();
        $order_type     = 'ASC';
        $order_by       = 'name';
        $category_id    = isset($input['category_id']) ? (int) $input['category_id'] : 0;
        $offer          = isset($input['offer']) ? (int) $input['offer'] : -1;
        $price_min      = isset($input['price_min']) ? doubleval($input['price_min'])  : 0;
        $price_max      = isset($input['price_max']) ? doubleval($input['price_max'])  : 0;
        $search         = isset($input['search']) ? $input['search'] : '';
        $data_all = $this->getPostsSearch($lang,$this->user_id,$category_id,$search,-1,$offer,-1,-1,$price_min,$price_max);
        $products = $data_all->select($this->getDataPost($lang))->groupBy('posts.id')->orderBy("posts.name->".$lang, $order_type)->paginate($this->limit);
        $product_max = 0;
        $product_max_array = Post::orderBy('price','DESC')->first();
        if(!empty($product_max_array)){
            $product_max = $product_max_array->price;
        }
        $product_min = Post::min('price');
        $cart_id = Cart::foundCart($this->user_id);
        $cartItems  = $this->getAllCartItem($lang,$this->user_id,$cart_id);
        $class = 'product';
        return view('front.posts.index', compact('class','products','categories','category_id','product_min','product_max','price_min','price_max','offer','search','title','cartItems'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function single(Request $request,$link) {
        $product = Post::active()->where('link', $link)->first();
        $lang  = $this->lang;
        if (!empty($product)   && $product->active == 1){
            $title = $product->name[$lang] . $this->site_mark . $this->site_title;
            $class = 'product';
            // $products = $this->getPost($lang,$this->user_id,$product->id);
            return view('front.posts.single', compact( 'class','product', 'title'));
        }else{
            return $this->pageError();
        }
    }


}
