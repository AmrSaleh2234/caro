<?php
namespace App\Traits;

use App\Models\Branch;
use App\Models\Payment;
use App\Models\Category;

trait ApiTrait {


    public function getCategories($parent = false,$id = 0)
    {
        $data = Category::active()->orderby('order_id')->orderby('created_at','DESC');
        if($parent != false){
            $data->whereNull('parent_id');
        }
        if($id > 0){
            $data->where('id','<>',$id);
        }
        return $data->get();
    }

    public function getPayments()
    {
        return Payment::active()->orderby('order_id')->orderby('created_at','DESC')->get();
    }

    public function getBranches()
    {
        return Branch::active()->orderby('order_id')->orderby('created_at','DESC')->get();
    }

}




