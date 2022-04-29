<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'points',
        'credit',
        'debit',
        'user_id',
        'membership'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
