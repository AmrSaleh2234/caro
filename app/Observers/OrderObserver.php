<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderMeta;
use App\Events\OrderEvent;
use App\Traits\NotifiTrait;
use App\Traits\AdminHelperTrait;

class OrderObserver
{

    use NotifiTrait, AdminHelperTrait;
    public function created(Order $order)
    {

        $order->orderStatuses()->create([
            'status' => $order->status,
        ]);
        $user = NULL;
        if (auth('sanctum')->user()) {
            $user = auth('sanctum')->user();
        } elseif (auth()->guard()->check()) {
            $user = auth()->user();
        }

        app()->setLocale("en");
        $name_en = 'New Order #' . ' ' . $order->id;
        $content_ar = __("Thank you for your request. We will work hard to deliver the order as soon as possible and with the best quality");
        app()->setLocale("en");
        $name_ar = 'طلب جديد' . ' # ' . $order->id;
        $content_en = __("شكرا لطلبكم سنعمل جاهدين لتوصيل الطلب في اسرع وقت وبافضل جوده");
        app()->setLocale($user->locale);
        $title = $this->getName($name_ar, $name_en);
        $message = $this->getName($content_ar, $content_en);
        $this->notificationUser($user->id, $title, $message, "orders", "orders", $order->id, 'request');
        event(new OrderEvent($order->id));
    }

    public function updated(Order $order)
    {
        if ($order->isDirty('status')) {
            $order->orderStatuses()->create([
                'status' => $order->status,
            ]);
            $user = NULL;
            if (auth('sanctum')->user()) {
                $user = auth('sanctum')->user();
            } elseif (auth()->guard()->check()) {
                $user = auth()->user();
            }
            app()->setLocale("en");
            $data = $this->orderStatusMessage($order->status, $user->locale);
            app()->setLocale($user->locale);
            $this->notificationUser($order->user_id, $data['title'], $data['message'], "orders", "orders", $order->id, $order->status);
            if ($order->status == "delivered") {
                $paid = Order::where('user_id', $order->user_id)->where('status', 'delivered')->sum('paid');
                $total = Order::where('user_id', $order->user_id)->where('status', 'delivered')->sum('total');
                $wallet = sub($paid, $total);
                if ($wallet < 0) {
                    $wallet  = 0;
                }
                User::updateColumn($order->user_id, 'wallet', $wallet);
            }
            if (in_array($order->status, $this->order_status_failed_array)) {
                $order->update(['cancel_by'=>$user->id,'cancel_date'=>Carbon::now()]);
            }
        }

        if ($order->isDirty('delivery_id')) {
            $user = NULL;
            if (auth('sanctum')->user()) {
                $user = auth('sanctum')->user();
            } elseif (auth()->guard()->check()) {
                $user = auth()->user();
            }
            if((int) $order->delivery_id > 0){
                app()->setLocale("en");
                $data = $this->orderDeliveryMessage($order->id, $user->locale);
                app()->setLocale($user->locale);
                $this->notificationUser($order->delivery_id, $data['title'], $data['message'], "orders", "orders", $order->id, $order->status);

            }
        }
    }

    public function cancelOrderItem($order_id)
    {
        // $order_items = OrderItem::with('product')->where('order_id', $order_id)->where('amount', '>', 0)->where('price', '>', 0)->get();
        // if (!empty($order_items)) {
        //     foreach ($order_items as $items) {
        //         $items->post->increment("max_amount", $items->amount);
        //     }
        // }
    }
}
