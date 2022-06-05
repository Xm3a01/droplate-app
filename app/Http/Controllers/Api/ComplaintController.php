<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function store(Request $request)
    {
        Complaint::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Your Complaint add Successfully' , 'status' => true]);
    }
}
