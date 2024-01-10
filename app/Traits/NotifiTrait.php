<?php
namespace App\Traits;
use FCM;
use App\Models\User;
use App\Models\Device;
use App\Traits\HelperTrait;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;
use LaravelFCM\Message\PayloadNotificationBuilder;

trait NotifiTrait {

    use HelperTrait;
    public function notificationUserType()
    {
            $user_ids = [];
                 User::active()->chunk(99999, function ($query) use (&$user_ids) {
                    $user_ids +=  $query->pluck('id')->toArray();
                });
            return $user_ids;
    }

    public function notificationUser($user_id, $title, $message,$type = "admin",$model = null,$model_id = null,$status = null,$image = null,$database = true,$firebase = true,$imei = null,$badge_count =1)
    {
        if(is_array($user_id)){
            $user_ids = $user_id;
        }else{
            $user_ids[$user_id] = $user_id;
            $badge = DatabaseNotification::where('notifiable_id', $user_id)->where('notifiable_type', 'users')->whereNull('read_at')->count();
            $badge_count = (int) sum($badge,1);
        }
        $notifi = [
            'title' => $title,
            'body' => $message,
            'type' => $type,
            'model_id' => $model_id,
            'model' => $model,
            'status' => $status,
            'image' => $image
        ];

        $notifimobile = [
            'title' => $title,
            'body' => $message,
            'type' => $type,
            'model_id' => $model_id,
            'model' => $model,
            'status' => $status,
            'image' => $image,
            "sound"  => "default",
            "screen" => "screenA",
            'priority' => 'high',
            "mutable-content" => 1,
            "content-available" => 1,
            "badge"=> $badge_count,
        ];
            $notifi_success = 0;
            $device_count = Device::whereIn('user_id', $user_ids)->whereNotNull('token')->count();
            if($database == true){
                // $model = 'App\Notifications\\'.ucfirst($type)."Notification";
                $model = 'App\Notifications\\'.NotificationsModel($type);
                User::active()->whereIn('id', $user_ids)->select('id')->chunk(9999, function ($query) use($model,$notifi) {
                    Notification::send($query, new $model($notifi));
                });

            }
            $ssl_certificate = "yes";
            if(isset($this->ssl_certificate)){
                $ssl_certificate = $this->ssl_certificate;
            }
            if ($device_count > 0 && $firebase == true && $ssl_certificate  == "yes") {
                $optionBuilder = new OptionsBuilder();
                $optionBuilder->setTimeToLive(60 * 30)->setPriority('high')->setMutableContent(1);
                $notificationBuilder = new PayloadNotificationBuilder();
                $notificationBuilder->setTitle($title)->setBody($message)->setBadge($badge_count)->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($notifimobile);
            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();
            $this->notificationDevice($user_ids, $option, $notification, $data, $notifi_success,$imei);
        }
        return $notifi_success;
    }

    public function orderStatusMessage($status,$lang = "en"){
        $title_status_lang =__('Order change status');
        $title_status ='Order change status';
        app()->setLocale("en");
        $name_en = __($title_status);
        $content_en = __($title_status).' '.__('to').' '.orderName($status);
        app()->setLocale("ar");
        $name_ar = __($title_status);
        $content_ar = __($title_status).' '.__('to').' '.orderName($status);
        app()->setLocale($lang);
        $title   = $this->getName($name_ar, $name_en);
        $message = $this->getName($content_ar, $content_en);
        $notify = ['title'=>$title,'message'=>$message];
        return $notify;
    }

    public function orderDeliveryMessage($order_id,$lang = "en"){
        $title_delivery_lang =__('Order No');
        $message_delivery_lang =__('has been transferred to you');
        $title_delivery ='Order No';
        $message_delivery = 'has been transferred to you';
        app()->setLocale("en");
        $name_en = __($title_delivery).' # '.$order_id.' ' .__($message_delivery);
        $content_en = __($title_delivery).' # '.$order_id.' ' .__($message_delivery);
        app()->setLocale("ar");
        $name_ar = __($title_delivery).' # '.$order_id.' ' .__($message_delivery);
        $content_ar = __($title_delivery).' # '.$order_id.' ' .__($message_delivery);
        app()->setLocale($lang);
        $title   = $this->getName($name_ar, $name_en);
        $message = $this->getName($content_ar, $content_en);
        $notify = ['title'=>$title,'message'=>$message];
        return $notify;
    }

    public function notificationMessage($lang,$name_notify, $message_notify)
    {
            app()->setLocale("en");
            $name_en = __($name_notify);
            $content_en = __($message_notify);
            app()->setLocale("ar");
            $name_ar = __($name_notify);
            $content_ar = __($message_notify);
            app()->setLocale($lang);
            $title   = $this->getName($name_ar, $name_en);
            $message = $this->getName($content_ar, $content_en);
            $notify = ['title'=>$title,'message'=>$message];
            return $notify;
    }

    public function notificationDevice($user_ids, $option, $notification, $data, $notifi_success,$imei)
    {
        $devices = Device::whereIn('user_id', $user_ids)->whereNotNull('token');
        if($imei != null){
            $devices->where('imei','<>',$imei);
        }
        $devices->chunk(99999, function ($query) use ($option, $notification, $data, &$notifi_success) {
            $tokens     = $query->where('type', 'android')->pluck('token')->toArray();
            $tokens_ios = $query->whereIn('type', ['apple', 'ios'])->pluck('token')->toArray();
            if (!empty($tokens)) {
                $downstream_response = FCM::sendTo($tokens, $option, null, $data);
                $notifi_success += $downstream_response->numberSuccess();
                $delete_tokens  = $downstream_response->tokensToDelete();
                if (!empty($delete_tokens)) {
                    Device::whereIn('token', $delete_tokens)->delete();
                }
            }
            if (!empty($tokens_ios)) {
                $downstream_response_ios = FCM::sendTo($tokens_ios, $option, $notification, $data);
                $notifi_success += $downstream_response_ios->numberSuccess();
                $delete_tokens_ios  = $downstream_response_ios->tokensToDelete();
                if (!empty($delete_tokens_ios)) {
                    Device::whereIn('token', $delete_tokens_ios)->delete();
                }
            }
            return $notifi_success;
        });
    }
}




