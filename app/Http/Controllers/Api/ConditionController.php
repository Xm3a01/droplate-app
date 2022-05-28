<?php

namespace App\Http\Controllers\Api;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionController extends Controller
{
   public function condition()
   {
       return response()->json(['condition' => Condition::first() , 'status' => true]);
   }
}
