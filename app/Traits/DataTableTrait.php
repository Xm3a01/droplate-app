<?php

namespace App\Traits;


use Carbon\Carbon;
use App\Models\Ads;
use App\Models\City;
use App\Models\User;
use App\Helper\Place;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Region;
use App\Models\Product;
use App\Models\Category;
use App\Models\productt;
use App\Models\PromCode;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

trait DataTableTrait
{

    public function productDataTable($request)
    {
        // dd($request);
        $products  = Product::select('*')->with(['category', 'subCategory']);

        return Datatables::of($products)

            ->filter(function ($instance) use ($request) {


                if ($request->name != '') {
                    $instance->where('name->ar', 'like', "%{$request->get('name')}%")
                      ->orWhere('name->en', 'like', "%{$request->get('name')}%");
                }

                if ($request->year != '') {
                    $instance->whereYear('created_at', '=', "{$request->get('year')}");
                }

                if ($request->month != '') {
                    $instance->whereMonth('created_at', '=', "{$request->get('month')}");
                }
            })
            ->addColumn('action', function ($product) {
                return  '<a class="btn btn-primary btn-xs" href="' . route('products.edit', $product->id) . '"> <i class="fas fa-edit"></i> </a>
                    <a class="btn btn-info btn-xs" href="' . route('products.show', $product->id) . '"><i class="fas fa-info"></i></a>
                    <a class="btn btn-danger btn-xs" data-url = "' . route('products.destroy', $product->id) . '" href=""><i class="fas fa-trash"></i></a>
                    ';
                // : '<div class="col-md-4"><a class="btn btn-info btn-xs" href="">view</a></div>';
            })
            ->addColumn('date', function ($product) {
                return $product->created_at->format('d M ,y h:i A');
            })
            ->addColumn('name', function ($product) {
                return $product->getTranslation('name', 'en') . ' / ' . $product->getTranslation('name', 'ar');
            })
            ->addColumn('descripton', function ($product) {
                return Str::words($product->descripton, 3, '...');
            })
            ->addColumn('category', function ($product) {
                return $product->category->name ?? "";
            })
            ->addColumn('sub_category', function ($product) {
                return $product->subCategory->name ?? "";
            })
            ->addColumn('status', function ($product) {
                return $product->quantity > 0
                    ? '<a class="btn bg-green btn-xs text-xs" href=""> in Stock </a>'
                    : '<a class="btn btn-danger btn-xs text-xs" href=""> out stock </a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    public function categoryDataTable($request)
    {
        // dd($request);
        $categories  = Category::select('*');

        return Datatables::of($categories)

            ->filter(function ($instance) use ($request) {


                if ($request->name != '') {
                    $instance->where('name->ar', 'like', "%{$request->get('name')}%")
                      ->orWhere('name->en', 'like', "%{$request->get('name')}%");
                }
            })
            ->addColumn('action', function ($category) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('categories.edit', $category->id) . '"><i class = "fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('categories.destroy', $category->id) . '" ><i class = "fa fa-trash"></i></a></div>
                  </div>';
            })
            ->addColumn('date', function ($category) {
                return $category->created_at->format('d M ,y h:i A');
            })
            ->addColumn('ar_name', function ($category) {
                return $category->name ? $category->getTranslation('name', 'ar') : "";
            })
            ->addColumn('name', function ($category) {
                return $category->name ? $category->getTranslation('name', 'en') : "";
            })
            ->make(true);
    }

    public function subCategoryDataTable($request)
    {
        // dd($request);
        $sub_categories  = SubCategory::with('category')->select('*');

        return Datatables::of($sub_categories)

            ->filter(function ($instance) use ($request) {


                if ($request->name != '') {
                    $instance->where('name->ar', 'like', "%{$request->get('name')}%")
                      ->orWhere('name->en', 'like', "%{$request->get('name')}%");
                }
            })
            ->addColumn('action', function ($sub_category) {

                return '<div class="row">
                    <div class="col-md-4"><a class="btn btn-primary btn-xs" href="' . route('sub_categories.edit', $sub_category->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-5"><a class="btn btn-danger btn-xs" data-url = "' . route('sub_categories.destroy', $sub_category->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })
            ->addColumn('date', function ($sub_category) {
                return $sub_category->created_at->format('d M ,y h:i A');
            })
            ->addColumn('ar_name', function ($sub_category) {
                return $sub_category->name ? $sub_category->getTranslation('name', 'ar') : "";
            })
            ->addColumn('name', function ($sub_category) {
                return  $sub_category->name ? $sub_category->getTranslation('name', 'en') : "";
            })
            ->addColumn('category', function ($sub_category) {
                return $sub_category->category ? $sub_category->category->getTranslation('name', 'en') : "";
            })
            ->addColumn('ar_category', function ($sub_category) {
                return $sub_category->category ? $sub_category->category->getTranslation('name', 'ar') : "";
            })

            ->make(true);
    }

    public function promoDataTable($request)
    {
        // dd($request);
        $proms  = PromCode::select('*');

        return Datatables::of($proms)

            ->filter(function ($instance) use ($request) {


                if ($request->year != '') {
                    $instance->whereYear('created_at', '=', "{$request->get('year')}");
                }


                if ($request->day != '') {
                    $instance->whereDay('created_at', '=', "{$request->get('day')}");
                }

                if ($request->month != '') {
                    $instance->whereMonth('created_at', '=', "{$request->get('month')}");
                }
            })
            ->addColumn('action', function ($prom) {

                return '<div class="row">
                    <div class="col-md-4"><a class="btn btn-primary btn-xs" href="' . route('promoes.edit', $prom->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-5"><a class="btn btn-danger btn-xs" data-url = "' . route('promoes.destroy', $prom->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })
            ->addColumn('start_date', function ($proms) {
                return  Carbon::parse($proms->start_date)->format('d M ,y h:i A');
            })
            ->addColumn('expir_date', function ($proms) {
                return Carbon::parse($proms->end_date)->format('d M ,y h:i A');
            })


            ->make(true);
    }

    public function adsDataTable($request)
    {
        $ads  = Ads::select('*');

        return Datatables::of($ads)

            ->filter(function ($instance) use ($request) {


                if ($request->year != '') {
                    $instance->whereYear('created_at', '=', "{$request->get('year')}");
                }


                if ($request->day != '') {
                    $instance->whereDay('created_at', '=', "{$request->get('day')}");
                }

                if ($request->month != '') {
                    $instance->whereMonth('created_at', '=', "{$request->get('month')}");
                }
            })
            ->addColumn('action', function ($ad) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('ads.edit', $ad->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-info btn-xs" href="' . route('ads.show', $ad->id) . '"><i class ="fa fa-info"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('ads.destroy', $ad->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })



        ->make(true);
    }

    public function cityDataTable($request)
    {
        $cities  = City::with('regions')->select('*');

        return Datatables::of($cities)

            ->filter(function ($instance) use ($request) {


                if ($request->item != '') {
                    $instance->where('name->ar', 'like', "%{$request->get('item')}%")
                             ->orWhere('name->en', 'like', "%{$request->get('item')}%");
                }
            })

            ->addColumn('name', function ($city) {
                return $city->name ? $city->getTranslation('name' , 'en') : "";
            })
            ->addColumn('ar_name', function ($city) {
                return $city->name ? $city->getTranslation('name' , 'ar') : "";
            })

            ->addColumn('queck', function ($city) {
                return $city->regular_delivery_price;
            })

            ->addColumn('normal', function ($city) {
                return $city->fast_delivery_price;
            })
            ->addColumn('date', function ($city) {
                return $city->created_at->format('d, M, Y');
            })
            ->addColumn('action', function ($city) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('cities.edit', $city->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('cities.destroy', $city->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })



        ->make(true);
    }

    public function regionDataTable($request)
    {
        $regions  = Region::with('city')->select('*');

        return Datatables::of($regions)

            ->filter(function ($instance) use ($request) {


                if ($request->name != '') {
                    $instance->where('name->en', 'like', "%{$request->get('name')}%")
                              ->orWhere('name->ar', 'like', "%{$request->get('name')}%");
                }
            })

            ->addColumn('ar_name', function ($region) {
                return $region->name ? $region->getTranslation('name' , 'ar') : "";
            })
            ->addColumn('name', function ($region) {
                return $region->name ? $region->getTranslation('name' , 'en') : "";
            })

            ->addColumn('city_ar_name', function ($region) {
                return $region->city->name ? $region->city->getTranslation('name' , 'ar') : "";
            })
            ->addColumn('city_en_name', function ($region) {
                return $region->city->name ? $region->city->getTranslation('name' , 'en') : "";
            })

            ->addColumn('queck', function ($region) {
                return $region->regular_delivery_price;
            })

            ->addColumn('normal', function ($region) {
                return $region->fast_delivery_price;
            })
            ->addColumn('date', function ($region) {
                return $region->created_at->format('d, M, Y');
            })
            ->addColumn('action', function ($region) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('regions.edit', $region->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('regions.destroy', $region->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })



        ->make(true);
    }

    public function employeeDataTable($request)
    {
        $employees  = Admin::with(['city' , 'region' , 'permissions'])->role('Employee');
        // $employees->load();

        return Datatables::of($employees)

            ->filter(function ($instance) use ($request) {

                if ($request->item != '') {
                    $instance->where('name', 'like', "%{$request->get('item')}%")
                   ;
                }

                // if ($request->item != '') {
                //     $instance->where('is_admin' , 0)->where('email', 'like', "%{$request->get('item')}%");
                // }
            })
            ->addColumn('city', function ($employee) {
                return $employee->city ? $employee->city->getTranslation('name' , 'en') : "";
            })
            ->addColumn('region', function ($employee) {
                return $employee->region ? $employee->region->getTranslation('name' , 'en') : "";

            })
            // ->addColumn('email', function ($employee) {
            //     return $employee->email;

            // })
            ->addColumn('permission', function ($employee) {
                return $employee->permissions->first()->name ?? "";

            })
            ->addColumn('action', function ($employee) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('employees.edit', $employee->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('employees.destroy', $employee->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })


        ->make(true);
    }


    public function driverDataTable($request)
    {
        $drivers  = Admin::with(['city' , 'region'])->role('Driver');

        return Datatables::of($drivers)

            ->filter(function ($instance) use ($request) {

                if ($request->item != '') {
                    $instance->where('name', 'like', "%{$request->get('item')}%")
                   ;
                }

                // if ($request->item != '') {
                //     $instance->where('is_admin' , 0)->where('email', 'like', "%{$request->get('item')}%");
                // }
            })
            ->addColumn('city', function ($driver) {
                return $driver->city ? $driver->city->getTranslation('name' , 'en') : "";
            })
            ->addColumn('region', function ($driver) {
                return $driver->region ? $driver->region->getTranslation('name' , 'en') : "";

            })

            ->addColumn('busy', function ($driver) {
                return $driver->busy == 0 ? "No" : "Yes";

            })



            ->addColumn('action', function ($employee) {

                return '<div class="row">
                    <div class="col-md-3"><a class="btn btn-primary btn-xs" href="' . route('drivers.edit', $employee->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-3"><a class="btn btn-danger btn-xs" data-url = "' . route('drivers.destroy', $employee->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })



        ->make(true);
    }


    public function userDataTable($request)
    {
        $users  = User::select('*');
        // $employees->load();

        return Datatables::of($users)

            ->filter(function ($instance) use ($request) {


                if ($request->item != '') {
                    $instance->where('name', 'like', "%{$request->get('item')}%")
                            ->orWhere('email', 'like', "%{$request->get('item')}%");
                }
            })
            ->addColumn('action', function ($user) {

                $label = $user->is_block == 0 ? 'Block' : 'Un block';
                $class = $user->is_block == 0 ? 'btn-danger' : 'btn-info';
                return '<div class="row">
                    <div class="col-md-1 mr-2"><a class="btn btn-primary btn-xs" href="' . route('users.edit', $user->id) . '"><i class ="fa fa-pen"></i></a></div>
                    <div class="col-md-6"><a class="btn '.$class.' btn-xs block" data-block = "' . route('users.block', $user->id) . '" href="">'.$label.'</a></div>
                    <div class="col-md-1"><a class="btn btn-danger btn-xs" data-url = "' . route('users.destroy', $user->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })



        ->make(true);
    }

    public function orderDataTable($request)
    {
        $orders  = Order::with(['user' , 'orderDetails'])->select('*');
        // $employees->load();

        return Datatables::of($orders)

            ->filter(function ($instance) use ($request) {


                if ($request->year != '') {
                    $instance->whereYear('created_at', '=', "{$request->get('year')}");
                }
                if ($request->client != '') {
                    $instance->whereHas('user', function($q) use ($request){
                        $q->where('name' ,'like', "%{$request->get('client')}%");
                    });
                }
            })
            ->addColumn('quantity', function ($order) {
                return $order->orderDetails ? $order->orderDetails->count() : 0;
            })
            ->addColumn('client_name', function ($order) {
                return $order->user->name;
            })

            ->addColumn('order_status', function ($order) {
                switch ($order->order_status) {
                    case 0:
                       return 'Canceled';
                    break;
                    case 1:
                       return 'Done';
                    break;

                    default:
                       return 'in Progress ...';
                    break;
                }
            })
            ->addColumn('order_progress', function ($order) {
                $progress = 'new Order';

                switch ($order->progress) {
                    case '2':
                        $progress = 'Accepted By :'.$order->driver->name;
                        break;
                    case '3':
                        $progress = 'Preparation in progress';
                        break;
                    case '4':
                        $progress = 'Delivery in progress';
                        break;
                    case '5':
                        $progress ='Delivered';
                        break;
                }
                return '<div class="row">
                   <div class = "col-md-12 mb-2" >'.$progress.'</div>
                   <div class = "col-md-12" >
                   <select required class="form-control form-control-sm" id = "progress" data-update = "'.route('orders.update' , $order->id).'"  style="width: 100%">
                        <option selected="selected" value="">-- Select -- </option>
                        <option value="3">Preparation in progress</option>
                        <option value="4">Delivery in progress</option>
                        <option value="5">Delivered</option>
                </select>
                </div>
                  </div>';
            })
            ->addColumn('action', function ($order) {
                return '<div class="row">
                    <div class="col-md-1 mr-2"><a class="btn btn-primary btn-xs" href="' . route('orders.show', $order->id) . '"><i class ="fa fa-info"></i></a></div>
                    <div class="col-md-1"><a class="btn btn-danger btn-xs" data-url = "' . route('orders.destroy', $order->id) . '" href=""><i class ="fa fa-trash"></i></a></div>
                  </div>';
            })

            ->rawColumns(['order_progress' , 'action'])

        ->make(true);
    }
}
