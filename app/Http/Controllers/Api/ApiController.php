<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PageCollection;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\CategoryCollection;

class ApiController extends ApiHomeController
{
    public function search(Request $request)
    {
        $user_type = $this->auhtUserType();
        if ($user_type == "delivery") {
            return $this->errorResponse();
        } else {
            $input  = $request->all();
            $input['category_id'] = (int) request('category_id', 0);
            $input['offer'] = (int) request('offer', -1);
            $input['feature'] = (int) request('feature', -1);
            $input['price_min'] = doubleval(request('price_min', 0));
            $input['price_max'] = doubleval(request('price_max', 0));
            $input['search'] = request('search', '');
            $order_type = request('order_type', 'ASC');
            $order_by = request('order_by', 'order_id');
            if ($order_type != "ASC") {
                $order_type = "DESC";
            }
            if ($order_by != "price" && $order_by != "name") {
                $order_by = "order_id";
            }
            $products = Product::active()->where('price', '>', 0)->filterSearch($input)->defaultOrder($order_by, $order_type)->with('childrens', 'childrens.size', 'unit')->paginate($this->limit);
            $categories = Category::active()->whereNull('parent_id')->with('childrens')->defaultOrder()->get();
            $data_collections = ['categories' => new CategoryCollection($categories)];
            $data = $this->getProductRangeResponse();
            return $this->collectionResponse(new ProductCollection($products), $data, $data_collections);
        }
    }

    public function home(Request $request)
    {
        $user_type = $this->auhtUserType();
        if ($user_type == "delivery" || $user_type == "store") {
            return $this->errorResponse();
        } else {
            $order_type = request('order_type', 'ASC');
            $order_by = request('order_by', 'order_id');
            if ($order_type != "ASC") {
                $order_type = "DESC";
            }
            if ($order_by != "price" && $order_by != "name") {
                $order_by = "order_id";
            }
            $features = Product::active()->where('price', '>', 0)->feature()->defaultOrder($order_by, $order_type)->with('childrens', 'childrens.size', 'unit')->paginate($this->limit);
            $offers = Product::active()->where('price', '>', 0)->offer()->defaultOrder($order_by, $order_type)->with('childrens', 'childrens.size', 'unit')->paginate($this->limit);
            $categories = Category::active()->whereNull('parent_id')->with('childrens')->defaultOrder()->get();
            $sliders = Page::active()->where('type', 'slider')->defaultOrder($order_by, $order_type)->with('product')->paginate($this->limit);
            $data_collections = ['sliders' => new PageCollection($sliders),'categories' => new CategoryCollection($categories), 'offers' => new ProductCollection($offers)];
            $user = $this->authUser();
            if (isset($user)) {
                $user = new UserResource($this->authUser());
            }

            $data = ['user' => $user, 'notification_count' => $this->unreadNotifications()];
            $data += $this->getOptionsResponse();
            $data += $this->getCartResponse();
            $data += $this->getProductRangeResponse();
            $data += $this->getSettingApi();
            return $this->collectionResponse(new ProductCollection($features), $data, $data_collections);
        }
    }

    public function homeDelivery(Request $request)
    {
        $orders = Order::latest()->with('user', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta')->currentOrder()->where('delivery_id', $this->authUserID())->paginate($this->limit);
        $data = ['user' => new UserResource($this->authUser()), 'notification_count' => $this->unreadNotifications(), 'order_status' => $this->order_status_array];
        $data += $this->getOrderResponse("delivery_id");
        return $this->collectionResponse(new OrderCollection($orders), $data);
    }

    public function homeStore(Request $request)
    {
        $orders = Order::latest()->with('user','store', 'delivery', 'cancelBy', 'orderReject', 'payment', 'coupon', 'orderMeta')->currentOrder()->where('delivery_id', $this->authUserID())->paginate($this->limit);
        $data = ['user' => new UserResource($this->authUser()), 'notification_count' => $this->unreadNotifications(), 'order_status' => $this->order_status_array];
        $data += $this->getOrderResponse("delivery_id");
        return $this->collectionResponse(new OrderCollection($orders), $data);
    }
}
