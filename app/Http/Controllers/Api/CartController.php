<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartItemCollection;

class CartController extends ApiHomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $cart_items = CartItem::with('product','product.unit','productChild','productChild.size','cartItemAdditions','cartItemAdditions.addition')->where('cart_id', $this->cartID())->get();
            $data = ['cart_id' => $this->cartID(),'cart_total' => $this->cartTotalNumber(),'cart_amount' => $this->cartAmountNumber(),'cart_count' => $this->cartCount()];
            return $this->collectionResponse(new CartItemCollection($cart_items),$data,NULL,false);
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
        $save = $this->createCart($request);
        if ($save['status'] == $this->errorStatus) {
            if ($save['message'] == "validation_error") {
                return $this->validationErrorResponse($save['errors']);
            }
            return $this->errorResponse($save['message']);
        } else if ($save['status'] == $this->successStatus) {
            $data = $this->getCartResponse();
            if(isset($save['data'])){
                 $data += $save['data'];
            }
            return $this->successResponse($data,$save['message']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->index($request);
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
        $cart = Cart::find($id);
        if (!empty($cart) && $cart->user_id == $this->authUserID()) {
            $save = $this->saveCart($request);
            if ($save['status'] == $this->errorStatus) {
                if ($save['message'] == "validation_error") {
                    return $this->validationErrorResponse($save['errors']);
                }
                return $this->errorResponse($save['message']);
            } else if ($save['status'] == $this->successStatus) {
                return $this->successResponse($this->getCartResponse(),$save['message']);
            }
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
        $cart = Cart::find($id);
        if (!empty($cart) && $cart->user_id == $this->authUserID()) {
            $this->deleteCart($cart);
            return $this->successResponse($this->getCartResponse());
        } else {
            return $this->errorResponse();
        }
    }
}
