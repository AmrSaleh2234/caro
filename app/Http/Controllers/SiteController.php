<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Rate;
use App\Models\User;
use DB;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Image;
class SiteController extends Controller
{
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

    protected $successStatus = 200;
    protected $errorStatus = 404;
    protected $failStatus = 400;
    protected $forbiddentatus = 403;
    protected $serverStatus = 500;
    protected $success = 'success';
    protected $error = 'error';
    protected $client_id = 3;
    protected $site_language = "ar";
    protected $site_email;
    protected $site_phone;
    protected $limit = 10;
    protected $lang_array = ['ar', 'en'];
    protected $site_url = 'http://127.0.0.1:8000';
    protected $site_open = "yes";
    public function __construct()
    {
        $option = DB::table('settings')->whereIn('key', ['site_open', 'site_url', 'site_language', 'site_email', 'site_phone'])->pluck('value', 'key')->toArray();
        // $option = DB::table('settings')->whereIn('group', ['setting'])->pluck('value', 'key')->toArray();
        foreach ($option as $key => $value) {
            $$key = $value;
        }
        $this->site_url = $site_url;
        $this->site_open = $site_open;
        $this->site_language = $site_language;
        $this->site_email = $site_email;
        $this->site_phone = $site_phone;
        $this->middleware('site.open', ['except' => ['close']]);
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function homePage()
    {
        abort(404);
    }

    public function close()
    {
        if ($this->site_open == "yes") {
            return redirect()->route('home');
        }
        abort(404);
    }
}
