<?php

namespace App\Http\Resources;

use App\Models\Cart;
use App\Traits\AdminHelperTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
{
    use AdminHelperTrait;
    protected function getLang($language = 'en') {
        if ( auth('sanctum')->check()) {
            return auth('sanctum')->user()->locale;
        }
        else {
            return $language;
        }
    }

    protected function getAuhtUser() {
        if ( auth('sanctum')->check()) {
            return auth('sanctum')->user();
        }
        else {
            return null;
        }
    }

    protected function getAuhtUserID() {
        if ( auth('sanctum')->check()) {
            return auth('sanctum')->user()->id;
        }
        else {
            return 0;
        }
    }

    protected function getAuhtUserType() {
        if ( auth('sanctum')->check()) {
            if(auth('sanctum')->user()->is_client == 1){
                return "client";
            }elseif(auth('sanctum')->user()->is_store == 1){
                return "store";
            }elseif(auth('sanctum')->user()->is_delivery == 1){
                return "delivery";
            }else{
                return "";
            }
        }
        else {
            return null;
        }
    }

    protected function getCartID()
    {
        return Cart::foundCart($this->getAuhtUserID());
    }

    protected function getCurrencyViewShow(){
        return getCurrencyView();
    }
}
