<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now();

        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            return $q->whereDate('created_at', $todayDate);
        })->when($request->status != null, function ($q) use ($request) {
            return $q->where('status_message', $request->status);
        })->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function detail(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.detail', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Order Id not Found');
        }
    }
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->status
            ]);

            return redirect('admin/orders' . $orderId)->with('message', 'Order status updated');
        } else {
            return redirect('admin/orders' . $orderId)->with('message', 'Order Id not Found');
        }
    }

    public function  viewInvoice(int $borderId)
    {
        $order = Order::findOrFail($borderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $borderId)
    {
        $order = Order::findOrFail($borderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return  $pdf->download('invoice' . $order->id . '-' . $todayDate . '.pdf');
    }
}