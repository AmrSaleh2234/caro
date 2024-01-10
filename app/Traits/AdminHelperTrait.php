<?php

namespace App\Traits;

trait AdminHelperTrait
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product_notify = 'yes';
    protected $page_types = ["page","faq","slider","support","testimonial","feature","gift","goal"];
    protected $device_type_array_all = ['windows','apple','android','huawei'];
    protected $device_type_array = ['apple','android','huawei'];
    protected $setting_debug = ['user_type_debug', 'user_id_debug'];
    protected $setting_type_array = ['user_type_debug', 'user_id_debug'];
    protected $setting_image = ["logo_image","share_image"];
    protected $log_not_in = ['id','password','parent_id','city_id','group_id','image','attachment','is_multiple','created_at','updated_at','deleted_at'];
    protected $admin_perms_models =
    [
        "activity_logs.index","additions.index","branches.index","brands.index","currencies.index","countries.index","coupons.index","cities.index",
        "groups.index","logs.index","payments.index","regions.index","roles.index","tags.index","orders.index","order_rejects.index","carts.index","products.index","pages.index","points.index",
        "reviews.index","regions.index","favorite.index","sizes.index","units.index","users.index","wallets.index",//"notifications.index","table.index","filtersets.index",
        "terms.index","tags.index","features.index","car_brands.index","car_models.index","colors.index","plishes.index","services.index"
    ];

    protected $admin_models =
    [
        "additions", "activity_logs","actions","addresses","branches","brands","carts","categories","cities","contacts","coupons","countries","currencies",
        "groups","notifications","orders","order_rejects","payments","pages","products","reviews","favorites","regions","sizes","wallets","roles","points","users","units","logs",
        "terms","tags","features","car_brands","car_models","colors","plishes","services"
    ];
    protected $setting_social_array = ['tiktok','apple','android','huawei','facebook','twitter','youtube','instagram','whatsapp','snapchat'];
    protected $setting_array_api = ['site_email', 'site_phone','address'];
    protected $setting_array = ['shipping','delivery_cost','site_email', 'site_phone','logo_image','site_language','admin_language','table_limit', 'address', 'site_title', 'site_open', 'site_url', 'admin_url','min_order','max_order'];
    protected $limit_array = [25, 50, 100,250];
    protected $limit_array_admin = [25, 50, 100,250,500,1000,2500,5000,10000];//0,

    protected $limit_array_admin_diff = [500,1000,2500,5000,10000];//0,

    protected $limit_export_array_admin = [0,25, 50, 100,250,500,1000,2500,5000,10000];

    protected $limit_export_array_admin_diff = [0,500,1000,2500,5000,10000];

    protected $empty_value_array =["NA", "0", "null", "NULL", "", "All", "None", "-All-", "-None-", "--All--", "--None--"];

    protected $property_ajax_array = [ 'active','sale','shipping','feature','is_late','is_size','is_max','is_read', 'is_multiple','is_complete'];

    protected $order_status_array = ['request','pending','approved','preparing','preparing_finished','delivery_go','delivered','cancelled', 'rejected','returned'];

    protected $order_status_failed_array = ['cancelled', 'rejected','returned'];


    protected $order_status_finish_array = ['delivered','cancelled', 'rejected','returned'];

    protected $order_status_deliver_array = ['delivered'];

    protected $order_status_array_coupon = ['coupon','notcoupon','request','pending','approved','preparing','preparing_finished','delivery_go','delivered','cancelled', 'rejected','returned'];

    protected $get_all_array = ['user_id','delivery_id','cancel_by','product_id','category_id','addition_id',
    'unit_id', 'brand_id', 'size_id','group_id','branch_id', 'payment_id','country_id', 'currency_id', 'city_id'];
    protected $get_all_array_not_users = ['product_id','category_id','addition_id','unit_id', 'size_id','group_id','brand_id', 'branch_id', 'payment_id','country_id', 'currency_id', 'city_id'];
    protected $user_array = ['user_id','delivery_id','cancel_by'];
    protected $property_date_time_array = ['created_at', 'updated_at', 'deleted_at'];
    protected $user_roles_array = [
        'client','delivery','store',
        'super_admin','admin','sub_admin', 'manger','sub_manger',
        'office_admin', 'call_center_admin','account_admin',
        'office_manger', 'call_center_manger','account_manger',
        'office', 'call_center','account'
         ];
    protected $admin_roles =
    [
        'super_admin','admin','sub_admin', 'manger','sub_manger',
        'office_admin', 'call_center_admin','account_admin',
        'office_manger', 'call_center_manger','account_manger',
        'office', 'call_center','account'
    ];
    protected $branch_roles =
    [
        'office_admin', 'call_center_admin','account_admin',
        'office_manger', 'call_center_manger','account_manger',
        'office', 'call_center','account'
    ];

    protected $branch_manger_roles =
    [
         'office_admin', 'call_center_admin','account_admin',
         'office_manger', 'call_center_manger','account_manger'
    ];
    protected $not_employee_company = ['client', 'delivery'];
    protected $not_all_employee_company = ['client','delivery'];
    protected $user_accounts = ['account', 'account_manger', 'account_admin'];
    protected $user_call_centers = ['call_center', 'call_center_manger', 'call_center_admin'];
    protected $user_offices = ['office', 'office_manger', 'office_admin'];
    protected $access_all_type = ['super_admin'];
    protected $access_all_type_sub = ['super_admin','admin'];
    protected $access_all_id = [1];
    protected $access_all_perms = ["activity_logs.delete","logs.delete","roles.delete"];
    protected $admins_super = ['super_admin','admin', 'sub_admin'];
    protected $mangers_super = ['manger','sub_manger'];
    protected $user_admins = ['super_admin','admin', 'sub_admin','manger','sub_manger'];
    protected $user_mangers = [ 'office_admin', 'call_center_admin', 'account_admin'];
    protected $user_teams = ['office_manger', 'call_center_manger','account_manger'];
    protected $user_employees = ['office', 'call_center','account'];

}
