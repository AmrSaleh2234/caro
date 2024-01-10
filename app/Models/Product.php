<?php

namespace App\Models;
use App\Traits\ProductFilterTrait;

//use Illuminate\Database\Eloquent\Model;

class Product extends SiteModelSoftDelete {

    use ProductFilterTrait;
    protected $table = 'products';
    protected $fillable = [
        'user_id','name', 'link','image','video', 'content','rate','rate_count','rate_all','code','parent_id', 'order_id','prepare_time',
        'max_amount','max_addition','max_addition_free','price','offer_price','offer','offer_type','type','start','skip',
        'offer_amount','offer_amount_add','offer_percent','filter','unit_id','brand_id','size_id','polish_id','color_id','active','status',
        'order_limit','is_late','is_size','is_max','order_max','date_start','date_expire','day_start','day_expire','sale','shipping', 'feature',
    ];
    protected $casts = [
        'name' => 'array',
        'content' => 'array'
    ];
    protected $appends = array('rate','offer_percent');

    public function getRateAttribute()
    {
        if ($this->rate_all > 0 && $this->rate_count > 0) {
            return division($this->rate_all, $this->rate_count);
        } else {
            return 0;
        }
    }

    public function getOfferPercentAttribute()
    {
        if ($this->offer > 0 && doubleval($this->offer_price) > 0 && doubleval($this->price) > 0 && doubleval($this->offer_price) > doubleval($this->price)) {
            return multiple(division(sub($this->offer_price, $this->price),$this->offer_price),100);
        } else {
            return 0;
        }
    }

    public function actions() {
        return $this->morphMany(Action::Class, 'actionable');
    }
    public function reviews() {
        return $this->hasMany(Review::Class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::Class);
    }

    public function productGalleries() {
        return $this->hasMany(ProductGallery::Class);
    }

    public function productMetas() {
        return $this->hasMany(ProductMeta::Class);
    }

    public function orders() {
        return $this->hasMany(OrderItem::Class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::Class);
    }

    public function categories() {
        return $this->belongsToMany(Category::Class);
    }

    public function additions() {
        return $this->belongsToMany(Addition::Class);
    }

    public function additionsFree() {
        return $this->additions()->where('price',0);
    }

    public function additionsPrice() {
        return $this->additions()->where('price','>',0);
    }

    public function childrens() {
        return $this->hasMany(Product::Class, 'parent_id')->where('active','>',0);
    }

    public function allChildrens() {
        return $this->hasMany(Product::Class, 'parent_id');
    }
    public function size() {
        return $this->belongsTo(Size::Class);
    }

    public function unit() {
        return $this->belongsTo(Unit::Class);
    }

    public function brand() {
        return $this->belongsTo(Brand::Class);
    }

    public function parent() {
        return $this->belongsTo(Product::Class, 'parent_id');
    }

    public function insertProduct($user_id,$name, $link, $image,$content = NULL,
    $shipping = 0,$active = 1,$order_id = 1, $feature = 1, $parent_id = NUll) {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->link = $link;
        $this->image = $image;
        $this->content = $content;
        // $this->price = $price;
        // $this->offer_price = $offer_price;
        // $this->offer = $offer;
        $this->shipping = $shipping;
        $this->active = $active;
        $this->parent_id = $parent_id;
        $this->order_id = $order_id;
        $this->feature = $feature;
        return $this->save();
    }

    public static function updateProduct($id, $name,  $image,$shipping,$content = NULL) {
        $product = static::findOrFail($id);
        $product->name = $name;
        $product->image = $image;
        // $product->price = $price;
        // $product->offer_price = $offer_price;
        // $product->offer = $offer;
        $product->shipping = $shipping;
        $product->content = $content;
        return $product->save();
    }

        public static function updatePriceOffer($id,$price,$offer_price) {
            $product = static::findOrFail($id);
            $product->price = $price;
            $product->offer_price = $offer_price;
            return $product->save();
        }

        public static function updatePrice($id,$price) {
            $product = static::findOrFail($id);
            $product->price = $price;
            return $product->save();
        }

        public static function updateMax($id,$max_amount) {
            $product = static::findOrFail($id);
            $product->max_amount = $max_amount;
            return $product->save();
        }


}

//return $this->belongsTo('\App\Models\User', 'foreign_key', 'other_key');
