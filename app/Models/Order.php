<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'course_id',
        'status'
    ];

    protected $casts = [
        'paid_at' => 'datetime'
    ];
    use HasFactory;
}
