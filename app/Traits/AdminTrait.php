<?php
namespace App\Traits;

use DB;
use App\Models\City;
use App\Models\Role;
use App\Models\Size;
use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Branch;
use App\Models\Coupon;
use App\Models\Region;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Addition;
use App\Models\Category;
use App\Models\Permission;
use App\Traits\AdminHelperTrait;

trait AdminTrait {
    use AdminHelperTrait;
    public function getAdditions($lang,$parent = false)
    {

        $array = [];
        if($parent != false){
        $array[0] = __('None');
        }
        $array_all = Addition::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if(!empty( $array_all)){
            foreach($array_all as $key => $value){
            $array[$key] =$value[$lang];
            }
        }
        return $array;
    }

    public function getAllCategories($lang,$parent = false)
    {

        $array = [];
        if($parent != false){
        $array[0] = __('None');
        }
        $array_all_parent = Category::whereNull('parent_id')->active()->defaultOrder()->with('childrens')->get();
        if(!empty( $array_all_parent)){
            foreach($array_all_parent as $key => $value){
            $array[$value->id] =$value->name[$lang];
            if(isset($value->childrens)){
                foreach($value->childrens as $key_childrens => $value_childrens){
                $array[$value_childrens->id] =$value_childrens->name[$lang]. " - " .$value->name[$lang];
                }
            }
            }
        }
        return $array;
    }

    public function getCategories($lang,$parent = false,$id = 0)
    {

        $array = [];
        if($parent != false){
        $array[0] = __('None');
        }
        $array_all_parent = Category::defaultOrder()->active();
        if($parent != false){
            $array_all_parent->whereNull('parent_id');
        }
        if($id > 0){
            $array_all_parent->where('id','<>',$id);
        }
        $array_all =$array_all_parent->pluck('name', 'id')->toArray();
        if(!empty( $array_all)){
            foreach($array_all as $key => $value){
            $array[$key] =$value[$lang];
            }
        }
        return $array;
    }

    public function getPayments($lang,$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Payment::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;
    }

