<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
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
        $this->class = "category";
        $this->table = "categories";
    }

    public function index(Request $request)
    {
        $data = Category::whereNull('parent_id')->with('products','allChildrens','allChildrens.products')->defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $route_create = $this->checkPerm($this->table.".create");
        $category_type = 'all';
        return view('admin.categories.index', compact('data','category_type','route_create', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function trash(Request $request)
    {
        $data = Category::onlyTrashed()->with('products','allChildrens','allChildrens.products')->latest()->paginate($this->limit);
        $class = $this->class;
        return view('admin.categories.index', compact( 'data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
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
        $lang = $this->user->locale;
        $categories = $this->getCategories($lang, true);
        return view('admin.categories.create', compact('class', 'categories', 'order_id', 'image_active'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request, $this->main_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
        $input['link'] = str_random(8);
        $input['image'] = $this->getImage($input['image']);
        if ((int) $input['parent_id'] <= 0) {
            $input['parent_id'] = NULL;
        }
        Category::create($input);
        return redirect()->route('admin.categories.index')->with('success', __('Category created successfully'));
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
        // $category = Category::find($id);
        // if (!empty($category)) {
        // $input = $request->all();
        // $user_id = isset($input['user_id']) ? (int) $input['user_id'] : 0;
        // $data_all = Product::Join('users',function ($join){$join->on('users.id', 'products.user_id');});
        // if($this->type == "store" || $this->type == "famous"){
        //     $data_all->where('products.user_id',$this->user->id);
        // }
        // if(($this->type == "admin" || $this->type == "manger") && $user_id > 0){
        //         $data_all->where('products.user_id',$user_id);
        // }
        // $data= $data_all->Join('category_post',function ($join) use ($id) {$join->on('products.id', 'category_post.post_id')->where('category_post.category_id', $id);})
        //     ->select('products.*')->groupBy('products.id')->orderBy("products.name->".$this->user->locale)->paginate($this->limit);

        //     $class = "product";
        //     $type = $this->type;
        //     $post_delete =0;
        // if ($this->user->isAbleTo(['post-all','post-type-all','access-all'])) {
        //     $post_delete =1;
        // }
        // return view('admin.products.index', compact('post_delete','data','type','class'))->with('i', ($request->input('page', 1) - 1) * 5);
        // } else {
        //     return $this->pageError();
        // }
    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (!empty($category)) {
            $class = $this->class;
            $image_active = 1;
            $image = $category->image;
            $lang = $this->user->locale;
            $name_en = $name_ar = $content_en = $content_ar = NULL;
            $categories = $this->getCategories($lang, true, $id);
            if (!empty($category->name)) {
                $name_ar = $category->name['ar'];
                $name_en = $category->name['en'];
            }
            if (!empty($category->content)) {
                $content_ar = $category->content['ar'];
                $content_en = $category->content['en'];
            }
            return view('admin.categories.edit', compact('category', 'name_en', 'name_ar', 'content_en', 'content_ar', 'class', 'categories', 'image', 'image_active'));
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
        $category = Category::find($id);
        if (!empty($category)) {
            $this->validate($request, $this->main_rules);
            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                }
            }

            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
            $input['image'] = $this->getImage($input['image']);
            if ((int) $input['parent_id'] <= 0) {
                $input['parent_id'] = NULL;
            }
            $category->update($input);
            return redirect()->route('admin.categories.index')->with('success', __('Category updated successfully'));
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
        $category = Category::find($id);
        if (!empty($category)) {
            Category::find($id)->delete();
            return redirect()->route('admin.categories.index')->with('success', __('Category deleted successfully'));
        } else {
            return $this->pageError();
        }
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        $category = Category::find($id);
        if (!empty($category)) {
            return redirect()->route('admin.categories.trash')->with('success', __('Category restore successfully'));
        } else {
            return $this->pageError();
        }
    }

    // public function delete($id)
    // {
    //     Category::withTrashed()->where('id', $id)->forceDelete();
    //     return redirect()->route('admin.categories.trash')->with('success', __('Category deleted successfully'));
    // }

}
