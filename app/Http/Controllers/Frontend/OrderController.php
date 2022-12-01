<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('frontend.orders.index', compact('orders'));
    }

    public function detail($borderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $borderId)->first();
        if ($order) {

            return view('frontend.orders.detail', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No order Found');
        }
    }
}