<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $input  = $request->all();
            $category_id    = isset($input['category_id']) ? (int) $input['category_id'] : 0;
            $parent_id    = isset($input['parent_id']) ? (int) $input['parent_id'] : 0;
            $categories_all = Category::active();
            if($parent_id == 0){
                $categories_all->whereNull('parent_id');
            }else{
                $categories_all->where('parent_id',$parent_id);
            }
            if($category_id > 0){
                $categories_all->where('id',$category_id);
            }
            $categories =$categories_all->with('childrens')->defaultOrder()->paginate($this->limit);
            return $this->collectionResponse(new CategoryCollection($categories));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $this->successResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Category::where('id', $id)->with('childrens','products','products.unit','products.additions','products.childrens','products.childrens.size','products.cartItems')->first();
        $data = ['category' => new CategoryResource($category)];
        return $this->successResponse($data);
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
            return $this->successResponse();
        } else {
            return $this->errorResponse();
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
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }
}
