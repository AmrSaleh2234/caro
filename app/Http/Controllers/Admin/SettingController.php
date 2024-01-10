<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Device;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class SettingController extends AdminController
{

    public function homeAdmin()
    {
        // if ($this->user->isAbleTo(['access-all'])) {
            return $this->statistics();
        // } elseif ($this->user->isAbleTo(['product-type-all','product-all','product'])) {
        //     return redirect()->route('admin.products.index');
        // } elseif ($this->user->isAbleTo(['order-all','order'])) {
        //     return redirect()->route('admin.orders.index');
        // }elseif ($this->user->isAbleTo(['user-all'])) {
        //     return redirect()->route('admin.users.index');
        // } else {
        //     return redirect()->route('admin.users.edit', [$this->user->id]);
        // }
    }

    public function statistics()
    {

        // if (!$this->user->isAbleTo(['access-all'])) {
            // return $this->pageUnauthorized();
        //  }
        $lang = $this->user->locale;
        $user_count      =  User::active()->ofTypeArray(['manger','admin'])->count();
        $client_count    =  User::active()->ofType('client')->count();
        $product_count      =  Product::active()->count();
        $contact_count   =  Contact::count();
        $offer_count     =  Product::active()->offer()->count();
        $fav_count       =  Favorite::count();
        $review_count      =  Review::active()->count();
        $order_count     =  Order::count();
        $order_sum       =  Order::where('status','deliver')->sum('total');
        $clients         =  User::active()->ofType('client')->get();
        $orders          =  Order::get();
        $orders_total    =  Order::where('status','deliver')->get();
        $products           =  Product::get();
        $devices         =  Device::get();
        $products = OrderItem::Join('products', function ($join) {$join->on('products.id', 'order_items.product_id');})
        ->select('products.id','products.name->'.$lang.' as product_name', DB::raw('SUM(order_items.amount) as product_amount'), DB::raw('SUM(order_items.total) as product_total'))
        ->groupBy('products.id')->orderBy('product_amount', 'DESC')->limit(30)->get();
        $label_count = __("Count");
        $label_price = __("Price");

        // $client_chart_hour  = $this->chartHour($clients,__("Clients This Day"),$label_count);
        // $client_chart       = $this->chartDay($clients,__("Clients This Month"),$label_count);
        // $client_chart_month = $this->chartMonth($clients,__("Clients Monthly"),$label_count);
        // $client_chart_year  = $this->chartYear($clients,__("Clients Yearly"),$label_count);

        // $order_chart_hour  = $this->chartHour($orders,__("Orders This Day"),$label_count);
        // $order_chart       = $this->chartDay($orders,__("Orders This Month"),$label_count);
        // $order_chart_month = $this->chartMonth($orders,__("Orders Monthly"),$label_count);
        // $order_chart_year  = $this->chartYear($orders,__("Orders Yearly"),$label_count);

        // $order_total_chart_hour  = $this->chartHour($orders_total,__("Orders Total This Day"),$label_price,"created_at","SHIPPING","sum");
        // $order_total_chart       = $this->chartDay($orders_total,__("Orders Total This Month"),$label_price,"created_at","total","sum");
        // $order_total_chart_month = $this->chartMonth($orders_total,__("Orders Total Monthly"),$label_price,"created_at","total","sum");
        // $order_total_chart_year  = $this->chartYear($orders_total,__("Orders Total Yearly"),$label_price,"created_at","total","sum");

        // $order_status  = $this->chartGroup($orders,__("Status"),$label_count,'status',orderTypeAll(),'pie');
        // $device_chart  = $this->chartGroup($clients,__("Devices"),$label_count,'device_type',deviceType(),'pie');
        // $product_chart    = $this->chartMulti($products->pluck("product_name"),$products->pluck("product_amount"),$products->pluck("product_total"),__("Products"),$label_count,$label_count,$label_price);

        $class = "home";
        return view('admin.pages.statistics', compact(
            'user_count','client_count','product_count','order_count','order_sum','contact_count','offer_count','fav_count','review_count','class',
            //'client_chart','client_chart_hour','client_chart_month','client_chart_year','device_chart','product_chart','order_status',
            //'order_chart','order_chart_hour','order_chart_month','order_chart_year',
            //'order_total_chart','order_total_chart_hour','order_total_chart_month','order_total_chart_year'
        ));
    }

    public function setting()
    {
        // $address = $site_multi_language = $shipping ="";
        $setting = DB::table('settings')->whereIn('group',['setting','social'])->pluck('value', 'key')->toArray();
        // foreach ($setting as $key => $value) {
        //     $$key = $value;
        // }
        $image_active = 1;
        // $image = $logo_image;
        $user = $this->user;
        $lang = $this->user->locale;
        $class = 'setting';
        // $admin_lang = $admin_language;
        return view('admin.settings.setting', compact(
            'class',
            'user',
            'setting',
            'image_active'
        ));
    }

    public function settingStore(Request $request)
    {
        $this->validate($request, [
            // 'site_url' => 'required',
            // 'admin_url' => 'required|alpha_dash|max:25|min:5',
            'site_title' => 'required',
            'site_phone' => 'required',
            'site_email' => 'required|email',
            'table_limit' => 'required|numeric',
        ]);

        $input = $request->all();

        foreach ($input as $input_key => $input_value) {
            if (in_array($input_key, $this->setting_array)) {
                $setting_value = stripslashes(trim(filter_var($input_value, FILTER_SANITIZE_STRING)));
                if($input_key == "logo_image"){
                    $setting_value = $this->getImage($setting_value);
                }
                Setting::updateSetting($input_key, $setting_value, 0, 'setting');
            }
            if (in_array($input_key, $this->setting_social_array)) {
                $setting_value = stripslashes(trim(filter_var($input_value, FILTER_SANITIZE_STRING)));
                Setting::updateSetting($input_key, $setting_value, 1, 'social');
            }
        }
        //app()->setLocale($input['admin_language']);
        //$input['admin_url'] = "admin";
        //$input['admin_url'] .
        return redirect('admin/settings')->with('success', __('Setting update successfully'));
    }

    public function social()
    {
        $setting = DB::table('settings')->where('group', 'social')->pluck('value', 'key')->toArray();
        foreach ($setting as $key => $value) {
            $$key = $value;
        }
        $class = 'social';
        return view('admin.settings.social', compact(
            'class',
            'setting'
        ));
    }

    public function socialStore(Request $request)
    {
        $input = $request->all();
        foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }


        foreach ($input as $input_key => $input_value) {
            if (in_array($input_key, $this->setting_social_array)) {
                $setting_value = stripslashes(trim(filter_var($input_value, FILTER_SANITIZE_STRING)));
                Setting::updateSetting($input_key, $setting_value, 1, 'social');
            }
        }
        return redirect()->route('admin.settings.social')->with('success', __('Social update successfully'));
    }

    // public function about() {

    //     $image = DB::table('settings')->where('key', 'about_image')->value('value');
    //     $content_ar = DB::table('settings')->where('key', 'about_content')->value('value');
    //     $content_en = DB::table('settings')->where('key', 'about_content')->where('locale', 'en')->value('value');
    //     $image_active = 1;
    //     $class = "about";
    //     return view('admin.settings.about', compact('content_ar','content_en','image','image_active','class'));
    // }

    // public function aboutStore(Request $request) {
    //     $this->validate($request, [
    //         'content_ar' => 'required',
    //         'content_en' => 'required',
    //         // 'about_image' => 'required',
    //     ]);

    //     $input = $request->all();
    //     foreach ($input as $key => $value) {
    //         if ($key != 'content_ar' && $key != 'content_en') {
    //             $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
    //          }
    //     }
    //     $input['about_image'] = $this->getImage($input['about_image']);
    //     Setting::updateSetting("about_image", $input['about_image'], 0, 'about');
    //     Setting::updateSetting("about_content", $input['content_ar'], 0, 'about');
    //     Setting::updateSettinglocale("about_content", $input['content_en'], 0, 'about','en');
    //     return redirect()->route('admin.settings.about')->with('success', __('About update successfully'));
    // }
}
