<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.pendingorder', compact('pending_orders'));
    }

    public function CompletedOrder(Request $request)
    {
        $id = $request->id;
        DB::table('orders')
        ->where('id', $id)  // find your user by their email
        ->update(['status' => 'confirmed']);  // update the record in the DB.
        $pending_orders = Order::where('status', 'confirmed')->latest()->get();
        return view('admin.completedorder', compact('pending_orders'));
    }

    public function CanceledOrder(Request $request)
    {
        $id = $request->id;
        DB::table('orders')
        ->where('id', $id)  // find your user by their email
        ->update(['status' => 'canceled']);  // update the record in the DB.
        $pending_orders = Order::where('status', 'canceled')->latest()->get();
        return view('admin.canceledorder', compact('pending_orders'));
    }

}
