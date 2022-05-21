<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
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

    public function notification(){
        if (!in_array($this->getIP(), array('168.119.157.136', '168.119.60.227', '138.201.88.124', '178.154.197.79'))) die("hacking attempt!");

        $sign = md5(env('FK_ID').':'.$_REQUEST['AMOUNT'].':'.env('FK_SECRET').':'.$_REQUEST['MERCHANT_ORDER_ID']);

        if ($sign != $_REQUEST['SIGN']) die('wrong sign');

        $order = Order::find($_REQUEST['MERCHANT_ORDER_ID']);
        if($order->status){
            die('err');
        }
        if($order->amount != $_REQUEST['AMOUNT']){
            die('err');
        }

        $order->updated_at = time();
        $order->payment_id = $_REQUEST['intid'];
        $order->status = 1;

        $order->save();

        die('YES');
    }

    private function getIP() {
        if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
        return $_SERVER['REMOTE_ADDR'];
    }

}
