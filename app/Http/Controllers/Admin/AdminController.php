<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Traits\AdminTrait;
use App\Traits\ChartTrait;
use App\Traits\HelperTrait;
use App\Traits\NotifiTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    use AdminTrait,HelperTrait,NotifiTrait;
    protected $user,$type,$limit,$admin_url,$language,$site_url,$class,$table;
    protected $ssl_certificate = "no";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $main_rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
        'order_id' => 'required|integer|min:1|max:127',
        'active' => 'required|in:0,1',
     ];
    public function __construct()
    {
        $setting_all = DB::table('settings')->whereIn('key', ['table_limit', 'admin_url','ssl_certificate', 'site_url'])->pluck('value', 'key')->toArray();
        foreach ($setting_all as $key => $value) {
            $$key = $value;
        }
        $limit = is_numeric($table_limit) ? $table_limit : 50;
        $this->limit        = $limit;
        $this->admin_url    = $admin_url;
        $this->site_url     = url('');
        $this->ssl_certificate = $ssl_certificate;
        $this->class        = "user";
        $this->table        = "users";
        $this->middleware('admin');
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            // $this->language     = $this->user->locale;
            $this->language     = "en";
            $this->type         = auth()->user()->type;
            return $next($request);
        });

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function pageError()
    {
        return view('admin.errors.404');
    }

    public function pageUnauthorized()
    {
        return view('admin.errors.unauthorized');
    }

    public function getTypeInput($request, $default = "client", $type_array = ['client', 'delivery', 'admin'], $is_null = false)
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

    public function getOptimize()
    {
        Artisan::call('optimize');
        return 'done';
    }

    public function getOptimizeClear()
    {
        Artisan::call('optimize:clear');
        return 'done';
    }

    public function getKeyGenerate()
    {
        Artisan::call('key:generate');
        return 'done';
    }

}
