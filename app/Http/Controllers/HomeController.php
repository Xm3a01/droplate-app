<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('order_status' , 1)->count();
        $products = Product::where('quantity' ,'>', 0)->count();
        $brands = SubCategory::count();

        return view('dashboard' , [
            'orders' => $orders,
            'products' => $products,
            'brands' => $brands,
        ]);
    }
}