    public function getAllProducts($lang,$parent = true)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all_parent = Product::whereNull('parent_id')->with('childrens')->defaultOrder()->active()->get();
        if(!empty( $array_all_parent)){
            foreach($array_all_parent as $key => $value){
            $array[$value->id] =$value->name[$lang];
            if(isset($value->childrens)){
                foreach($value->childrens as $key_childrens => $value_childrens){
                $array[$value_childrens->id] =$value_childrens->name[$lang]. " - " .$value->name[$lang];
                }
            }
            }
        }
        return $array;

    }

    public function getProducts($lang,$parent = true)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Product::whereNull('parent_id')->defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getBranches($lang,$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Branch::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getGroups($lang,$type = "branches",$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Group::where('type',$type)->defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getSizes($lang,$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Size::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getUnits($lang,$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Unit::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getBrands($lang,$parent = false)
    {
        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Brand::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;

    }

    public function getCoupons($lang, $parent = false, $finish = false)
    {

        $array = [];
        if ($parent != false) {
            $array[0] = __('None');
        }
        $array_all = Coupon::defaultOrder()->active();
        if ($finish == true) {
            $array_all->finish(0);
        }
        $array_all->pluck('name', 'id')->toArray();
        if (!empty($array_all)) {
            foreach ($array_all as $key => $value) {
                $array[$key] = $value[$lang];
            }
        }
        return $array;
    }

    public function getCountries($lang,$all = false)
    {
        $array = [];
        if($all != false){
            $array[0] = __('None');
        }
        $array_all = Country::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if(!empty( $array_all)){
            foreach($array_all as $key => $value){
            $array[$key] =$value[$lang];
            }
        }
        return $array;
    }

    public function getCities($lang,$all = false)
    {
        $array = [];
        if($all != false){
            $array[0] = __('None');
        }
        $array_all = City::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if(!empty( $array_all)){
            foreach($array_all as $key => $value){
            $array[$key] =$value[$lang];
            }
        }
        return $array;
    }

    public function getRegions($lang,$all = false)
    {
        $array = [];
        if($all != false){
            $array[0] = __('None');
        }
        $array_all = Region::defaultOrder()->active()->pluck('name', 'id')->toArray();
        if(!empty( $array_all)){
            foreach($array_all as $key => $value){
            $array[$key] =$value[$lang];
            }
        }
        return $array;
    }

    public function userSearch($type, $name, $email, $phone,  $date_start, $date_end, $type_array, $table = "users",$column = "created_at")
    {
        //$social, $device,
        $data_all = User::latest($column);
        if ($type != NULL && in_array($type, $type_array)) {
            $data_all->where('is_'.$type, 1);
        }

        $data_all = $this->whereLike($data_all, $name, "name", $table);
        $data_all = $this->whereLike($data_all, $email, "email", $table);
        $data_all = $this->whereLike($data_all, $phone, "phone", $table);
        // if ($social != '') {
        //     $data_all->where("$table.provider", $social);
        // }
        // if ($device != '') {
        //     $data_all->Join('devices', function ($join) use ($table, $forgin, $device) {
        //         $join->on("$table.id", "devices.$forgin")->where('devices.type', $device);
        //     });
        // }
        $data_all = $this->dateFilter($data_all, $date_start, $date_end, $table);
        return $data_all;
    }

    public function getAllUsers($all = true)
    {
        $all_data = User::withTrashed()->latest();
        $data = $all_data->select('phone', 'name', 'id')->get();
        $array = [];
        foreach ($data as $value) {
            $name = $value->name . ' - ' . $value->phone;
            $array[$value->id] =  $name;
        }
        if ($all != false) {
            $array = array(0 => __('None')) + $array;
        }
        return $array;
    }

    public function getUsers($all = true)
    {
        $all_data = User::active();
        $data = $all_data->select('phone', 'name', 'id')->get();
        $array = [];
        foreach ($data as $value) {
            $name = $value->name . ' - ' . $value->phone;
            $array[$value->id] =  $name;
        }
        if ($all != false) {
            $array = array(0 => __('None')) + $array;
        }
        return $array;
    }

    public function getClients($all = true)
    {
        $all_data = User::active()->where('is_client',1);
        $data = $all_data->select('phone', 'name', 'id')->get();
        $array = [];
        foreach ($data as $value) {
            $name = $value->name . ' - ' . $value->phone;
            $array[$value->id] =  $name;
        }
        if ($all != false) {
            $array = array(0 => __('None')) + $array;
        }
        return $array;
    }

    public function getDeliveries($all = true)
    {
        $all_data = User::active()->where('is_delivery',1);
        $data = $all_data->select('phone', 'name', 'id')->get();
        $array = [];
        foreach ($data as $value) {
            $name = $value->name . ' - ' . $value->phone;
            $array[$value->id] =  $name;
        }
        if ($all != false) {
            $array = array(0 => __('None')) + $array;
        }
        return $array;
    }

    public function getNotifiUsers($all = true)
    {
        $all_data = User::active()->where(function ($query) {
            $query->orWhere("is_client", 1)->orWhere('is_delivery',1);
        });
        $data = $all_data->select('phone', 'name', 'id')->get();
        $array = [];
        foreach ($data as $value) {
            $name = $value->name . ' - ' . $value->phone;
            $array[$value->id] =  $name;
        }
        if ($all != false) {
            $array = array(0 => __('None')) + $array;
        }
        return $array;
    }

    public function checkPerm($route_admin)
    {
        $route_name = false;
        $permission = Permission::whereRaw("FIND_IN_SET('$route_admin',name)")->first();
        if ($permission) {
            if(auth('web')->user()->isAbleTo($permission->name)){
                $route_name =  true;
            }
        }
        return $route_name;
    }

    public function getRoles(){

        $roles_all = Role::latest();
        if (!in_array(auth()->user()->type,$this->access_all_type)) {
            $roles_all->whereNotIn('name',$this->access_all_type);
        }
        if (!in_array(auth()->user()->type,$this->admins_super)) {
            $roles_all->whereNotIn('name',$this->admins_super);
        }
        if (!in_array(auth()->user()->type,$this->user_admins)) {
            $roles_all->whereNotIn('name',$this->user_admins);
        }
        return $roles_all->pluck('display_name', 'id')->toArray();
    }
}




