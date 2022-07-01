<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Traits\DataTableTrait;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    use DataTableTrait;


    public function products(Request $request)
    {
        return $this->productDataTable($request);
    }

    public function categories(Request $request)
    {
        return $this->categoryDataTable($request);
    }

    public function sub_categories(Request $request)
    {
        return $this->subCategoryDataTable($request);
    }

    public function promoes(Request $request)
    {
        return $this->promoDataTable($request);
    }
    public function ads(Request $request)
    {
        return $this->adsDataTable($request);
    }
    public function city(Request $request)
    {
        return $this->cityDataTable($request);
    }

    public function region(Request $request)
    {
        return $this->regionDataTable($request);
    }
    public function employee(Request $request)
    {
        // return Admin::role('Employee')->get();
        return $this->employeeDataTable($request);
    }

    public function user(Request $request)
    {
        // return Admin::role('Employee')->get();
        return $this->userDataTable($request);
    }

    public function order(Request $request)
    {
        return $this->orderDataTable($request);
    }

    public function driver(Request $request)
    {
        return $this->driverDataTable($request);
    }
}
