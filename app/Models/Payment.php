<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
//use DB;


class Payment extends SiteModelSoftDelete {

    protected $table = 'payments';
    protected $fillable = [
        'name','content','order_id','image','type','active'
    ];

    protected $casts = [
        'name' => 'array',
        'content' => 'array',
    ];

    public function orders() {
    return $this->hasMany(Order::Class);
    }

    public function insertPayment($name,$content, $image,$type = "cash",$active = 1) {
        $this->name     = $name;
        $this->content  = $content;
        $this->image    = $image;
        $this->type     = $type;
        $this->active   = $active;
        return $this->save();
    }

    public static function updatePayment($id,$name,$content, $image,$type = "cash",$active = 1) {
        $payment = static::findOrFail($id);
        $payment->name        = $name;
        $payment->content     = $content;
        $payment->image       = $image;
        $payment->type        = $type;
        $payment->active      = $active;
        return $payment->save();
    }


}
