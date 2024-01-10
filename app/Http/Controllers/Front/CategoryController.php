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

class CategoryController extends FrontController {

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
        $title = __('Categories') . $this->site_mark . $this->site_title;
        $lang  = $this->lang;
        $categories = $this->getCategories($lang,true,0,true);
        $products = $this->getPosts($lang,$this->user_id);
        $cart_id = Cart::foundCart($this->user_id);
        $cartItems  = $this->getAllCartItem($lang,$this->user_id,$cart_id);
        $class = 'category';
        return view('front.categories.index', compact('class', 'products', 'categories', 'title','cartItems'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function single(Request $request,$link) {
        $category = Category::active()->where('link', $link)->first();
        $lang  = $this->lang;
        if (!empty($category)   && $category->active == 1){
            $category_id = $category->id;
            $categories     = $this->getCategories($lang,false,$category_id,true);
            $data_all = $this->getPostsSearch($lang,$this->user_id,$category_id);
            $products = $data_all->select($this->getDataPost($lang))->groupBy('posts.id')->orderBy("posts.name->".$lang)->paginate($this->limit);
            $cart_id = Cart::foundCart($this->user_id);
            $cartItems  = $this->getAllCartItem($lang,$this->user_id,$cart_id);
            $title = $category->name[$lang] . $this->site_mark . $this->site_title;
            $class = 'category';
            return view('front.categories.index', compact('class','categories','category','products','title','cartItems'))->with('i', ($request->input('page', 1) - 1) * 5);
        }else{
            return $this->pageError();
        }
    }

}
