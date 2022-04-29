<?php

namespace App\Http\Controllers\Api\Review;

use App\Models\User;
use App\Models\Review;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Setting;
use App\Traits\WalletTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RevivwResource;

class ReviewController extends Controller
{

    use WalletTrait;
    
    public function add_review(Request $request , Product $product)
    {
        $user = User::find(Auth::guard('sanctum')->user()->id);
        $product->reviews()->create([
            'user_id' => $user->id,
            'review' => $request->review,
            'rate' => $request->rate
        ]);

        $this->wallet($user->id , $product);

        return  response()->json(['message' => 'Review add Successfully' , 'status'=> true]);
    }

    public function index()
    {
        $review = Review::with('user')->get();
        return RevivwResource::collection($review);
    }

    public function show($product_id)
    {

        $product = Product::with('reviews')->find($product_id);
        if($product) {
            $reviews = $product->reviews;
            return RevivwResource::collection($reviews);
        } else {
            return  response()->json(['message' => 'No Product' , 'status'=> false]);
        }
        // return $reviews;
    }

    public function rate()
    {
        $rate = Review::avg('rate');
        $rateCount = Review::sum('rate');

        return response()->json(['data' => ['rate' => $rate , 'rateCount' => $rateCount]]);
    }
}
