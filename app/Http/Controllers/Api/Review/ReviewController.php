<?php

namespace App\Http\Controllers\Api\Review;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add_review(Request $request , Product $product)
    {
        // return $request;
        $product->reviews()->create([
            'user_id' => Auth::guard('sanctum')->user()->id,
            'review' => $request->review,
            'rate' => $request->rate
        ]);

        return  response()->json(['message' => 'Review add Successfully' , 'status'=> true]);
    }
}
