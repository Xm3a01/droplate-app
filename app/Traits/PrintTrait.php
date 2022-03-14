<?php

namespace App\Traits;

use App\Models\Transfer;


trait PrintTrait {

    public function reports($request)
    {
        return Transfer::all();
    }
}