<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Region;

class ReportController extends Controller
{
    public function profitReport(Request $request)
    {

        // return Order::all();
        $days  =  Order::select(DB::raw('(SUM(total_selling_price) - (SUM(total_purchasing_price) - SUM(total_discount))) as price')
                        ,DB::raw('DAYNAME(created_at) as day_name') , DB::raw('DAY(created_at) as day'))
                        ->whereBetween(DB::raw('DATE_FORMAT(created_at , "%Y-%m-%d")') ,[$request->from  , $request->to])
                        ->groupBy('day_name' , 'day')->orderBy('day')->get();

        $months =    Order::select(DB::raw('(SUM(total_selling_price) - (SUM(total_purchasing_price) - SUM(total_discount))) as price')
                        ,DB::raw('MONTHNAME(created_at) as month_name') , DB::raw('MONTH(created_at) as month'))
                        ->whereBetween(DB::raw('DATE_FORMAT(created_at , "%Y-%m-%d")') ,[$request->from  , $request->to])
                        ->groupBy('month_name' , 'month')->orderBy('month')->get();


        $years =    Order::select(DB::raw('(SUM(total_selling_price) - (SUM(total_purchasing_price) - SUM(total_discount))) as price')
                        ,DB::raw('YEAR(created_at) as year'))
                        ->whereBetween(DB::raw('DATE_FORMAT(created_at , "%Y-%m-%d")') ,[$request->from  , $request->to])
                        ->groupBy('year')->orderBy('year')->get();


                 $data = [];
                 foreach ($days as $key => $order) {
                     $data['label'][] = $order->day_name;
                     $data['data'][] = (float)$order->price;
                 }


                $moth = [];
                foreach ($months as $key => $month) {
                    $moth['label'][] = $month->month_name;
                    $moth['data'][] = (float)$month->price;
                }

                $yar = [];
                foreach ($years as $key => $year) {
                    $yar['label'][] = $year->year;
                    $yar['data'][] = (float)$year->price;
                }

                // return $moth;

         $data['chart_data'] = json_encode($data);
         $data['chart_month'] = json_encode($moth);
         $data['chart_year'] = json_encode($yar);

        //  return $data;
         $data['from'] = $request->from;
         $data['to'] = $request->to;
        return view('app.reoprt.profi_report' , $data);
    }

    public function clientReport(Request $request)
    {
       $clients = User::select(DB::raw('COUNT(*) as count')
       ,DB::raw('YEAR(created_at) as year'))
       ->whereBetween(DB::raw('DATE_FORMAT(created_at , "%Y-%m-%d")') ,[$request->from  , $request->to])
       ->groupBy('year')->orderBy('year')->get();

       $clint = [];
        foreach ($clients as $key => $client) {
            $clint['label'][] = $client->year;
            $clint['data'][] = (float)$client->count;

        }

        $data['chart_data'] = json_encode($clint);
        $data['from'] = $request->from;
        $data['to'] = $request->to;
        return view('app.reoprt.client_report' , $data);
    }

    public function deliveryReport(Request $request)
    {
        // return $request->to;
       $deliveries = City::select(DB::raw('SUM(regular_delivery_price) as normal_price')
            ,DB::raw('SUM(fast_delivery_price) as fast_price')
            ,DB::raw('YEAR(created_at) as year'))
            ->where('id', $request->city_id )->where('region_id' , $request->region_id)
            ->whereBetween(DB::raw('DATE_FORMAT(created_at , "%Y-%m-%d")') ,[$request->from  , $request->to])
            ->groupBy('year')->orderBy('year')->get();


        // return $deliveries;

       $dlivery = [];
        foreach ($deliveries as $key => $delivery) {
            $dlivery['label'][] = $delivery->year;
            $dlivery['normal'][] = (float)$delivery->normal_price;
            $dlivery['fast'][] = (float)$delivery->fast_price;

        }

        $data['chart_data'] = json_encode($dlivery);
        $data['from'] = $request->from;
        $data['to'] = $request->to;
        $data['city_id'] = $request->city_id;
        $data['region_id'] = $request->region_id;
        $data['cities'] = City::all();
        $data['regions'] = Region::all();
        
        return view('app.reoprt.derivery_report' , $data);
    }
}
