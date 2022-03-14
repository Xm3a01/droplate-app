<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'code',
        'start_date',
        'end_date'
    ];
}
