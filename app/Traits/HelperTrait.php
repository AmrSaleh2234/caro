<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Addition;
use App\Models\CartItem;
use App\Models\Currency;
use App\Models\CartItemAddition;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait HelperTrait
{

    // protected $site_url = "http://127.0.0.1:8000";
    // public function __construct()
    // {
    //  $this->site_url= config('app.url');
    // }

    protected $successStatus = 'success';
    protected $errorStatus = 'error';
    protected $unauthenticatedStatus = 'unauthenticated';
    protected $unauthorizedStatus = 'unauthorized';
    public function uploadImage($image, $folder_path = "", $is_upload = 1)
    {
        $upload = "/uploads/";
        if ($folder_path != "") {
            $upload = "/uploads/" . $folder_path . "/";
        }
        $name = str_random(8);
        $path = public_path() . $upload;

        if ($is_upload == 0) {
            $extension = pathinfo($image, PATHINFO_EXTENSION);
        } else {
            $extension = $image->getClientOriginalExtension();
        }
        $filename = $name . '.' . $extension;
        if ($is_upload == 0) {
            $img = Image::make($image);
        } else {
            $img = Image::make($image->getRealPath());
        }
        // $img->resize(100, 100);
        $img->save($path . $filename);
        //$this->site_url .
        return $upload . $filename;
    }

    public function deleteFile($file)
    {
        if ($file != NULL && $file != "") {
            return File::delete(public_path() . $file);
        }
    }


    public function uploadFile($file, $folder_path = "")
    {
        $upload = "/uploads/files/";
        if ($folder_path != "") {
            $upload = "/uploads/files/" . $folder_path . "/";
        }
        $name = str_random(8);
        $path = public_path() . $upload;
        $extension = $file->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $file->move($path, $filename);
        return $upload . $filename;
    }

    public function ContentImage($content_replace, $image_before = 'src="../../uploads')
    {
        // $image_after = "src=" . $this->site_url . "/uploads";
        $image_after = "src=/uploads";
        $content = str_replace($image_before, $image_after, $content_replace);
        return stripslashes($content);
    }

    public function getImage($image)
    {
        if ($image != "" && $image != NULL) {
            return str_replace(url(''), "", $image);
        }
    }

    public function getImagePath($request, $folder_path = "", $file = "image", $is_upload = 1)
    {
        $path = NULL;
        if ($request->hasFile($file)) {
            $image = $request->file($file);
            $path = $this->uploadImage($image, $folder_path, $is_upload);
        }
        return $path;
    }

    public function getName($name_ar, $name_en)
    {
        return array(
            'ar' => htmlspecialchars($name_ar, ENT_NOQUOTES, "UTF-8"),
            'en' => trim(filter_var($name_en, FILTER_SANITIZE_STRING))
        );
    }

    public function getContent($name_ar, $name_en)
    {
        return array(
            'ar' => trim($name_ar),
            'en' => trim($name_en),
        );
    }

    public function getNameNull()
    {
        return array(
            'ar' => "",
            'en' => ""
        );
    }

    public function whereID($data_all, $id, $table = NULL)
    {
        if ($id > 0) {
            if ($table == NULL) {
                $data_all->where('id', $id);
            } else {
                $data_all->where($table . '.id', $id);
            }
        }
        return $data_all;
    }

    public function whereUser($data_all, $user_id, $table = NULL)
    {
        if ($user_id > 0) {
            if ($table == NULL) {
                $data_all->where('user_id', $user_id);
            } else {
                $data_all->where($table . '.user_id', $user_id);
            }
        }
        return $data_all;
    }

    public function whereActive($data_all, $active, $table = NULL)
    {
        if ($active > -1) {
            if ($table == NULL) {
                $data_all->where('active', $active);
            } else {
                $data_all->where($table . '.active', $active);
            }
        }
        return $data_all;
    }

    public function whereFeature($data_all, $feature, $table = NULL)
    {
        if ($feature > -1) {
            if ($table == NULL) {
                $data_all->where('feature', $feature);
            } else {
                $data_all->where($table . '.feature', $feature);
            }
        }
        return $data_all;
    }

    public function whereStatus($data_all, $status, $table = NULL)
    {
        if ($status != "") {
            if ($table == NULL) {
                $data_all->where('status', $status);
            } else {
                $data_all->where($table . '.status', $status);
            }
        }
        return $data_all;
    }

    public function whereType($data_all, $type, $table = NULL)
    {
        if ($type != "") {
            if ($table == NULL) {
                $data_all->where('type', $type);
            } else {
                $data_all->where($table . '.type', $type);
            }
        }
        return $data_all;
    }

    public function whereEmail($data_all, $email, $table = NULL)
    {
        if ($email != "") {
            if ($table == NULL) {
                $data_all->where('email', $email);
            } else {
                $data_all->where($table . '.email', $email);
            }
        }
        return $data_all;
    }

    public function wherePhone($data_all, $phone, $table = NULL)
    {
        if ($phone != "") {
            if ($table == NULL) {
                $data_all->where('phone', $phone);
            } else {
                $data_all->where($table . '.phone', $phone);
            }
        }
        return $data_all;
    }

    public function whereName($data_all, $name, $table = NULL)
    {
        if ($name != "") {
            if ($table == NULL) {
                $data_all->where('name', $name);
            } else {
                $data_all->where($table . '.name', $name);
            }
        }
        return $data_all;
    }

    public function whereParent($data_all, $parent, $id, $table = NULL)
    {
        if ($parent == false) {
            if ($id > 0) {
                if ($table == NULL) {
                    $data_all->where('parent_id', $id);
                } else {
                    $data_all->where($table . '.parent_id', $id);
                }
            } else {
                if ($table == NULL) {
                    $data_all->whereNull('parent_id');
                } else {
                    $data_all->whereNull($table . '.parent_id');
                }
            }
        } else {
            if ($table == NULL) {
                $data_all->where('id', $id);
            } else {
                $data_all->where($table . '.id', $id);
            }
        }
        return $data_all;
    }

    public function whereLike($data_all, $name, $column = "name", $table = "users", $start_with = false)
    {

        if ($name != 'ar' && $name != 'en' && $name != "") {
            $searchValues = preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY);
            $data_all->where(function ($query) use ($searchValues, $table, $column, $start_with) {
                foreach ($searchValues as $value) {
                    if ($start_with != false) {
                        $query->orWhere($table . "." . $column, 'like', $value . '%');
                    } else {
                        $query->orWhere($table . "." . $column, 'like', '%' . $value . '%');
                    }
                }
            });
        }

        return $data_all;
    }

    public function dateFilter($data_all, $date_start, $date_end, $table = "users", $column = "created_at")
    {
        if ($date_start != '' || $date_end != '') {
            if ($date_start == $date_end) {
                $data_all->whereDate($table . '.' . $column, $date_start);
            } else {
                if ($date_start != '') {
                    $data_all->whereDate($table . '.' . $column, '>=', $date_start);
                }
                if ($date_end != '' && ($date_start == '' || $date_end > $date_start)) {
                    $data_all->whereDate($table . '.' . $column, '<=', $date_end);
                }
            }
        }
        return $data_all;
    }

    public function dateFilterColumn($data_all, $date_start, $date_end, $table = "users", $column_start = "created_at", $column_end = "updated_at")
    {
        if ($date_start != '' || $date_end != '') {
            if ($date_start == $date_end) {
                $data_all->whereDate($table . '.' . $column_start, $date_start);
                $data_all->whereDate($table . '.' . $column_end, $date_start);
            } else {
                if ($date_start != '') {
                    $data_all->whereDate($table . '.' . $column_start, '>=', $date_start);
                }
                if ($date_end != '' && ($date_start == '' || $date_end > $date_start)) {
                    $data_all->whereDate($table . '.' . $column_end, '<=', $date_end);
                }
            }
        }
        return $data_all;
    }

    public function whereRead($data_all, $is_read = -1, $table = NULL)
    {
        if ($is_read > -1) {
            if ($table == NULL) {
                $data_all->where('is_read', $is_read);
            } else {
                $data_all->where($table . '.is_read', $is_read);
            }
        }
        return $data_all;
    }

    public function getInputKey($input, $except_array = [])
    {
        foreach ($input as $key => $value) {
            if (!in_array($key, $except_array)) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
        }
        return $input;
    }

    public function whereFieldName($data_all, $name = "", $field = "name", $table = NULL)
    {
        if ($name != "") {
            if ($table == NULL) {
                $data_all->where($field, $name);
            } else {
                $data_all->where($table . '.' . $field, $name);
            }
        }
        return $data_all;
    }

    public function whereFieldActive($data_all, $name = -1, $field = "active", $table = NULL)
    {
        if ($name > -1) {
            if ($table == NULL) {
                $data_all->where($field, $name);
            } else {
                $data_all->where($table . '.' . $field, $name);
            }
        }
        return $data_all;
    }

    public function whereFieldModel($data_all, $name = 0, $field = "user_id", $table = NULL)
    {
        if ($name > 0) {
            if ($table == NULL) {
                $data_all->where($field, $name);
            } else {
                $data_all->where($table . '.' . $field, $name);
            }
        }
        return $data_all;
    }

    public function getCurrencyViewShow()
    {
        return getCurrencyView();
    }

    public function getusersAdmin()
    {
        return User::active()->where('is_notify', 1)->pluck('id', 'id')->toArray();
    }

    public function getOptionsCart()
    {
        return Setting::whereIn('key', ['shipping', 'delivery_cost', 'min_order', 'max_order'])->pluck('value', 'key')->toArray();
    }
    public function changeCartItem($cart_item, $cart_item_id)
    {
        $addition_amount_total = CartItemAddition::where('cart_item_id', $cart_item_id)->sum('amount');
        $addition_price_total  = CartItemAddition::where('cart_item_id', $cart_item_id)->sum('total');
        $total_amount =  sum($addition_amount_total, $cart_item->amount);
        $total_price = multiple(sum($addition_price_total, $cart_item->price),$cart_item->amount);
        return CartItem::updateItemAddition($cart_item_id, $addition_price_total, $total_price, $addition_amount_total, $total_amount);
    }

    public function updateCartItemAddition($cart_item, $cart_item_id, $additions, $product_id, $is_addition)
    {
        if ($is_addition > 0) {
            CartItemAddition::where('cart_item_id', $cart_item_id)->delete();
            if (!empty($additions)) {
                foreach ($additions as $key => $value) {
                    $addition_id   = (int) stripslashes(trim(filter_var($value['addition_id'], FILTER_SANITIZE_STRING)));
                    $addition_amount   = doubleval(stripslashes(trim(filter_var($value['amount'], FILTER_SANITIZE_STRING))));
                    $addition = Addition::where('id', $addition_id)->whereHas('products', function ($q) use ($product_id) {
                        $q->where('id', $product_id);
                    })->first();
                    if (isset($addition) && $addition_amount > 0) {
                        $insert_addition = new CartItemAddition();
                        $insert_addition->insertItem($cart_item_id, $addition_id, $addition->price, $addition_amount, multiple($addition_amount, $addition->price));
                    }
                }
            }
        }
        $this->changeCartItem($cart_item, $cart_item_id);
    }

    public function updateCartItem($cart_id, $product, $amount, $product_child_id, $note = NULL)
    {
        $price_addition = $amount_addition = $offer_amount = $offer_amount_add = $total_amount =0;
        $product_id = $product->id;
        $price = $product->price;
        $offer_price = $product->offer_price;
        if ($product_child_id > 0) {
            $product_child = Product::where('id', $product_child_id)->where('parent_id', $product_id)->first();
            if (isset($product_child)) {
                $price = $product_child->price;
                $offer_price = $product_child->offer_price;
            } else {
                $product_child_id = NULL;
            }
        } else {
            $product_child_id = NULL;
        }

        $total = multiple($price, $amount);
        $cart_item = CartItem::foundItemProduct($cart_id, $product_id);
        if (isset($cart_item)) {
            $cart_item_id = $cart_item->id;
            $total_amount =  sum($amount, $cart_item->amount_addition);
            $total_price = multiple(sum($price,$cart_item->price_addition), $amount);
            CartItem::updateItem(
                $cart_item_id,
                $product_child_id,
                $cart_item->price_addition,
                $offer_price,
                $price,
                $total,
                $total_price,
                $cart_item->amount_addition,
                $amount,
                $total_amount,
                $offer_amount,
                $offer_amount_add,
                $note
            );
            $message = __('Update Cart Item');
        } else {
            $message = __('Create Cart Item');
            $item_insert = new CartItem();
            $item_insert->insertItem(
                $cart_id,
                $product_id,
                $product_child_id,
                $price_addition,
                $offer_price,
                $price,
                $total,
                $total,
                $amount_addition,
                $amount,
                $amount,
                $offer_amount,
                $offer_amount_add,
                $note
            );
            $cart_item_id = $item_insert->id;
        }
        $cart_item_found = CartItem::foundItemProduct($cart_id, $product_id);
        return ['cart_item' => $cart_item_found, 'cart_item_id' => $cart_item_id, 'message' => $message];
    }
}
