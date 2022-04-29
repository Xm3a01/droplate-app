<?php namespace App\Traits;

use App\Models\Order;
use App\Models\Wallet;
use App\Models\Setting;

trait WalletTrait {
    public function wallet($user_id , $product)
    {
        $user_product = Order::where('user_id' , $user_id)->whereHas('orderDetails' ,
         function($q) use ($product){
             $q->where('product_id' , $product->id);
         })->first();

         if(!is_null($user_product)) {
            $wallet = Wallet::where('user_id' , $user_id)->first();

            if(is_null($wallet)){
                $wallet = new Wallet();
                $wallet->user_id = $user_id;
               
            } 
    
            $wallet->points += 1;
            if($wallet->points % Setting::first()->points == 0) {
                $wallet->credit += 1;
            }
            
            switch ($wallet->points) {
                case 10000:
                    $wallet->membership = 'Silver';
                    break;
                case 12000:
                    $wallet->membership = 'Gold';
                    break;
                case 15000:
                    $wallet->membership = 'Loyal';
                    break;
            }
    
            $wallet->save();
         }
    }

    public function order_wallet($user_id , $order_status)
    {

        // if($order_status == 1) {

            $wallet = Wallet::where('user_id' , $user_id)->first();

            if(is_null($wallet)){
                $wallet = new Wallet();
                $wallet->user_id = $user_id;
               
            } 
            $wallet->points += 1;
            if($wallet->points % Setting::first()->points == 0) {
                $wallet->credit += 1;
            }
            
            switch ($wallet->points) {
                case 10000:
                    $wallet->membership = 'Silver';
                    break;
                case 12000:
                    $wallet->membership = 'Gold';
                    break;
                case 15000:
                    $wallet->membership = 'Loyal';
                    break;
            }

            $wallet->save();
        // }
    }
}