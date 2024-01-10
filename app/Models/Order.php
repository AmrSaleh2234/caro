<?php

namespace App\Models;
// use App\Observers\OrderObserver;
// use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Order extends SiteModel
{

    protected $table = 'orders';
    protected $fillable = [
         'user_id','cancel_by','cancel_date','user_id','cancel_date','store_id','delivery_id','address_id','order_reject_id','region_id','city_id','branch_id','coupon_id','country_id', 'payment_id','price', 'shipping', 'discount','total', 'paid', 'active','is_read','delivery_note','reject_note','admin_note','note', 'status','polygon'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class)->withTrashed();
    }

    public function delivery()
    {
        return $this->belongsTo(User::Class,'delivery_id')->withTrashed();
    }

    public function store()
    {
        return $this->belongsTo(User::Class,'store_id')->withTrashed();
    }

    public function cancelBy()
    {
        return $this->belongsTo(User::Class,'cancel_by')->withTrashed();
    }

    public function region()
    {
        return $this->belongsTo(Region::Class);
    }

    public function orderReject()
    {
        return $this->belongsTo(OrderReject::Class);
    }

    public function city()
    {
        return $this->belongsTo(City::Class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::Class);
    }

    public function address()
    {
        return $this->belongsTo(Address::Class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::Class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::Class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::Class);
    }

    public function rewiews()
    {
        return $this->hasMany(Review::Class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::Class);
    }

    public function orderMeta() {
        return $this->hasOne(OrderMeta::Class);
    }

    public function orderStatuses()
    {
        return $this->hasMany(OrderStatus::Class);
    }

    public function insertOrder($user_id,$price = 0,$discount = 0,$total = 0,$address_id = NULL,$coupon_id = NULL,$payment_id = NULL,
    $region_id = NULL,$city_id = NULL,$shipping = 0,$note = NULL,$paid = 0, $active = 1,$status = "request",$is_read = 0,$branch_id = NULL,$parent_id = NULL) {
        $this->user_id      = $user_id;
        $this->price        = $price;
        $this->shipping     = $shipping;
        $this->discount     = $discount;
        $this->total        = $total;
        $this->paid         = $paid;
        $this->active       = $active;
        $this->is_read      = $is_read;
        $this->status       = $status;
        $this->address_id   = $address_id;
        $this->coupon_id    = $coupon_id;
        $this->payment_id   = $payment_id;
        $this->region_id    = $region_id;
        $this->city_id      = $city_id;
        $this->branch_id    = $branch_id;
        $this->parent_id    = $parent_id;
        $this->note         = $note;
        return $this->save();
    }
    public static function updateOrder($id,$user_id,$price = 0,$discount = 0,$total = 0,$address_id = NULL,$coupon_id = NULL,$payment_id = NULL,
    $shipping = 0,$note = NULL,$paid = 0, $active = 1,$status = "request",$parent_id = NULL) {
        $order = static::findOrFail($id);
        $order->user_id      = $user_id;
        $order->price        = $price;
        $order->shipping     = $shipping;
        $order->discount     = $discount;
        $order->total        = $total;
        $order->paid         = $paid;
        $order->active       = $active;
        $order->status       = $status;
        $order->note         = $note;
        $order->address_id   = $address_id;
        $order->coupon_id    = $coupon_id;
        $order->payment_id   = $payment_id;
        $order->parent_id    = $parent_id;
        return $order->save();
    }
}
