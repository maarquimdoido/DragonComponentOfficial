<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function SeeMore(Request $request)
    {
        $id = $request->id;
        $id2 = $request->userid;
        DB::table('orders')
            ->where('userid', $id2);
        $pending_orders = Order::where('status', 'confirmed')->latest()->get();
        return view('admin.aboutorder', compact('pending_orders'));
    }


    public function Index(Request $request)
    {
        $search = $request['search'];
        $pending_orders = Order::where('status', 'pending')->latest();

        if ($search !== "") {
            $pending_orders = $pending_orders->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%$search%")
                    ->orWhere('total_price', 'LIKE', "%$search%")
                    ->orWhere('userid', 'LIKE', "%$search%");
            });
        }

        $pending_orders = $pending_orders->get();


        return view('admin.pendingorder', compact('pending_orders'));
    }



    public function CompletedOrder(Request $request)
    {
        $id = $request->id;
        $search = $request['search'];
        DB::table('orders')
            ->where('id', $id) // find your user by their id
            ->update(['status' => 'confirmed']); // update the record in the DB.

        $pending_orders = Order::where('status', 'confirmed')->latest();

        if ($search !== "") {
            $pending_orders = $pending_orders->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%$search%")
                    ->orWhere('total_price', 'LIKE', "%$search%")
                    ->orWhere('userid', 'LIKE', "%$search%");
            });
        }

        $pending_orders = $pending_orders->get();

        return view('admin.completedorder', compact('pending_orders'));
    }

    public function CanceledOrder(Request $request)
    {
        $id = $request->id;
        $search = $request['search'];

        DB::table('orders')
            ->where('id', $id) // find your user by their email
            ->update(['status' => 'canceled']); // update the record in the DB.
        $pending_orders = Order::where('status', 'canceled')->latest();

        if ($search !== "") {
            $pending_orders = $pending_orders->where(function ($query) use ($search) {
                $query->where('product_name', 'LIKE', "%$search%")
                    ->orWhere('total_price', 'LIKE', "%$search%")
                    ->orWhere('userid', 'LIKE', "%$search%");
            });
        }

        $pending_orders = $pending_orders->get();

        return view('admin.canceledorder', compact('pending_orders'));
    }

}
