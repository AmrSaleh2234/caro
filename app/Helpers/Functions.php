<?php

use App\Models\Permission;
use App\Models\Country;

function validSiteUrl($site_referer,$url) {
    $urlCheck = '/^(https?:\/\/)?(www\.)?'.$site_referer.'\/[a-zA-Z0-9(\.\?)?]/';
    if (preg_match($urlCheck, $url) == 1) {
        return 1;
    } else {
        return 0;
    }
}

function getBrowserLocale(){
   // Credit: https://gist.github.com/Xeoncross/dc2ebf017676ae946082
   $websiteLanguages = ['EN', 'AR'];
   // Parse the Accept-Language according to:
   // http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.4
   preg_match_all(
      '/([a-z]{1,8})' .       // M1 - First part of language e.g en
      '(-[a-z]{1,8})*\s*' .   // M2 -other parts of language e.g -us
      // Optional quality factor M3 ;q=, M4 - Quality Factor
      '(;\s*q\s*=\s*((1(\.0{0,3}))|(0(\.[0-9]{0,3}))))?/i',
      $_SERVER['HTTP_ACCEPT_LANGUAGE'],$langParse);

   $langs = $langParse[1]; // M1 - First part of language
   $quals = $langParse[4]; // M4 - Quality Factor

   $numLanguages = count($langs);
   $langArr = array();

   for ($num = 0; $num < $numLanguages; $num++)
   {
      $newLang = strtoupper($langs[$num]);
      $newQual = isset($quals[$num]) ?
         (empty($quals[$num]) ? 1.0 : floatval($quals[$num])) : 0.0;

      // Choose whether to upgrade or set the quality factor for the
      // primary language.
      $langArr[$newLang] = (isset($langArr[$newLang])) ?
         max($langArr[$newLang], $newQual) : $newQual;
   }

   // sort list based on value
   // langArr will now be an array like: array('EN' => 1, 'ES' => 0.5)
   arsort($langArr, SORT_NUMERIC);

   // The languages the client accepts in order of preference.
   $acceptedLanguages = array_keys($langArr);

   // Set the most preferred language that we have a translation for.
   foreach ($acceptedLanguages as $preferredLanguage)
   {
       if (in_array($preferredLanguage, $websiteLanguages))
       {
          $_SESSION['lang'] = $preferredLanguage;
          return strtolower($preferredLanguage);
       }
   }
}

// function to sum
function sum($f, $s) {
    $sum = doubleval($f) + doubleval($s);
    return round($sum,getNumberViewOperation());
}

// function to sub
function sub($f, $s) {
    $sub = doubleval($f) - doubleval($s);
    return round($sub,getNumberViewOperation());
}

// function to division
function division($f, $s) {
    $division =  doubleval($f)  / doubleval($s);
    return round($division,getNumberViewOperation());
}

function percent($f) {
    return division($f,100);
}

// function to multiple
function multiple($f, $s) {
    $multiple =  doubleval($f)  * doubleval($s);
    return round($multiple,getNumberViewOperation());
}

// function to modulus
function modulus($f, $s) {
    $modulus = doubleval($f)  % doubleval($s) ;
    return round($modulus,getNumberViewOperation());
}

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function additionType($all = "no") {
    $array = array(
        ''          => __('All'),
        'free'     => __('Free'),
        'paid'      => __('Paid'),
    );
    if($all == "no"){
        unset($array['']);
    }
    return $array;
}

function serviceType($all = "no") {
    $array = array(
        ''          => __('All'),
        'offer'     => __('Offer'),
        'paid'      => __('Paid'),
    );
    if($all == "no"){
        unset($array['']);
    }
    return $array;
}
function addressType($all = "no") {
    $array = array(
        ''          => __('All'),
        'house'     => __('House'),
        'work'      => __('Work'),
        'other'     => __('Other'),
    );
    if($all == "no"){
        unset($array['']);
    }
    return $array;
}

function deviceType($all = "no") {
    $array = array(
        ''           => __('All'),
        'android'    => __('Android'),
        // 'windows'    => __('Windows'),
        'apple'      => __('Apple'),
        // 'huawei'     => __('Huawei')
    );
    if($all == "no"){
        unset($array['']);
    }
    return $array;
}

function paymentType() {
    $array = array(
        // 'apple_pay' => __('Apple Pay'),
        // 'google_pay' => __('Google Pay'),
        // 'paypal'  => __('Paypal'),
        // 'mada'    => __('Mada'),
        // 'paymob'  => __('Paymob'),
        'cash'    => __('Cash'),
        'vodafone'=> __('Vodafone'),
        'we'      => __('We'),
        'orange'  => __('Orange'),
        'etisalat'=> __('Etisalat'),
        'fawry'   => __('Fawry'),
        'bank'    => __('Bank'),
        'visa'    => __('Visa')
    );
    return $array;
}

function userTypeDefault() {
    $array = array(
        'client'    => __('Client'),
        'store'     => __('Store'),
        'delivery'  => __('Delivery'),
        'admin'     => __('Admin')
    );
    return $array;
}

function userTypeNotifi() {
    $array = array(
        'client'    => __('Client'),
        'store'     => __('Store'),
        'delivery'  => __('Delivery'),
        ''     => __('All'),
    );
    return $array;
}

function languageType() {

    $array = array(
        'ar' => __('Arabic'),
        'en' => __('English')
    );
    return $array;
}

