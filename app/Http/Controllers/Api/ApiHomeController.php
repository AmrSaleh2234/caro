<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Traits\CartTrait;
use App\Traits\CouponTrait;
use App\Traits\HelperTrait;
use App\Traits\NotifiTrait;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use App\Traits\AdminHelperTrait;
use App\Traits\ResponseMessageTrait;
use App\Traits\ValidatesRequestsTrait;
use Illuminate\Http\Request;
class ApiHomeController extends Controller
{
    use AdminHelperTrait,HelperTrait,NotifiTrait,CouponTrait,CartTrait,ApiResponseTrait,ResponseMessageTrait,ValidatesRequestsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    protected $address_type_array = ['house','work','other'];
    protected $site_mark = " - ";
    protected $site_language = "ar";
    protected $site_email,$site_phone,$site_url;
    protected $limit     = 10;
    protected $shipping  = 25;
    protected $min_order = 5;
    protected $max_order = 50;
    protected $lang_array = ['ar', 'en'];
    protected $site_open = "yes";
    protected $ssl_certificate = "no";
    public function __construct()
    {
        $site_open = $ssl_certificate = $site_language = $site_email = $site_phone = NULL;
        $min_order = $max_order = $shipping = 0;
        $option = Setting::whereIn('key', ['ssl_certificate','site_open','shipping', 'min_order', 'max_order','site_language', 'site_email', 'site_phone'])->pluck('value', 'key')->toArray();
        foreach ($option as $key => $value) {
            $$key = $value;
        }
        $this->site_url     = url('');
        $this->site_open = $site_open;
        $this->ssl_certificate     = $ssl_certificate;
        $this->site_language = $site_language;
        $this->site_email = $site_email;
        $this->site_phone = $site_phone;
        $this->min_order = $min_order;
        $this->max_order = $max_order;
        $this->shipping  = $shipping;
    }

    protected function getProductRangeResponse(){
        $product_max = $product_min =0;
        $product_max_array = Product::active()->orderBy('price', 'DESC')->first();
        if (!empty($product_max_array)) {
            $product_max = $product_max_array->price;
        }
        $product_min = Product::active()->min('price');
        return [
            'product_min'=>number_format($product_min,$this->getCurrencyViewShow(),'.', ''),'product_max'=>number_format($product_max,$this->getCurrencyViewShow(),'.', '')
        ];
    }

}
