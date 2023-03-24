<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.pendingorder', compact('pending_orders'));
    }

    public function CompletedOrder()
    {
        $pending_orders = Order::where('status', 'completed')->latest()->get();
        return view('admin.completedorder', compact('pending_orders'));
    }

}
