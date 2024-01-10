<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\StoreProductResource;
use App\Models\CarModel;
use App\Models\Polish;
use App\Models\Service;
use Exception;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $products = Product::with('childrens','childrens.size','unit')->defaultOrder()->paginate($this->limit);
            return $this->collectionResponse(new ProductCollection($products));
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
    public function store(StoreProductRequest $request)
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
        $product = Product::where('id', $id)->with('childrens','childrens.size','unit','additions','cartItems','cartItems.cartItemAdditions')->first();
        $data = ['product' => new ProductResource($product)];
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
        $product = Product::find($id);
        if (!empty($product)) {
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
        $product = Product::find($id);
        if (!empty($product)) {
            return $this->successResponse();
        } else {
            return $this->errorResponse();
        }
    }


    public function getByService(Service $service, Polish $polish , CarModel  $carModel)
    {
        return $this->successResponse(['data'=>Product::query()->where([
            ['type'=>$service->name],
            ['polish_id'=>$polish->id],
            ['size_id'=>$carModel->id],
        ])->get()]);
    }
}
