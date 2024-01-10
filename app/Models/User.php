<?php

namespace App\Models;

use App\Models\UserModel as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Models\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Sanctum\HasApiTokens;

//use App\Scopes\ActiveScope;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, LaratrustUserTrait, HasApiTokens;


    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope(new ActiveScope);
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $dates = ['email_verified_at','code_expire','sms_code_expire','last_active'];
    protected $fillable = [
        'name','username','name_first','name_last', 'email', 'password','email_verified_at','vip','sms_code','sms_code_expire','code','code_expire',
        'address_id','branch_id','all_branch','type','image','country_id','city_id','group_id','phone','point','wallet','locale','is_notify','is_available',
        'birth_date','gender','last_active','latitude','longitude','polygon','active','is_admin','is_message','is_store','is_delivery','is_client'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = array('name');
    protected $casts = [
        'email_verified_at' => 'datetime',
        'code_expire' =>'datetime',
        'sms_code_expire' =>'datetime',
        'last_active' =>'datetime',
    ];

    public function getNameAttribute()
    {
        return "{$this->name_first} {$this->name_last}";
    }
    public function city() {
        return $this->belongsTo(City::Class);
    }

    public function country() {
        return $this->belongsTo(Country::Class);
    }

    public function userMetas() {
        return $this->hasMany(UserMeta::Class);
    }

    public function addresses() {
        return $this->hasMany(Address::Class);
    }

    public function address() {
        return $this->belongsTo(Address::Class);
    }

    public function branch() {
        return $this->belongsTo(Branch::Class);
    }

    public function branches() {
        return $this->hasMany(Branch::Class);
    }
    public function group() {
        return $this->belongsTo(Group::Class)->where('type','branches');
    }

    public function groups() {
        return $this->belongsToMany(Group::Class)->where('type','coupons');
    }

    public function wallets() {
        return $this->hasMany(Wallet::Class);
    }

    public function points() {
        return $this->hasMany(Point::Class);
    }

    public function devices() {
        return $this->hasMany(Device::Class);
    }

    public function contacts() {
        return $this->hasMany(Contact::Class);
    }

    public function orders() {
        return $this->hasMany(Order::Class);
    }

    public function cart() {
        return $this->hasOne(Cart::Class);
    }

    public function metas() {
        return $this->morphMany(Meta::Class, 'metaable');
    }

    public function actions() {
        return $this->hasMany(Action::Class);
    }

    public function reviews() {
        return $this->hasMany(Review::Class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::Class);
    }

    public function isActive() {
        return Auth::user()->active == 1;
    }

    public function isType() {
        return Auth::user()->type != 'client';
    }

    public static function getAllData($type = [],$select = ['id', 'name', 'email', 'phone'],$pagi = false,$limit = 50) {
        $all_parent = static::select($select)->active();
        if($type != []){
            $all_parent->ofTypeArray($type);
        }
        if ($pagi == true) {
            $all =$all_parent->paginate($limit);
        }else{
            $all =$all_parent->get();
        }
        return $all;
    }
    // $users = App\User::popular()->orWhere(function (Builder $query) {
    //     $query->active();
    // })->get();
    //$users = App\User::popular()->orWhere->active()->get();

    public function hasAddress($address_id)
    {
        return $this->addresses()->where('id', $address_id)->count();
    }
}
