<?php

namespace App\Http\Controllers\Front;

use DB;
use Mail;
use App\Models\Cart;
use App\Models\Post;
use App\Models\User;
use App\Models\Device;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use \Illuminate\Support\Facades\View;
use App\Http\Requests\ContactFormRequest;

class HomeController extends FrontController
{


    public function homePage(Request $request) {
        $lang  = $this->lang;
        $cart_id = Cart::foundCart($this->user_id);
        $categories = $this->getCategories($lang,true);
        $products  = $this->getPosts($lang,$this->user_id);
        $cartItems  = $this->getAllCartItem($lang,$this->user_id,$cart_id);
        $offers = $this->getPostsOffer($lang,$this->user_id);
        //$feature = $this->getPostsFeature($lang,$this->user_id);
        //$sale = $this->getPostsSale($lang,$this->user_id);
        $page  = $this->getPage($lang,'about');
        $title = __('Home') . $this->site_mark . __($this->site_title);
        $class = 'home';
        return view('front.pages.home', compact('title','class','page','categories','products','offers','cartItems'));
    }

    public function page(Request $request,$type) {
        $type_array = ['terms','privacy','faq','about'];
        $lang  = $this->lang;
        $page  = $this->getPage($lang,$type);
        if (in_array($type, $type_array) && $page) {
        $title = $page->page_name . $this->site_mark . $this->site_title;
        $class = $type;
        return view('front.pages.'.$type, compact('title','class','page'));
        }else{
            return $this->pageError();
        }

    }

    public function contact(Request $request) {
        $lang  = $this->lang;
        $site_phone = $this->site_phone;
        $site_email = $this->site_email;
        $ios = $android =$huawei = $facebook = $twitter = $googleplus = $snapchat =$youtube = $instagram =$whatsapp = NULL;
        $setting = DB::table('settings')->whereIn('group', ['social','setting'])->pluck('value', 'key')->toArray();
        foreach ($setting as $key => $value) {
            $$key = $value;
        }
        $title = __('Contact us') . $this->site_mark . $this->site_title;
        $class = "contact";
        return view('front.pages.contact', compact('title','class','ios','android','huawei','facebook','twitter','googleplus','snapchat','youtube','instagram','whatsapp',
        'site_phone','site_email'));
    }

    public function contactStore(Request $request) {
        $this->validate($request, [
            'phone' => 'required',
            'title' => 'required',
            'content' => 'nullable',
            'attachment' => 'nullable:max:10240',
        ]);
        $input = $request->all();
            foreach ($input as $key => $value) {
                    $$key = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }

            if(!isset($content) || $content == ""){
                $content = NULL;
            }
            $attachment = NULL;
            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $attachment = $this->uploadFile($file);
            }
            $user =$this->user;
            $contact = new Contact();
            $contact->insertContact($user->id,$phone,$title,$content,$attachment);
            return redirect()->route('contact')->with('success', __('Message sent successfully'));
    }

}
