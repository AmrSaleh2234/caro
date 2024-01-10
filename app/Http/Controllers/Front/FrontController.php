<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Traits\HelperTrait;
use App\Traits\NotifiTrait;
use App\Traits\ChartTrait;
use App\Traits\ApiTrait;
use App\Traits\ApiDataTrait;
use Request;
use DB;
class FrontController extends Controller
{
    use ChartTrait,HelperTrait,NotifiTrait,ApiTrait,ApiDataTrait;
    protected $user,$user_id,$lang,$admin_url,$site_url,$site_email,$site_phone,$class,$site_mark,$site_title;
    protected $ssl_certificate = "no";
    protected $languages = ["en", "ar"];
    protected $success = 'success';
    protected $error = 'error';
    protected $limit     = 12;
    protected $shipping  = 25;
    protected $min_order = 5;
    protected $max_order = 50;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting_all = DB::table('settings')->pluck('value', 'key')->toArray();
        foreach ($setting_all as $key => $value) {
            $$key = $value;
        }
        // $limit = is_numeric($table_limit) ? $table_limit : 50;
        $this->admin_url    = $admin_url;
        $this->site_url     = url('');
        $this->site_title   = $site_title;
        $this->site_phone   = $site_phone;
        $this->site_email   = $site_email;
        $this->site_mark    = " - ";
        $this->ssl_certificate = $ssl_certificate;
        $this->class        = "user";
        $this->user         = NULL;
        $this->user_id      = 0;
        $this->lang         = $site_language;
        $this->min_order = $min_order;
        $this->max_order = $max_order;
        $this->shipping  = $shipping;
        $this->middleware(function ($request, $next) {
            if(auth()->user()){
            $this->user         = auth()->user();
            $this->lang         = $this->user->locale;
            $this->user_id      = $this->user->id;
            }
            return $next($request);
        });

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSiteLang($request,$user){
        if(isset($user)){
            $lang = $user->locale;
        }else{
            $lang = (in_array($request->segment(1), $this->languages)) ? $request->segment(1) : "en";
        }
        return $lang;
    }
    public function pageError()
    {
        return view('front.errors.404');
    }

    public function pageUnauthorized()
    {
        return view('front.errors.unauthorized');
    }

    public function getTypeInput($request, $default = "client", $type_array = ['client', 'manger', 'admin'], $is_null = false)
    {
        $input = $request->all();
        $type = isset($input['type']) ? $input['type'] : $default;
        if (!in_array($type, $type_array)) {
            $type = $default;
        }
        if ($is_null == true && $type == "") {
            $type = NULL;
        }
        return $type;
    }


}
