<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('orders', [
            'orders' => $user->orders
        ]);
    }
}
