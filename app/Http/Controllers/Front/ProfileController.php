<?php

namespace App\Http\Controllers\Front;

use Hash;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ProfileController extends FrontController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //profile
    public function index()
    {
        $title =  __('Profile') . $this->site_mark . $this->site_title;
        $user = $this->user;
        $class = "profile";
        return view('front.profile.index', compact('class','title', 'user'));
    }

    public function update(Request $request)
    {
        $user = $this->user;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|max:255|email|unique:users,email,' . $user->id,
            'locale' => 'required',
        ]);
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
            $input = Arr::except($input, array('phone', 'active'));
        } else {
            $input = Arr::except($input, array('phone', 'active', 'password'));
        }
        //   if(isset($input['image'])){
        //     $input['image'] = $this->site_url.'/uploads/' . str_random() . '.' . $request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('uploads'), $input['image']);
        //   }else{
        //     $input['image'] = $input['image_old'];
        //   }
        //   $input['is_active'] = 1;
        $user->update($input);
        app()->setLocale($input['locale']);
        return redirect()->route('profile.index')->with('success', __('Successfully Saved'));
    }

    public function changePassword()
    {
        $title =  __('Change Password') . $this->site_mark . $this->site_title;
        $user = $this->user;
        $class = "password";
        return view('front.profile.changepassword', compact('title','class', 'user'));
    }

    public function changePasswordStore(Request $request)
    {
        $this->validate($request, [
            'password_old' => 'required',
            'password' => 'required|min:8|same:confirm_password|different:password_old',
        ]);

        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $user = auth()->user();
        if (!Hash::check($input['password_old'], $user->password)) {
            return redirect()->route('profile.changepassword')->with('error', __('password does not match the database password'));
        } else {
            $input['password'] = Hash::make($input['password']);
            $user->update($input);
            return redirect()->route('profile.changepassword')->with('success', __('Update Password'));
        }
    }

    public function orders(Request $request)
    {
        $title = __('Orders') . $this->site_mark . $this->site_title;
        $user  = $this->user;
        $class = "order";
        $data  = Order::latest()->where('user_id',$user->id)->paginate($this->limit);
        return view('front.profile.orders.index', compact('class','data','title', 'user'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function orderSingle(Request $request,$id)
    {
        $title = __('Order') .' # '.$id. $this->site_mark . $this->site_title;
        $user  = $this->user;
        $class = "order";
        $order  = Order::where('user_id',$user->id)->where('id',$id)->first();
        if($order){
        $lang  = $this->lang;
        $items = $this->getAllOrderItem($lang,$user->id,$id);
        return view('front.profile.orders.show', compact('class','order','items','title', 'user'));
        }else{
        return $this->pageError();
        }
    }
}
