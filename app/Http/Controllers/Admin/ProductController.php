<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CategoryProduct;
use App\Models\AttributeProduct;
use App\Models\ProductGallery;
use DB;

class ProductController extends AdminController
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
    protected $product_rules =[
        'name_ar' => 'required',
        'name_en' => 'required',
        'order_id' => 'required|integer|min:1|max:127',
        'active' => 'required|in:0,1',
        'unit_id' => 'required|integer|exists:units,id',
        'categories' => 'required|array|exists:categories,id',
        'additions' => 'nullable|array|exists:additions,id',
        'price' => 'required|numeric',
        'start' => 'required|numeric',
        'skip' => 'required|numeric',
        'order_limit' => 'required|numeric|min:1|max:999',
        'offer_price' => 'nullable|required_if:offer,1|numeric',
        // 'max_amount' => 'required|numeric|min:1',
        // 'order_max' => 'nullable|required_if:is_max,1|numeric',
        // 'date_start'    => 'nullable|required_if:is_max,1|date',
        // 'date_expire'   => 'nullable|required_if:is_max,1|date|after_or_equal:date_start',
    ];
    public function __construct()
    {
        parent::__construct();
        $this->class        = "product";
        $this->table        = "products";
    }

    public function index(Request $request)
    {

        // $filter = isset($input['filter']) ? (int) $input['filter'] : -1;
        // $sale   = isset($input['sale']) ? (int) $input['sale'] : -1;
        // $new   = isset($input['new']) ? (int) $input['new'] : -1;
        // $is_late= isset($input['is_late']) ? (int) $input['is_late'] : -1;
        // $is_max = isset($input['is_max']) ? (int) $input['is_max'] : -1;
        // if ($sale > -1) {
        //     $data_all->where('sale', $sale);
        // }
        // if ($filter > -1) {
        //     $data_all->where('filter', $filter);
        // }
        // if ($is_late > -1) {
        //     $data_all->where('is_late', $is_late);
        // }
        // if ($is_max > -1) {
        //     $data_all->where('is_max', $is_max);
        // }
        $input = $request->all();
        $limit = isset($input['limit']) ? $input['limit'] : $this->limit;
        $category_id = isset($input['category_id']) ? (int) $input['category_id'] : 0;
        $unit_id = isset($input['unit_id']) ? (int) $input['unit_id'] : 0;
        $feature= isset($input['feature']) ? (int) $input['feature'] : -1;
        $offer  = isset($input['offer']) ? (int) $input['offer'] : -1;
        $active  = isset($input['active']) ? (int) $input['active'] : -1;
        $price_min = isset($input['price_min']) ? doubleval($input['price_min']) : 0;
        $price_max = isset($input['price_max']) ? doubleval($input['price_max']) : 0;
        $code = isset($input['code']) ? $input['code'] : '';
        $name = isset($input['name']) ? $input['name'] : '';
        $data_all = Product::whereNull('parent_id')->defaultOrder()->with('categories');
        if ($category_id > 0) {
            $data_all->whereHas('categories', function ($join) use ($category_id) {
                $join->where('id', $category_id);
            });
        }
        if ($feature > -1) {
            $data_all->where('feature', $feature);
        }
        if ($offer > -1) {
            $data_all->where('offer', $offer);
        }
        if ($active > -1) {
            $data_all->where('active', $active);
        }
        if ($price_min > 0) {
            $data_all->where('price', '>=', $price_min);
        }
        if ($price_max > 0 && $price_max > $price_min) {
            $data_all->where('price', '<=', $price_max);
        }
        if ($unit_id > 0) {
            $data_all->where('unit_id', $unit_id);
        }
        if ($name != '' && $name != 'ar' && $name != 'en') {
            $data_all->where(function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
                //->orWhere('products.content', 'like', '%' . $name . '%');
            });
        }
        if ($code != '' && $code != 'ar' && $code != 'en') {
            $data_all->where(function ($query) use ($code) {
                $query->where('code', 'like', '%' . $code . '%');
            });
        }
        if ($limit > 0) {
            $data = $data_all->paginate($limit);
        } else {
            $count = $data_all->count();
            $data = $data_all->paginate($count);
        }
        $lang = $this->user->locale;
        $categories = $this->getAllCategories($lang, true);
        $units = $this->getUnits($lang, true);
        $route_create = $this->checkPerm($this->table.".create");
        $class = $this->class;
        $product_type = 'all';
        return view('admin.products.index', compact(
            'units',
            'data',
            'class',
            'product_type',
            'limit',
            'categories',
            'route_create'
        ))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function trash(Request $request)
    {
        $data = Product::onlyTrashed()->defaultOrder()->paginate($this->limit);
        $class = $this->class;
        $product_delete = 1;
        return view('admin.products.index', compact('product_delete', 'data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        $class = $this->class;
        $user = $this->user;
        $type = $this->type;
        $image = $name_en = $name_ar = $content_en = $content_ar = NULL;
        $product_category = $product_addition = $product_galleries = $childrens = [];
        $image_active  = $new = $order_id = $start = $skip =1;
        $lang = $this->user->locale;
        $image_count = $childrens_count = 0;
        $categories = $this->getAllCategories($lang);
        $units = $this->getUnits($lang,true);
        $additions = $this->getAdditions($lang);
        $order_limit = 100;
        $sizes = $this->getSizes($lang);
        return view('admin.products.create', compact('order_limit','sizes','childrens','childrens_count','order_id','start','skip','image_count','product_addition','additions','units','product_galleries','class', 'type', 'user', 'new', 'name_en', 'name_ar', 'content_en', 'content_ar', 'categories', 'product_category', 'image', 'image_active'));
    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {
        $this->validate($request,$this->product_rules);
        $input = $request->all();
        foreach ($input as $key => $value) {
            if ($key != "content_en" && $key != "content_ar" && $key != "childrens" && $key != "additions" && $key != "categories" && $key != "all_image") {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                if ($input[$key] == "") {
                        $input[$key] = NULL;
                }
            }
        }

        $input['link'] = str_random(8);
        $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
        $input['content'] = $this->getContent($input['content_ar'], $input['content_en']);
        $input['image'] = $this->getImage($input['image']);
        $input['price'] = round($input['price'],$this->getCurrencyViewShow());
        if ($input['offer_price'] != NULL) {
            $input['offer_price'] = round($input['offer_price'], $this->getCurrencyViewShow());
        }
        if(doubleval($input['price'] ) >= doubleval($input['offer_price'])){
            $input['offer'] = 0;
        }
        $product = Product::create($input);
        $categories = isset($input['categories']) ? $input['categories'] : array();
        $additions = isset($input['additions']) ? $input['additions'] : array();
        $all_image = isset($input['all_image']) ? $input['all_image'] : array();
        $childrens = isset($input['childrens']) ? $input['childrens'] : array();
        $this->insertImage($all_image, $product->id);
        $this->insertChilderns($childrens, $product->id);
        $product->categories()->sync($categories);
        $product->additions()->sync($additions);
        $product->additions()->sync($additions);
        $childrens_count = $product->childrens()->count();
        if($childrens_count > 0){
            $product->update(['is_size'=>1]);
        }
        return redirect()->route('admin.products.index')->with('success', __('Product created successfully'));
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
        // $product = Product::find($id);
        // if (!empty($product)) {
        //     $data = OrderItem::latest('order_id')->where('product_id', $id)->paginate($this->limit);
        //     $class = "order";
        //     return view('admin.orders.show', compact('data', 'class'))->with('i', ($request->input('page', 1) - 1) * 5);
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
        $product = Product::find($id);
        if (!empty($product)) {
            $class = $this->class;
            $user = $this->user;
            $type = $this->type;
            $image_active = 1;
            $new = 0;
            $image = $product->image;
            $lang = $this->user->locale;
            $name_en = $name_ar = $content_ar  = $content_en = NULL;
            $lang = $this->user->locale;
            $categories = $this->getAllCategories($lang);
            $product_category = $product->categories->pluck('id', 'id')->toArray();
            $product_addition = $product->additions->pluck('id', 'id')->toArray();
            if (!empty($product->name)) {
                $name_ar = $product->name['ar'];
                $name_en = $product->name['en'];
            }
            if (!empty($product->content)) {
                $content_ar = $product->content['ar'];
                $content_en = $product->content['en'];
            }
            $new = 0;
            $product_galleries = $product->productGalleries;
            $image_count = $product->productGalleries()->count();
            $units = $this->getUnits($lang,true);
            $additions = $this->getAdditions($lang);
            $childrens = $product->allChildrens;
            $childrens_count = $product->allChildrens()->count();
            $sizes = $this->getSizes($lang);
            return view('admin.products.edit', compact('product','product','childrens','sizes','childrens_count','product_addition','additions','units','image_count','product_galleries','class', 'type', 'user', 'new', 'name_en', 'name_ar', 'content_en', 'content_ar', 'categories', 'product_category', 'image', 'image_active'));
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
        $product = Product::find($id);
        if (!empty($product)) {
            // $product_update_rules = array_merge($this->product_rules, [
            //     'link' => 'required',
            // ]);
            $this->validate($request,$this->product_rules);

            $input = $request->all();
            foreach ($input as $key => $value) {
                if ($key != "content_en" && $key != "content_ar" && $key != "childrens" && $key != "additions" && $key != "categories" && $key != "all_image") {
                    $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
                    if ($input[$key] == "") {
                        if ($key == "start" || $key == "skip") {
                            $input[$key] = 1;
                        } else {
                            $input[$key] = NULL;
                        }
                    }
                }
            }
            $input['price'] = round($input['price'], $this->getCurrencyViewShow());
            if ($input['offer_price'] != NULL) {
                $input['offer_price'] = round($input['offer_price'], $this->getCurrencyViewShow());
            }
            if(doubleval($input['price'] ) >= doubleval($input['offer_price'])){
                $input['offer'] = 0;
            }
            $input['name'] = $this->getName($input['name_ar'], $input['name_en']);
            $input['content'] = $this->getName($input['content_ar'], $input['content_en']);
            $input['image'] = $this->getImage($input['image']);
            $product->update($input);
            $all_image = isset($input['all_image']) ? $input['all_image'] : array();
            $childrens = isset($input['childrens']) ? $input['childrens'] : array();
            $this->insertChilderns($childrens, $id);
            $ids = $this->insertImage($all_image, $id);
            ProductGallery::where('product_id', $id)->whereNotIn('id', $ids)->delete();
            $categories = isset($input['categories']) ? $input['categories'] : array();
            $additions = isset($input['additions']) ? $input['additions'] : array();
            $product->categories()->sync($categories);
            $product->additions()->sync($additions);
            $childrens_count = $product->childrens()->count();
            $is_size= 0;
            if($childrens_count > 0){
                $is_size = 1;
            }
            $product->update(['is_size'=>$is_size]);
            return redirect()->route('admin.products.index')->with('success', __('Product updated successfully'));
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
        $product = Product::find($id);
        if (!empty($product)) {
            Product::find($id)->delete();
            return redirect()->route('admin.products.index')->with('success', __('Product deleted successfully'));
        } else {
            return $this->pageError();
        }
    }


    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        $product = Product::find($id);
        if (!empty($product)) {
            return redirect()->route('admin.products.trash')->with('success', __('Product restore successfully'));
        } else {
            return $this->pageError();
        }
    }

    // public function delete($id)
    // {
    //     Product::withTrashed()->where('id', $id)->forceDelete();
    //     return redirect()->route('admin.products.trash')->with('success', __('Product deleted successfully'));
    // }

    public function insertImage($images, $product_id)
    {
        $ids = [];
        if (!empty($images)) {
            foreach ($images as $images_value) {
                $image_insert = new ProductGallery();
                $image = $this->getImage(stripslashes(trim(filter_var($images_value['image_link'], FILTER_SANITIZE_STRING))));
                $id = (int) stripslashes(trim(filter_var($images_value['image_link'], FILTER_SANITIZE_STRING)));
                if ($image != "") {
                    if ($id > 0) {
                        $gallery = ProductGallery::find($id);
                        $gallery->update(['image', $image]);
                        $ids[$id] = $id;
                    } else {
                        $image_insert->insertProductGallery($product_id,$image);
                        $ids[$image_insert->id] = $image_insert->id;
                    }
                }
            }
        }
        return $ids;
    }

    public function insertChilderns($childrens, $product_id)
    {
        $ids = [];
        if (!empty($childrens)) {
            foreach ($childrens as $childrens_value) {
                $product_insert = new Product();
                $input['size_id'] = (int) stripslashes(trim(filter_var($childrens_value['size_id'], FILTER_SANITIZE_STRING)));
                $input['active'] = (int) stripslashes(trim(filter_var($childrens_value['active'], FILTER_SANITIZE_STRING)));
                $input['price'] = doubleval(stripslashes(trim(filter_var($childrens_value['price'], FILTER_SANITIZE_STRING))));
                $id = (int) stripslashes(trim(filter_var($childrens_value['id'], FILTER_SANITIZE_STRING)));
                if ($input['price'] >0  && $input['size_id'] > 0) {
                    if ($id > 0) {
                        $update_child = Product::where('id',$id)->where('parent_id',$product_id)->first();
                        $update_child->update($input);
                    } else {
                        $input['parent_id'] = $product_id;
                        $input['name'] = $this->getNameNull();
                        $input['content'] = $this->getNameNull();
                        $product_insert->create($input);

                    }
                }
            }
        }
        return $ids;
    }
}
