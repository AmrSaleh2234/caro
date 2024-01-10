<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OrderStatus extends SiteModel {

    protected $table = 'order_statuses';
    protected $fillable = [
        'order_id','status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::Class);
    }

    public function insertStatus($order_id,$status = NULL) {

        $this->order_id = $order_id;
        $this->status     = $status;
        return $this->save();
    }

    public static function updateStatus($order_id,$status) {
        $meta = static::where('order_id', $order_id)->where('status', $status)->first();
        if (isset($meta)) {
            $meta->updated_at  = new Carbon();
            return $meta->save();
        } else {
            $insert = new OrderStatus();
            return $insert->insertStatus($order_id,$status);
        }

    }


}
