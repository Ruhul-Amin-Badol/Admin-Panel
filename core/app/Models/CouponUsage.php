<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add this line
        'coupon_id',
        'code',
        'amount',
        'total_used'

    ];
}
