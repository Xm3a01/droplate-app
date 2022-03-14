<?php

namespace App\Http\Controllers\Api\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportControler extends Controller
{
    public function winReport(Request $request)
    {
     return DB::table('orders')
            ->select(DB::raw('SUM(total_vat) + SUM(total_purchasing_price) + 
            SUM(total_purchasing_price) as total_price') , 
            DB::raw('COUNT(DAY(created_at)) as count'))
          ->groupBy(DB::raw('DAY(created_at)'))->get();
    }
}
