<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.pendingorder', compact('pending_orders'));
    }

    public function CompletedOrder()
    {
        $pending_orders = Order::where('status', 'confirmed')->latest()->get();
        return view('admin.completedorder', compact('pending_orders'));
        $order = new Order;
        $order->status = 'confirmed';
        $order->save();



    }

}
