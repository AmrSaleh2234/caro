<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use DB;

class Wallet extends SiteModelSoftDelete
{

    protected $fillable = [
        'user_id', 'wallet','order_id', 'type', 'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function insertWallet($user_id,$wallet,$order_id,$type,$active =1){
        $this->user_id      = $user_id;
        $this->wallet       = $wallet;
        $this->order_id     = $order_id;
        $this->type         = $type;
        $this->active       = $active;
        return $this->save();
    }

    public static function deleteUser($user_id) {
        return static::where('user_id', $user_id)->delete();
    }
}
