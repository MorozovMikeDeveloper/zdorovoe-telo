<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $validateFields = $request->validate([
            'course_id' => 'required|int',
        ]);

        $validateFields['user_id'] = Auth::user()->id;
        $course = Course::find($validateFields['course_id']);
        $validateFields['total'] = $course->cost;
        $validateFields['amount'] = $course->cost;
        $order = Order::create($validateFields);
        return view('payment_confirmation', ['order' => $order]);
    }
}
