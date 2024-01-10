<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;
use App\Models\Favoriteable;

class FavoriteController extends AdminController
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        parent::__construct();
        $this->class = "favorite";
        $this->table = "favorites";
    }



    public function index(Request $request) {

        $input = $request->all();
        $product_id = isset($input['product_id']) ? (int) $input['product_id'] : 0;
        $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        $data_all = Favorite::with('user','product')->latest();
        if (in_array($this->type, $this->user_admins)) {
            if($user_id > 0){
                $data_all->where('user_id',$user_id);
            }
            if($product_id > 0){
                $data_all->where('product_id',$product_id);
            }
        }
        $data = $data_all->where('favorite','yes')->paginate($this->limit);
        $class = "favorite";
        $user = $this->user;
        return view('admin.favorites.index', compact('data','class','user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

}
