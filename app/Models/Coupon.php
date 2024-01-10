<?php

namespace App\Models;
use Carbon\Carbon;
use DB;
//use Illuminate\Database\Eloquent\Model;

    class Coupon extends SiteModel {

        protected $table = 'coupons';
        protected $fillable = [
            'name','content','code','type','discount','order_id','min_order','max_discount','day_start','day_expire',
            'use_count','use_limit','user_limit','count_used','date_start','date_expire','finish','active'
        ];

        protected $casts = [
            'name' => 'array',
            'content' => 'array',
        ];
        // public function users() {
        //     return $this->belongsToMany(User::Class)->withTrashed();
        // }

        public function groups() {
            return $this->belongsToMany(Group::Class)->where('type','coupons');
        }

        public function orders() {
        return $this->hasMany(Order::Class);
        }

        public function insertCoupon($name,$code,$discount,$min_order,$max_discount,$use_count,$count_used,$user_limit,$use_limit,$date_start,$date_expire,$content = NULL,$finish = 0,$active = 1,$type = "percentage") {
            $this->code         = $code;
            $this->name         = $name;
            $this->content      = $content;
            $this->type         = $type;
            $this->discount     = $discount;
            $this->min_order    = $min_order;
            $this->max_discount = $max_discount;
            $this->use_count    = $use_count;
            $this->count_used   = $count_used;
            $this->user_limit   = $user_limit;
            $this->use_limit    = $use_limit;
            $this->date_start   = $date_start;
            $this->date_expire  = $date_expire;
            $this->finish       = $finish;
            $this->active       = $active;
            return $this->save();
        }

        public static function updateCoupon($id,$name,$code,$discount,$min_order,$max_discount,$use_count,$count_used,$user_limit,$use_limit,$date_start,$date_expire,$content = NULL,$finish = 0,$active = 1,$type = "percentage") {
            $coupon = static::findOrFail($id);
            $coupon->code         = $code;
            $coupon->name         = $name;
            $coupon->content      = $content;
            $coupon->type         = $type;
            $coupon->discount     = $discount;
            $coupon->min_order    = $min_order;
            $coupon->max_discount = $max_discount;
            $coupon->use_count    = $use_count;
            $coupon->count_used   = $count_used;
            $coupon->user_limit   = $user_limit;
            $coupon->use_limit    = $use_limit;
            $coupon->date_start   = $date_start;
            $coupon->date_expire  = $date_expire;
            $coupon->finish       = $finish;
            $coupon->active       = $active;
            return $coupon->save();
        }

        public static function getCoupon($id,$name,$code,$discount,$use_count,$count_used,$date_start,$date_expire,$content = NULL,$finish = 0,$active = 1,$type = "percentage") {
            $coupon = static::findOrFail($id);
            $coupon->code         = $code;
            $coupon->name         = $name;
            $coupon->content      = $content;
            $coupon->type         = $type;
            $coupon->discount     = $discount;
            $coupon->use_count    = $use_count;
            $coupon->count_used   = $count_used;
            $coupon->date_start   = $date_start;
            $coupon->date_expire  = $date_expire;
            $coupon->finish       = $finish;
            $coupon->active       = $active;
            return $coupon->save();
        }

        /*
         *  Add Coupon Extra Methods
         */

        public static function checkVaild($copoun){
            self::finish();
            $vaild = self::where('code', $copoun)->active()->finish(0)->where('date_start','<=',new Carbon())->where('date_expire','>=',new Carbon())->first() ;
            if (isset($vaild)) {
                return $vaild->id;
            } else {
                return 0;
            }
        }

        public static function checkVaildID($id){
            self::finish();
            $vaild = self::where('id', $id)->active()->finish(0)->where('date_start','<=',new Carbon())->where('date_expire','>=',new Carbon())->first() ;
            if (isset($vaild)) {
                return $vaild->id;
            } else {
                return 0;
            }
        }

        public static function useCopoun($copoun){
            self::where('code',$copoun)->increment('use_count') ;
            self::finish() ;
        }

        public static function useCopounID($copoun_id){
            self::where('id',$copoun_id)->increment('use_count') ;
            self::finish() ;
        }


        public static function finish()
    {
        $date = date('Y-m-d h:i');
        self::active()->finish(0)->where(function ($query) use ($date) {
            $query->whereRaw("
                (use_limit > 0 and use_count >= use_limit)
             ")->OrWhereRaw("
                (use_limit = 0 and date_expire < '$date')
             ")->OrWhereRaw("
                date_expire < '$date'
             ");
        })->update(['finish' => 1]);
    }

    }

