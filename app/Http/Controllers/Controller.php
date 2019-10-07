<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getTotal($cart)
    {
        if($cart){
            $total = 0;
            foreach ($cart as $value){
                $total += ($value['price'] - $value['price']*$value['sale']%100 )*  $value['qty'];
            }
            return $total;
        }
    }
}