function genderType() {

    $array = array(
        '' => __('None'),
        'male' => __('male'),
        'female' => __('female')
    );
    return $array;
}

function unitType($all = "no") {
    $array = array(
        '' => __('None'),
        'kilo'      => __('Kilo'),
        'package'   => __('Package'),
        'packet'    => __('Packet'),
        'cartons'   => __('Cartons'),
        'basket'    => __('Basket'),
        'shawwal'   => __('Shawwal'),
        'intensity' => __('Intensity'),
        'box'       => __('Box'),
        'cork'      => __('Cork'),
        'dish'      => __('Dish'),
        'grain'     => __('Grain'),
        'piece'     => __('Piece'),
        'woodbox'   => __('Wood box'),
        'bag'       => __('Bag'),
        '500gm'     => __('500 Gram'),
        '250gm'     => __('250 Gram'),
    );
        if($all == "no"){
        unset($array['']);
        }

    return $array;
}

function orderTypeShow($type = "request") {
    $array = array(
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
    );
    if(in_array($type,["approved","pending"])){
        $removeKeys = array('request');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    if($type == "preparing"){
        $removeKeys = array('request',"pending",'approved');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    if($type == "preparing_finished"){
        $removeKeys = array('request',"pending",'approved','preparing');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    if($type == "delivery_go"){
        $removeKeys = array('request',"pending",'approved','preparing','preparing_finished');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    if(in_array($type,['delivered'])){
        $removeKeys = array('request',"pending",'approved','preparing','preparing_finished','delivery_go','cancelled','rejected','returned');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    if(in_array($type,['cancelled','rejected','returned'])){
        $removeKeys = array('request',"pending",'approved','preparing','preparing_finished','delivery_go');
        foreach($removeKeys as $key) {
                unset($array[$key]);
        }
    }
    return $array;
}

function NotificationsModel($type = "")
{
    $array = array(
        'admin' => "AdminNotification",
        'order' => "OrderNotification",
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $array["admin"];
    }
}

function orderTypeAll() {
    $array = array(
        ''          => __('None'),
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
    );
    return $array;
}

function currencyView() {

    $array = array(
        // 0   => 0,
        // 1  => 1,
        2  => 2,
        3  => 3,
    );
    return $array;
}
function tableView($all = "no", $other = "yes")
{
    $array = array(
        25 => '25',
        50 => '50',
        100 => '100',
        250 => '250',
    );
    if ($other == "yes") {
        $user = auth()->user();
        if ($user->isAbleTo(['tables.index'])) {
            $array += array(
                500 => '500',
                1000 => '1000',
                2500 => '2500',
                5000 => '5000',
                10000 => '10000',
                // 0 => __('All Data'),
            );
        }
    }

    if ($all != "yes") {
        unset($array[0]);
    }
    return $array;
}

function tableViewExport($all = "yes", $use = "no")
{
    $array = array(
        25 => '25',
        50 => '50',
        100 => '100',
        250 => '250',
    );
    $user = auth()->user();
    if ($user->isAbleTo(['tables.index'])) {
        $array += array(
            500 => '500',
            1000 => '1000',
            2500 => '2500',
            5000 => '5000',
            10000 => '10000',
            // 0 => __('All Data'),
        );
    }
    if ($all != "yes") {
        unset($array[0]);
    }
    if ($use == "yes") {
        $removeKeys = array(25, 50, 100, 250);
        foreach ($removeKeys as $key) {
            unset($array[$key]);
        }
    }
    return $array;
}


function statusShowType() {

    $array = array(
        0 => __('No'),
        1 => __('Yes')
    );
    return $array;
}



function languageName( $type = null) {
    $array = array(
        'ar' => __('Arabic'),
        'en' => __('English')
    );

    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }

}

function unitName( $type = null) {
    $array = array(
        'kilo'      => __('Kilo'),
        'package'   => __('Package'),
        'packet'    => __('Packet'),
        'cartons'   => __('Cartons'),
        'basket'    => __('Basket'),
        'shawwal'   => __('Shawwal'),
        'intensity' => __('Intensity'),
        'box'       => __('Box'),
        'cork'      => __('Cork'),
        'dish'      => __('Dish'),
        'grain'     => __('Grain'),
        'piece'     => __('Piece'),
        'woodbox'   => __('Wood box'),
        'bag'       => __('Bag'),
        '500gm'     => __('500 Gram'),
        '250gm'     => __('250 Gram'),
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}
function genderName( $type = null) {
    $array = array(
        '' => __('None'),
        'male' => __('male'),
        'female' => __('female')
    );

    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function showName( $type = null) {
    $array = array(
        'yes' => __('Yes'),
        'no' => __('No')
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }

}

function orderName($type = null) {
    $array = array(
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function couponName($type) {
    $array = array(
        'percentage'    => __('Percentage'),
        'fixed'         => __('Fixed')
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}


function deviceName($type) {
    $array = array(
        'android'    => __('Android'),
        'windows'    => __('Windows'),
        'apple'      => __('Apple'),
        'huawei'     => __('Huawei')
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function walletName($type) {
    $array = array(
        'income'    => __('Income'),
        'outcome'   => __('Outcome'),

    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function paymentName($type) {
    $array = array(
        'apple_pay' => __('Apple Pay'),
        'google_pay' => __('Google Pay'),
        'paypal'  => __('Paypal'),
        'mada'    => __('Mada'),
        'paymob'  => __('Paymob'),
        'cash'    => __('Cash'),
        'vodafone'=> __('Vodafone'),
        'we'      => __('We'),
        'orange'  => __('Orange'),
        'etisalat'=> __('Etisalat'),
        'fawry'   => __('Fawry'),
        'bank'    => __('Bank'),
        'visa'    => __('Visa')
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function typeAction($type) {
    $array = array(
        'users'    => __('Users'),
        'posts'  => __('Products'),
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

function addressName($type) {
    $array = array(
        'house'     => __('House'),
        'work'      => __('Work'),
        'other'     => __('Other'),
    );
    if(isset($array[$type])){
        return $array[$type];
    }else{
        return "";
    }
}

 function getCountryView($country_id = 1)
    {
        $currency = ["ar"=>"جنيه","en"=>"EGP"];
        $country = Country::with('currency')->find($country_id);
        if (!empty($country) && isset($country->currency)) {
            $currency = $country->currency->name;
        }
        return $currency;
    }

    function getCountryPhone($country_id = 1)
    {
        $phone_code = "2";
        $country = Country::find($country_id);
        if (!empty($country)) {
            $phone_code = $country->phone_code;
        }
        return $phone_code;
    }

     function getCurrencyView($country_id = 1)
    {
        $currency_view = 2;
        $country = Country::find($country_id);
         if (!empty($country)) {
            $currency_view = $country->currency_type;
        }
        if ($currency_view != 3) {
            $currency_view = 2;
        }
        return $currency_view;
    }

    function getNumberView()
    {
        return 2;
    }

    function getNumberViewOperation()
    {
        return 3;
    }


function splitName($name)
{
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
    return array($first_name, $last_name);
}

function fullName($name)
{
    $parts = array();

    while (strlen(trim($name)) > 0) {
        $name = trim($name);
        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $parts[] = $string;
        $name = trim(preg_replace('#' . preg_quote($string, '#') . '#', '', $name));
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $name['first_name'] = $parts[0];
    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
    $name['last_name'] = (isset($parts[2])) ? $parts[2] : (isset($parts[1]) ? $parts[1] : '');

    return $name;
}



function sumInt($f, $s)
{
    return (int) $f + (int) $s;
}

// function to sub

function subInt($f, $s)
{
    return (int) $f - (int) $s;
}

// function to division

function divisionFine($f, $s)
{
    $division = doubleval($f) / doubleval($s);
    return round($division, 5);
}
function divisionInt($f, $s)
{
    return (int) $f / (int) $s;
}


function percentPayment($f)
{
    $percent = doubleval($f) / 100;
    return round($percent, 5);
}

// function to multiple

function multipleInt($f, $s)
{
    return (int) $f * (int) $s;
}

// function to modulus

function modulusInt($f, $s)
{
    $modulus = (int) $f % (int) $s;
    return (int) $modulus ;
}

function urlGetContents($Url)
{
    if (!function_exists('curl_init')) {
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function hourType($all = "yes")
{
    $array = array(
        ''        => __('اختر الساعة'),
        '06:00:00'    => "06:00",
        '06:30:00'    => "06:30",
        '07:00:00'    => "07:00",
        '07:30:00'    => "07:30",
        '08:00:00'    => "08:00",
        '08:30:00'    => "08:30",
        '09:00:00'    => "09:00",
        '09:30:00'    => "09:30",
        '10:00:00'    => "10:00",
        '10:30:00'    => "10:30",
        '11:00:00'    => "12:00",
        '11:30:00'    => "12:30",
        '12:00:00'    => "12:00",
        '12:30:00'    => "12:30",
        '13:00:00'    => "13:00",
        '13:30:00'    => "13:30",
        '14:00:00'    => "14:00",
        '14:30:00'    => "14:30",
        '15:00:00'    => "15:00",
        '15:30:00'    => "15:30",
        '16:00:00'    => "16:00",
        '16:30:00'    => "16:30",
        '17:00:00'    => "17:00",
        '17:30:00'    => "17:30",
        '18:00:00'    => "18:00",
        '18:30:00'    => "18:30",
        '19:00:00'    => "19:00",
        '19:30:00'    => "19:30",
        '20:00:00'    => "20:00",
        '20:30:00'    => "20:30",
        '21:00:00'    => "21:00",
        '21:30:00'    => "21:30",
        '22:00:00'    => "22:00",
        '22:30:00'    => "22:30",
        '23:00:00'    => "23:00",
        '23:30:00'    => "23:30",
        '00:00:00'    => "00:00",
        '00:30:00'    => "00:30",
        '01:00:00'    => "01:00",
        '01:30:00'    => "01:30",
        '02:00:00'    => "02:00",
        '02:30:00'    => "02:30",
        '03:00:00'    => "03:00",
        '03:30:00'    => "03:30",
        '04:00:00'    => "04:00",
        '04:30:00'    => "04:30",
        '05:00:00'    => "05:00",
        '05:30:00'    => "05:30",
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}

function pageType($all = "no")
{
    $array = array(
        'all'        => __('All'),
        'home'       => __('Home'),
        'about'      => __('About'),
        'contact'    => __('Contact'),
        'terms'      => __('Terms'),
        'privacy'    => __('Privacy'),
        'faq'        => __('Faq'),
        'profile'    => __('Profile'),
        // 'contact_form' => __('Contact Form'),
        // 'support'    => __('Support'),
        // 'branch'     => __('Branch'),
        // 'profile'    => __('Profile'),
        // 'team'       => __('Team'),
        // 'mission'    => __('Mission'),
        // 'vision'     => __('Vision'),
        // 'value'      => __('Value'),
        // 'address'    => __('Address'),
        // 'feature'    => __("Feature"),
        // 'gift'       => __("Gift"),
        // 'goal'       => __("Goal"),
        // 'testimonial' => __("Testimonial"),
        // 'service'    => __("Service"),
        // 'product'    => __("Product"),
        // 'category'   => __("Category"),
        // 'copyright'  => __('Copy Right'),
        // 'social'     => __('Social'),
        // 'slider'     => __('Slider'),
        // 'header'     => __('Header'),
        // 'footer'     => __('footer'),
    );
    if ($all == "no") {
        unset($array['all']);
    }
    return $array;
}
function notifiType()
{
    $array = array(
        'all' => __('All'),
        'firebase' => __('firebase'),
        'database' => __('database'),
    );
    return $array;
}


function currencyType($all = "no")
{
    $array = array(
        '' => __('None'),
        'EGP' => __('Egypt Pound'),
        'SAR' => __('Saudi Riyal'),
        'USD' => __('US Dollar'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}


function branchType($all = "no")
{
    $array = array(
        '' => __('Type'),
        'main' => __('Main'),
        'sub' => __('Sub'),
        // 'other' => __('Other'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}

function priorityType($all = "yes")
{
    $array = array(
        '' => __('None'),
        'low' => __('Low'),
        'normal' => __('Normal'),
        'high' => __('High'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}


function getModuleTableModelName($type)
{
    $array = array(
        'activity_logs' => 'Activity Log',
        'additions' => 'Addition',
        'actions' => 'Action',
        'addresses' => 'Address',
        'branches' => 'Branch',
        'brands' => 'Brand',
        'carts' => 'Cart',
        'categories' => 'Category',
        'currencies' => 'Currency',
        'countries' => 'Country',
        'cities' => 'City',
        'regions' => 'Region',
        'contacts' => 'Contact',
        'coupons' => 'Coupon',
        'groups' => 'Group',
        'reviews' => 'Review',
        'favorites' => 'Favorite',
        'sizes' => 'Size',
        'wallets' => 'Wallet',
        'points' => 'Point',
        'units' => 'Unit',
        'users' => 'User',
        'payments' => 'Payment',
        'products' => 'Product',
        'pages' => 'Page',
        'orders' => 'Order',
        'order_rejects' => 'Order Reject',
        'logs' => 'Log',
        'settings' => 'Setting',
        'roles' => 'Role',
        'translations' => 'Translation',
        'tables' => 'Table View',
        'images' => 'Image',
        'notifications' => 'Notification',
        'dashboard' => 'Dashboard',
        'statistics' => 'Statistics',
        'order' => 'Order',
        'admin' => 'Admin',
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function weekDays($all = "no")
{

    $array = array(
        '' => __('All'),
        'Sat' => __('Saturday'),
        'Sun' => __('Sunday'),
        'Mon' => __('Monday'),
        'Tue' => __('Tuesday'),
        'Wed' => __('Wednesday'),
        'Thu' => __('Thursday'),
        'Fri' => __('Friday'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}

function weekDaysNum()
{
    $array = array(
        1 => 'Sat',
        2 => 'Sun',
        3 => 'Mon',
        4 => 'Tue',
        5 => 'Wed',
        6 => 'Thu',
        7 => 'Fri',
    );

    return $array;
}
function userType($all = "yes", $is_search = "no",$is_all = "yes")
{
    $array = array(
        '' => __('None'),
        'client' => __('Client'),
        'store' => __('Store'),
        'delivery' => __('Delivery'),
        'account' => __('Account'),
        'account_manger' => __('Account Manger'),
        'account_admin' => __('Account Admin'),
        'call_center' => __('Call Center'),
        'call_center_manger' => __('Call Center Manger'),
        'call_center_admin' => __('Call Center Admin'),
        'office' => __('Office'),
        'office_manger' => __('Office Manger'),
        'office_admin' => __('Office Admin'),
        'sub_manger' => __('Sub Manger'),
        'manger' => __('Manger'),
        'sub_admin' => __('Sub Admin'),
        'admin' => __('Admin'),
        'super_admin' => __('Super Admin'),
    );
    if ($all != "yes") {
        unset($array['super_admin']);
        unset($array['admin']);
    }
    if (auth()->user()->type != "super_admin") {
        unset($array['super_admin']);
    }
    if (!in_array(auth()->user()->type,["super_admin",'admin','sub_admin'])) {
        unset($array['super_admin']);
        unset($array['admin']);
        unset($array['sub_admin']);

    }
    if (!in_array(auth()->user()->type,["super_admin",'admin','sub_admin','manger','sub_manger'])) {
        unset($array['super_admin']);
        unset($array['admin']);
        unset($array['sub_admin']);
        unset($array['manger']);
        unset($array['sub_manger']);
    }
    if ($is_search != "yes") {
        unset($array['']);
    }
    if ($is_all != "yes") {
        unset($array['client']);
        unset($array['store']);
        unset($array['delivery']);
    }
    return $array;
}

function nationalType($all = "no")
{
    $array = array(
        '' => __('None'),
        'card' => __('Card'),
        'passport' => __('Passport'),
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}


function notificationsType()
{
    $array = array(
        'admin' => "admin",
        'orders' => "orders",
        'services' => "services",
    );
    return $array;
}


function notificationsTypeModel()
{
    $array = array(
        'admin' => __(config('app.name')),
        'orders' => __("Order"),
        'services' => __("Service"),
    );
    return $array;
}

function filterType($all = "no")
{
    $array = array(
        '' => __('None'),
        'text' => ('Text'),
        'select' => ('Select'),
        'datepicker' => ('Date'),
        'number' => __('Number'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}


function paymentYear($all = "years")
{
    $array = array(
        1 => "1",
        2 => "2",
        3 => "3",
        4 => "4",
        5 => "5",
        6 => "6",
        7 => "7",
        8 => "8",
        9 => "9",
        10 => "10",
        11 => "11",
        12 => "12",
    );
    return $array;
}

function ratingStatus($all = "yes")
{
    $array = array(
        0 => __('None'),
        1 => "1",
        2 => "2",
        3 => "3",
        4 => "4",
        5 => "5",
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}


function digitalType($all = "yes")
{
    $array = array(
        '' => __('None'),
        'facebook' => __('Facebook'),
        'google' => __('Google'),
        'instagram' => __('Instagram'),
        'twitter' => __('Twitter'),
        'tiktok' => __('Tiktok'),
        'website' => __('website'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}


function userName($type = "")
{
    $array = array(
        'super_admin' => __('Super Admin'),
        'admin' => __('Admin'),
        'sub_admin' => __('Sub Admin'),
        'manger' => __('Manger'),
        'sub_manger' => __('Sub Manger'),
        'account' => __('Account'),
        'account_manger' => __('Account Manger'),
        'account_admin' => __('Account Admin'),
        'call_center' => __('Call Center'),
        'call_center_manger' => __('Call Center Manger'),
        'call_center_admin' => __('Call Center Admin'),
        'office' => __('Office'),
        'office_manger' => __('Office Manger'),
        'office_admin' => __('Office Admin'),
        'client' => __('Client'),
        'store' => __('Store'),
        'delivery' => __('Delivery'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}


function walletType()
{
    $array = array(
        'income' => __('Income'),
        'outcome' => __('Outcome'),

    );
    return $array;
}



function socialType($all = "no")
{
    $array = array(
        '' => __('All'),
        'facebook' => __('Facebook'),
        'google' => __('Google'),
        'instagram' => __('Instagram'),
        'twitter' => __('Twitter'),
        'tiktok' => __('Tiktok'),
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}

function couponType($all = "no")
{
    $array = array(
        '' => __('ALL'),
        'fixed' => __('Fixed'),
        'percentage' => __('Percentage'),
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}

function monthType()
{

    $array = array(
        "Jan" => __('January'),
        "Feb" => __('February'),
        "Mar" => __('March'),
        "Apr" => __('April'),
        "May" => __('May'),
        "Jun" => __('June'),
        "Jul" => __('July'),
        "Aug" => __('August'),
        "Sep" => __('September'),
        "Oct" => __('October'),
        "Nov" => __('November'),
        "Dec" => __('December'),
    );
    return $array;
}



function statusDefaultType()
{
    $array = array(
        0 => __('In Active'),
        1 => __('Active'),
    );
    return $array;
}

function statusType($all = "no")
{
    $array = array(
        -1 => __('Choose Status'),
        1 => __('Active'),
        0 => __('In Active'),
    );
    if ($all == "no") {
        unset($array[-1]);
    }
    return $array;
}

function statusShow($all = "no")
{
    $array = array(
        -1 => __('All'),
        1 => __('Yes'),
        0 => __('No'),
    );
    if ($all == "no") {
        unset($array[-1]);
    }
    return $array;
}


function orderType($all = "yes")
{
    $array = array(
        '' => __('Order Type'),
        "DESC" => "DESC",
        "ASC" => "ASC"
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}

function statusShowDefault($all = "no")
{
    $array = array(
        -1 => __('All'),
        0 => __('No'),
        1 => __('Yes'),
    );
    if ($all == "no") {
        unset($array[-1]);
    }
    return $array;
}

function showTypeDefault($all = "no")
{
    $array = array(
        "" => __('All'),
        "no" => __('No'),
        "yes" => __('Yes'),
    );
    if ($all == "no") {
        unset($array[""]);
    }
    return $array;
}
function orderStatus($all = "no")
{
    $array = array(
        "" => __('All'),
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
    );
    if ($all == "no") {
        unset($array[""]);
    }
    return $array;
}

function showTrashedDefault($all = "no")
{
    $array = array(
        "" => __('All'),
        "no" => __('No Trashed'),
        "yes" => __('With Trashed'),
    );
    if ($all == "no") {
        unset($array[""]);
    }
    return $array;
}

function showType($all = "no")
{
    $array = array(
        '' => __('All'),
        'yes' => __('Yes'),
        'no' => __('No'),
    );
    if ($all == "no") {
        unset($array['']);
    }
    return $array;
}



function statusName($type = null)
{
    $array = array(
        -1 => __('All'),
        1 => __('Active'),
        0 => __('In Active'),
    );

    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}


function statusShowName($type = null)
{
    $array = array(
        -1 => __('All'),
        1 => __('Yes'),
        0 => __('No'),
    );

    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function priorityName($type)
{
    $array = array(
        'low' => __('Low'),
        'normal' => __('Normal'),
        'high' => __('High'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function branchName($type)
{
    $array = array(
        '' => __('None'),
        'main' => __('Main'),
        'sub' => __('Sub'),
        'other' => __('Other'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function socialName($type = "")
{
    $array = array(
        'facebook' => __('Facebook'),
        'google' => __('Google'),
        'instagram' => __('Instagram'),
        'twitter' => __('Twitter'),
        'tiktok' => __('Tiktok'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function monthName($type = "")
{

    $array = array(
        "Jan" => __('January'),
        "Feb" => __('February'),
        "Mar" => __('March'),
        "Apr" => __('April'),
        "May" => __('May'),
        "Jun" => __('June'),
        "Jul" => __('July'),
        "Aug" => __('August'),
        "Sep" => __('September'),
        "Oct" => __('October'),
        "Nov" => __('November'),
        "Dec" => __('December'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function weekName($type = "")
{

    $array = array(
        'Sat' => __('Saturday'),
        'Sun' => __('Sunday'),
        'Mon' => __('Monday'),
        'Tue' => __('Tuesday'),
        'Wed' => __('Wednesday'),
        'Thu' => __('Thursday'),
        'Fri' => __('Friday'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}
function digitalName($type = "")
{
    $array = array(
        // ''          => __('None'),
        'facebook' => __('Facebook'),
        'google' => __('Google'),
        'instagram' => __('Instagram'),
        'twitter' => __('Twitter'),
        'tiktok' => __('Tiktok'),
        'website' => __('website'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function countries($all = "yes")
{
    $array = array(
        "" => __("None"),
        "AF" => "Afghanistan",
        "AX" => "Åland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, The Democratic Republic of The",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, The Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and The Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and The South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.S.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}

function countryName($type = "")
{

    $array = array(
        "AF" => "Afghanistan",
        "AX" => "Åland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, The Democratic Republic of The",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, The Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and The Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and The South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.S.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}


function filterAllValue($type = "")
{
    $array = array(
        // '' => __('None'),
        'ar' => __('Arabic'),
        'en' => __('English'),
        'all' => __('All'),
        'clients' => __('Clients'),
        'users' => __('Users'),
        'owner' => __('Owner'),
        'card' => __('Card'),
        'passport' => __('Passport'),
        'checkin' => __('Checkin'),
        'checkout' => __('Checkout'),
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
        'approve' => __('Approve'),
        'finish' => __('Finish'),
        'delay' => __('Delay'),
        'open' => __('Open'),
        'reject' => __('Reject'),
        'closed' => __('Closed'),
        'not_resolved' => __('Not Resolved'),
        'solved' => __('Solved'),
        'follow_up' => __('Follow Up'),
        'call' => __('Call'),
        'call_back' => __('Call Back'),
        'child'     => __('Child'),
        'son'       => __('Son'),
        'daughter'  => __('Daughter'),
        'wife'      => __('Wife'),
        'husband'   => __('Husband'),
        'father'    => __('Father'),
        'mother'    => __('Mother'),
        'grand_father'    => __('Grand Father'),
        'grand_mother'    => __('Grand Mother'),
        'sister'    => __('Sister'),
        'brother'   => __('Brother'),
        'uncle'    => __('Uncle'),
        'aunt'     => __('Aunt'),
        'cousin'   => __('Cousin'),
        'buyer' => __('Buyer'),
        'personal' => __('Personal'),
        'referral' => __('Referral'),
        'broker' => __('Broker'),
        'tv' => __('TV'),
        'old_data' => __('Old Data'),
        'data' => __('Data'),
        'call_drooped' => __('Call Drooped'),
        'cold_calls' => __('Cold Calls'),
        'client' => __('Client'),
        'empolyee' => __('Empolyee'),
        'email' => __('Email'),
        'meeting' => __('Meeting'),
        'sms' => __('SMS'),
        'new' => __('New'),
        'in_progress' => __('In Progress'),
        'in_active' => __('In Active'),
        'cancel' => __('Cancel'),
        'branches' => __('Branches'),
        'groups' => __('Groups'),
        'branch' => __('Branch'),
        'group' => __('Group'),
        'reasons' => __('Reason'),
        'other' => __('Other'),
        'active' => __('Active'),
        'unpaid' => __('Unpaid'),
        'paid' => __('Paid'),
        'income' => __('Income'),
        'outcome' => __('Outcome'),
        'cash' => __('Cash'),
        'bank' => __('Bank'),
        'check' => __('Check'),
        'google'  => __('Google'),
        'apple'   => __('Apple'),
        'paypal'  => __('Paypal'),
        'mada'    => __('Mada'),
        'paymob'  => __('Paymob'),
        'vodafone'=> __('Vodafone'),
        'we'      => __('We'),
        'orange'  => __('Orange'),
        'etisalat'=> __('Etisalat'),
        'fawry'   => __('Fawry'),
        'visa'    => __('Visa'),
        'bank_transfer' => __('Bank Transfer'),
        'master_card' => __('Master Card'),
        'apple_pay' => __('Apple Pay'),
        'google_pay' => __('Google Pay'),
        'text' => __('Text'),
        'select' => __('Select'),
        'datepicker' => __('Date'),
        'number' => __('Number'),
        'image' => __('Image'),
        'file' => __('File'),
        'qualified' => __('Qualified'),
        'fixed' => __('Fixed'),
        'percentage' => __('Percentage'),
        1 => __('Active'),
        0 => __('In Active'),
        'yes' => __('yes'),
        'no'  => __('No'),
        'planned' => __('Planned'),
        'not_planned' => __('Not Planned'),
        'done' => __('Done'),
        "AF" => "Afghanistan",
        "AX" => "Åland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, The Democratic Republic of The",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, The Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and The Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and The South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.S.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe",
        'PATCH' => __("Update"),
        'PUT' => __("Update"),
        'POST' =>  __("Create"),
        'DELETE' => __("Delete"),
        'GET' =>  __("Show"),
        'admin' => __('Admin'),
        'manger' => __('Manger'),
        'view' => __('View'),
        'create' => __('Create'),
        'edit' => __('Edit'),
        'show' => __('Show'),
        'delete' => __('Delete')
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function filterAllType($all = "yes")
{
    $array = array(
        'ar' => __('Arabic'),
        'en' => __('English'),
        'all' => __('All'),
        'clients' => __('Clients'),
        'users' => __('Users'),
        'owner' => __('Owner'),
        'card' => __('Card'),
        'passport' => __('Passport'),
        'checkin' => __('Checkin'),
        'checkout' => __('Checkout'),
        "request" => __('Request'),
        "pending" => __('Pending'),
        "approved" => __('Approved'),
        "preparing" => __('Preparing'),
        "preparing_finished" => __('Preparing Finished'),
        "delivery_go" => __('Delivery Go'),
        "delivered" => __('Delivered'),
        "cancelled" => __('Cancelled'),
        "rejected" => __('Rejected'),
        "returned" => __('Returned'),
        'approve' => __('Approve'),
        'finish' => __('Finish'),
        'delay' => __('Delay'),
        'open' => __('Open'),
        'reject' => __('Reject'),
        'closed' => __('Closed'),
        'not_resolved' => __('Not Resolved'),
        'solved' => __('Solved'),
        'follow_up' => __('Follow Up'),
        'call' => __('Call'),
        'call_back' => __('Call Back'),
        'child'     => __('Child'),
        'son'       => __('Son'),
        'daughter'  => __('Daughter'),
        'wife'      => __('Wife'),
        'husband'   => __('Husband'),
        'father'    => __('Father'),
        'mother'    => __('Mother'),
        'grand_father'    => __('Grand Father'),
        'grand_mother'    => __('Grand Mother'),
        'sister'    => __('Sister'),
        'brother'   => __('Brother'),
        'uncle'    => __('Uncle'),
        'aunt'     => __('Aunt'),
        'cousin'   => __('Cousin'),
        'buyer' => __('Buyer'),
        'personal' => __('Personal'),
        'referral' => __('Referral'),
        'broker' => __('Broker'),
        'tv' => __('TV'),
        'old_data' => __('Old Data'),
        'data' => __('Data'),
        'call_drooped' => __('Call Drooped'),
        'cold_calls' => __('Cold Calls'),
        'client' => __('Client'),
        'empolyee' => __('Empolyee'),
        'email' => __('Email'),
        'meeting' => __('Meeting'),
        'sms' => __('SMS'),
        'new' => __('New'),
        'free'     => __('Free'),
        'paid'      => __('Paid'),
        'in_progress' => __('In Progress'),
        'in_active' => __('In Active'),
        'cancel' => __('Cancel'),
        'branches' => __('Branches'),
        'groups' => __('Groups'),
        'branch' => __('Branch'),
        'group' => __('Group'),
        'reasons' => __('Reason'),
        'other' => __('Other'),
        'active' => __('Active'),
        'unpaid' => __('Unpaid'),
        'paid' => __('Paid'),
        'income' => __('Income'),
        'outcome' => __('Outcome'),
        'cash' => __('Cash'),
        'bank' => __('Bank'),
        'check' => __('Check'),
        'bank_transfer' => __('Bank Transfer'),
        'paypal' => __('Paypal'),
        'visa' => __('Visa'),
        'master_card' => __('Master Card'),
        'mada' => __('Mada'),
        'apple_pay' => __('Apple Pay'),
        'google_pay' => __('Google Pay'),
        'text' => __('Text'),
        'select' => __('Select'),
        'datepicker' => __('Date'),
        'number' => __('Number'),
        'image' => __('Image'),
        'file' => __('File'),
        'qualified' => __('Qualified'),
        'fixed' => __('Fixed'),
        'percentage' => __('Percentage'),
        1 => __('Active'),
        0 => __('In Active'),
        'yes' => __('yes'),
        'no'  => __('No'),
        'planned' => __('Planned'),
        'not_planned' => __('Not Planned'),
        'done' => __('Done'),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}
function getRouteName($route_type = "")
{
    $array = array(
        'admin' => 'admin',
        'client' => 'client',
        'employee' => 'employee',
        'facilty' => 'facilty',
    );
    if (isset($array[$route_type])) {
        return $array[$route_type];
    } else {
        return "admin";
    }
}


function nationalName($type = "")
{
    $array = array(
        '' => __('None'),
        'card' => __('Card'),
        'passport' => __('Passport'),
    );

    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function logActionType($all = "yes")
{
    $array = array(
        '' => __('None'),
        'Update' => __("Update"),
        'Create' =>  __("Create"),
        'Delete' => __("Delete"),
        'Show' =>  __("Show"),
    );
    if ($all != "yes") {
        unset($array['']);
    }
    return $array;
}

function logActionName($type)
{
    $array = array(
        'Create' => ("POST"),
        'Show' => ("GET"),
        'Update' => ("PUT"),
        'Delete' => ("DELETE"),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function logAction($type)
{
    $array = array(
        '' => __('None'),
        'PATCH' => __("Update"),
        'PUT' => __("Update"),
        'POST' =>  __("Create"),
        'DELETE' => __("Delete"),
        'GET' =>  __("Show"),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return $type;
    }
}

function notificationSystemRoute($type = "")
{
    $array = [
        'orders' => "orders",
        'services' => "services",
    ];
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return "";
    }
}

function pageName($type = "")
{
    $array = array(
        'all'        => __('All'),
        'home'       => __('Home'),
        'about'      => __('About'),
        'contact'    => __('Contact'),
        'contact_form' => __('Contact Form'),
        'terms'      => __('Terms'),
        'support'    => __('Support'),
        'privacy'    => __('Privacy'),
        'faq'        => __('Faq'),
        'branch'     => __('Branch'),
        'profile'    => __('Profile'),
        'team'       => __('Team'),
        'mission'    => __('Mission'),
        'vision'     => __('Vision'),
        'value'      => __('Value'),
        'address'    => __('Address'),
        'work_time'  => __('Work Time'),
        'appointment' => __("Appointment"),
        'feature'    => __("Feature"),
        'gift'       => __("Gift"),
        'goal'       => __("Goal"),
        'testimonial' => __("Testimonial"),
        'service'    => __("Service"),
        'post'       => __("Post"),
        'product'    => __("Product"),
        'category'   => __("Category"),
        'copyright'  => __('Copy Right'),
        'social'     => __('Social'),
        'slider'     => __('Slider'),
        'header'     => __('Header'),
        'footer'     => __('footer'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return "";
    }
}

function hourName($type)
{
    $array = array(
        '00:00:00'    => "00:00",
        '00:30:00'    => "00:30",
        '01:00:00'    => "01:00",
        '01:30:00'    => "01:30",
        '02:00:00'    => "02:00",
        '02:30:00'    => "02:30",
        '03:00:00'    => "03:00",
        '03:30:00'    => "03:30",
        '04:00:00'    => "04:00",
        '04:30:00'    => "04:30",
        '05:00:00'    => "05:00",
        '05:30:00'    => "05:30",
        '06:00:00'    => "06:00",
        '06:30:00'    => "06:30",
        '07:00:00'    => "07:00",
        '07:30:00'    => "07:30",
        '08:00:00'    => "08:00",
        '08:30:00'    => "08:30",
        '09:00:00'    => "09:00",
        '09:30:00'    => "09:30",
        '10:00:00'    => "10:00",
        '10:30:00'    => "10:30",
        '11:00:00'    => "12:00",
        '11:30:00'    => "12:30",
        '12:00:00'    => "12:00",
        '12:30:00'    => "12:30",
        '13:00:00'    => "13:00",
        '13:30:00'    => "13:30",
        '14:00:00'    => "14:00",
        '14:30:00'    => "14:30",
        '15:00:00'    => "15:00",
        '15:30:00'    => "15:30",
        '16:00:00'    => "16:00",
        '16:30:00'    => "16:30",
        '17:00:00'    => "17:00",
        '17:30:00'    => "17:30",
        '18:00:00'    => "18:00",
        '18:30:00'    => "18:30",
        '19:00:00'    => "19:00",
        '19:30:00'    => "19:30",
        '20:00:00'    => "20:00",
        '20:30:00'    => "20:30",
        '21:00:00'    => "21:00",
        '21:30:00'    => "21:30",
        '22:00:00'    => "22:00",
        '22:30:00'    => "22:30",
        '23:00:00'    => "23:00",
        '23:30:00'    => "23:30",
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return "";
    }
}

function supportName($type)
{
    $array = array(
        '' => __('None'),
        'username' => __('Change User Name'),
        'password' => __('Change Password'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return "";
    }
}

function checkPermView($route_admin)
{
    $route_name = false;
    $permission = Permission::whereRaw("FIND_IN_SET('$route_admin',name)")->first();
    if ($permission) {
        if (auth('web')->user()->isAbleTo($permission->name)) {
            $route_name =  true;
        }
    }
    return $route_name;
}

function relativeType($all = "yes")
{
    $types = array(
        ''          => __('None'),
        'child'     => __('Child'),
        'son'       => __('Son'),
        'daughter'  => __('Daughter'),
        'wife'      => __('Wife'),
        'husband'   => __('Husband'),
        'grand_father' => __('Grand Father'),
        'grand_mother' => __('Grand Mother'),
        'father'    => __('Father'),
        'mother'    => __('Mother'),
        'sister'    => __('Sister'),
        'brother'   => __('Brother'),
        'uncle'     => __('Uncle'),
        'aunt'      => __('Aunt'),
        'cousin'    => __('Cousin'),
        'other'     => __('Other'),
    );
    if ($all != "yes") {
        unset($types['']);
    }

    return $types;
}

function currencyName($type)
{
    $array = array(
        'EGP' => __('Egypt Pound'),
        'SAR' => __('Saudi Riyal'),
        'USD' => __('US Dollar'),
    );
    if (isset($array[$type])) {
        return $array[$type];
    } else {
        return "";
    }
}


