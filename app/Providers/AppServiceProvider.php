<?php

namespace App\Providers;

use App\Traits\AdminHelperTrait;
use DB;
use App\Models\Log;
use App\Models\Tag;
use App\Models\Cart;
use App\Models\City;
use App\Models\Meta;
use App\Models\Page;
use App\Models\Post;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Region;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Addition;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Currency;
use App\Models\OrderItem;
use App\Models\OrderMeta;
use App\Models\ActivityLog;
use App\Models\OrderReject;
use App\Models\OrderStatus;
use App\Models\CartItemAddition;
use App\Models\OrderItemAddition;
use Illuminate\Notifications\Action;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    use AdminHelperTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        Relation::morphMap([
            'products' => Product::class,
            'brands' => Brand::class,
            'units' => Unit::class,
            'carts' => Cart::class,
            'cart_items' => CartItem::class,
            'cart_item_additions' => CartItemAddition::class,
            'orders' => Order::class,
            'order_items' => OrderItem::class,
            'order_metas' => OrderMeta::class,
            'order_statuses' => OrderStatus::class,
            'order_rejects' => OrderReject::class,
            'order_item_additions' => OrderItemAddition::class,
            'categories' => Category::class,
            'users' => User::class,
            'coupons' => Coupon::class,
            'additions' => Addition::class,
            'activity_logs' => ActivityLog::Class,
            'logs' => Log::Class,
            'contacts' => Contact::Class,
            'currencies' => Currency::Class,
            'countries' => Country::Class,
            'cities' => City::Class,
            'regions' => Region::Class,
            'branches' => Branch::Class,
            'groups' => Group::Class,
            'pages' => Page::Class,
            'actions' => Action::Class,
            'metas' => Meta::Class,
            'tags' => Tag::Class,
            'settings' => Setting::Class,
            'roles' => Role::Class,
            'notifications' => DatabaseNotification::Class,
        ]);


        // user
        Validator::extend('uniqueUserName', function ($attribute, $value, $parameters, $validator) {
            $count = User::whereNotIn('type', ['client'])->where('name', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserNameUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->whereNotIn('type', ['client'])->where('name', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserPhone', function ($attribute, $value, $parameters, $validator) {
            $count = User::whereNotIn('type', ['client'])->where('phone', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserPhoneUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->whereNotIn('type', ['client'])->where('phone', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserEmail', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('email', $value)->whereNotIn('type', ['client'])->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserEmailUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->whereNotIn('type', ['client'])->where('email', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientPhone', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('is_client', 1)->where('phone', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientEmail', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('is_client', 1)->where('email', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientPhoneUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->where('is_client', 1)->where('phone', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientEmailUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->where('is_client', 1)->where('email', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientName', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('is_client', 1)->where('name', $value)->count();
            return $count === 0;
        });

        Validator::extend('uniqueUserClientNameUpdate', function ($attribute, $value, $parameters, $validator) {
            $count = User::where('id', '!=', $parameters[0])->where('is_client', 1)->where('name', $value)->count();
            return $count === 0;
        });

        //
        $admin_language = $site_language = $admin_url =  $table_limit = NULL;
        $setting= [];
        if (Schema::hasTable('settings')) {
            $setting= Setting::whereIn('group', ['social','setting'])->pluck('value', 'key')->toArray();
        }
        foreach ($setting as $key => $value) {
                $$key = $value;
        }
        $languages = ['ar', 'en'];
        $admin_language = (in_array($admin_language, $languages)) ? $admin_language : "ar";
        $site_language = (in_array($site_language, $languages)) ? $site_language : "ar";

        view()->composer(['auth.*'], function ($view) use ($site_language,$setting) {
            $view->with(array('site_language' => $site_language,'setting' => $setting));
        });

        view()->composer(['admin.*'], function ($view) use ($admin_language, $table_limit, $admin_url) {
            $user_account = NULL;
            $user_id = 0;
            if (auth()->check()) {
                $user_account = auth()->user();
                $admin_language = $user_account->locale;
                $user_id = $user_account->id;
            }
            $admins_super = $this->admins_super;
            $mangers_super = $this->mangers_super;
            $user_admins = $this->user_admins;
            $user_offices = $this->user_offices;
            $admin_perms_models = $this->admin_perms_models;
            $access_all_type = $this->access_all_type;
            $access_all_type_sub = $this->access_all_type_sub;
            $access_all_id = $this->access_all_id;
            $access_all_perms = $this->access_all_perms;
            $limit_array_admin = $this->limit_array_admin;
            $limit_array_admin_diff = $this->limit_array_admin_diff;
            $get_all_array = $this->get_all_array;
            $get_all_array_not_users = $this->get_all_array_not_users;
            $user_array = $this->user_array;
            $user_teams = $this->user_teams;
            $user_employees = $this->user_employees;
            $order_status_failed_array = $this->order_status_failed_array;
            $order_status_finish_array = $this->order_status_finish_array;
            $order_status_deliver_array = $this->order_status_deliver_array;
            $order_status_array_coupon = $this->order_status_array_coupon;
            $order_status_array = $this->order_status_array;
            $view->with(array(
                'order_status_array' => $order_status_array,'order_status_deliver_array' => $order_status_deliver_array,'order_status_finish_array' => $order_status_finish_array,'order_status_failed_array' => $order_status_failed_array,
                'user_array' => $user_array,'get_all_array_not_users' => $get_all_array_not_users,'get_all_array' => $get_all_array,'limit_array_admin_diff' => $limit_array_admin_diff, 'limit_array_admin' => $limit_array_admin,
                'access_all_perms' => $access_all_perms,'access_all_id' => $access_all_id,'access_all_type_sub' => $access_all_type_sub,'access_all_type' => $access_all_type, 'admin_perms_models' => $admin_perms_models,
                'user_offices' => $user_offices,'user_admins' => $user_admins,'mangers_super' => $mangers_super,'admins_super' => $admins_super, 'user_employees' => $user_employees,'user_teams' => $user_teams,
                'order_status_array_coupon' => $order_status_array_coupon,'admin_language' => $admin_language,'user_id' => $user_id,'user_account' => $user_account,'table_limit' => $table_limit, 'admin_url' => $admin_url));
        });

        view()->composer(['admin.products.table', 'admin.additions.table','admin.orders.show','admin.orders.print','admin.orders.table','admin.orders.table-show', 'admin.coupons.table', 'admin.cities.table', 'admin.regions.table'], function ($view) {
            $currency_view = getCurrencyView();
            $currency = getCountryView();
            $view->with(array( 'currency' => $currency,'currency_view' => $currency_view));
        });
        view()->composer(['admin.layouts.header'], function ($view) {
            $user_account   = auth()->user();
            $notification_count = $user_account->unreadNotifications()->groupBy('notifiable_type')->count();
            $contact_count = Contact::countUnRead();
            $order_count = Order::countUnRead();
            $view->with(array('notification_count' => $notification_count,'order_count' => $order_count,'contact_count' => $contact_count));
        });
    }
}
