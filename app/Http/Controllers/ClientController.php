<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shippinginfo;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;


require_once '../vendor/autoload.php';

class ClientController extends Controller
{
    public function CategoryPage($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }
    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.product', compact('product', 'related_products'));
    }
    public function AddToCart()
    {
        $userid = Auth::id();
        $cart_item = Cart::where('user_id', $userid)->get();
        return view('user_template.addtocart', compact('cart_item'));
    }
    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;

        if ($quantity == null) {
            $quantity = 1;
        }

        $price = $quantity * $product_price;
        $products = $request->product_id;

        $availible_quantity = Product::where('id', $products)->value('quantity');
        $newAvaiibleQuantityValue = (int) $availible_quantity - (int) $quantity;
        if (!$availible_quantity <= 0) {

            if ($newAvaiibleQuantityValue >= 0) {

                if ($this->doesItExist($products)) {

                    $itemToAddArr = $this->doesItExist($products); //[0,1,2,3]
                    $cartUpdateQuery = Cart::findOrFail($itemToAddArr[0]);
                    $cartUpdateQuery->quantity = $itemToAddArr[1] + $quantity;
                    $cartUpdateQuery->price = $itemToAddArr[2] + $price;
                    $cartUpdateQuery->save();

                } else {

                    Cart::insert([
                        'product_id' => $products,
                        'user_id' => Auth::id(),
                        'price' => $price,
                        'quantity' => $quantity,
                    ]);

                }

                $productUpdateQuery = Product::findOrFail($products);
                $productUpdateQuery->quantity = $newAvaiibleQuantityValue;
                $productUpdateQuery->save();

                return redirect()->route('addtocart')->with('message', 'Your item added to cart successfully');
            } elseif ($newAvaiibleQuantityValue < 0) {
                return redirect()->route('addtocart')->with('quantityOut', 'We dont have enought items as you are looking for');
            }
        } else {
            return redirect()->route('addtocart')->with('outOfStock', 'Item out of stock');
        }
    }
    public function doesItExist($productIdMeh)
    {
        $does = Cart::where('product_id', $productIdMeh)->first();

        if ($does) {
            $mehArr = [$does->id, $does->quantity, $does->price];
            return $mehArr;
        } else {
            return false;
        }
    }
    public function RemoveCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your item was removed successfully');
    }
    public function GetShippingAddress()
    {
        return view('user_template.shippingaddress');
    }
    public function AddShippingAddress(Request $request)
    {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
            'street_info' => $request->street_info,
            'email' => $request->email,
        ]);

        return redirect()->route('checkout');
    }
    public function Checkout(Request $request)
    {
        $userid = Auth::id();
        $cart_item = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        return view('user_template.checkout', compact('cart_item', 'shipping_address'));
    }
    public function CheckoutCancel(Request $request)
    {
        $id = $request->id;
        $allproducts = Product::latest()->get();
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Your Order Has Been Deleted Successfully');
    }

    public function createPaymentSession() //chama e cria o stripe
    {

        $totalAmount = (request('totalamount'))*100;
        // Set your Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a new payment session with the necessary details
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Dragoncomponent payment',
                        ],
                        'unit_amount' => $totalAmount,
                    ],
                    'quantity' => 1,
                ],

            ],
            'mode' => 'payment',
            'success_url' => route('stripe-callback'),
            'cancel_url' => route('pendingorders') . '?warning',
        ]);

        session(['canRunPlaceOrder' => true]);
        return redirect($session->url);

    }

    public function placeOrder() //callbackl
    {
        $isAbleTORun = session('canRunPlaceOrder');

        if ($isAbleTORun) {

            try {

                $userid = Auth::id();
                $shipping_address = ShippingInfo::where('user_id', $userid)->first();
                $cart_item = Cart::where('user_id', $userid)->get();

                foreach ($cart_item as $item) {
                    $product_name = Product::where('id', $item->product_id)->value('product_name');
                    ;
                    Order::insert([
                        'userid' => $userid,
                        'fullname' => $shipping_address->fullname,
                        'product_name' => $product_name,
                        'shipping_phoneNumber' => $shipping_address->phone_number,
                        'shipping_city' => $shipping_address->city_name,
                        'shipping_streetinfo' => $shipping_address->street_info,
                        'shipping_postalcode' => $shipping_address->postal_code,
                        'email' => $shipping_address->email,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'total_price' => $item->price,
                        'status' => "pending",

                    ]);

                    $id = $item->id;
                    Cart::findOrFail($id)->delete();
                }

                ShippingInfo::where('user_id', $userid)->first()->delete();

                return redirect()
                            ->route(('pendingorders') . '?success');
                            // ->header('Cache-Control', 'no-store, no-cache, must-revalidate');

            } catch (\Exception $e) {

                return redirect()->route('pendingorders') . '?warning';
            }
        } else {
            return redirect()->route('pendingorders') . '?warning';
        }
    }

    public function UserProfile(Request $request)
    {
        return view('user_template.userprofile');
    }
    public function Orders(Request $request)
    {
        // $status = $request->status;
        $id = $request->id;
        $userid = Auth::id();
        $confirmed_orders = Order::where('userid', $userid)->where('status', 'confirmed')->latest()->get();
        // $orders = DB::table('orders')->where('status', '=', 'canceled')->get();
        return view('user_template.orders', compact('confirmed_orders'));
    }
    public function PendingOrders(Request $request)
    {
        // $status = $request->status;
        $id = $request->id;
        $userid = Auth::id();
        $pending_orders = Order::where('userid', $userid)->where('status', 'pending')->latest()->get();
        // $orders = DB::table('orders')->where('status', '=', 'pending')->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }
    public function CanceledOrders(Request $request)
    {
        // $status = $request->status;
        $id = $request->id;
        $userid = Auth::id();
        $canceled_orders = Order::where('userid', $userid)->where('status', 'canceled')->latest()->get();
        // $orders = DB::table('orders')->where('status', '=', 'canceled')->get();
        return view('user_template.canceledorders', compact('canceled_orders'));
    }
    public function Search(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $allproducts = Product::where('product_name', 'LIKE', "%$search%")->get();
        } else {
            $allproducts = Product::latest()->get();
        }
        return view('user_template.home', compact('allproducts', 'search'));
    }
    public function NewRelease()
    {
        return view('user_template.newrelease');
    }
    public function TodaysDeal()
    {
        return view('user_template.todaysdeal');
    }
    public function CustomerService()
    {
        return view('user_template.customerservice');
    }
    public function ShowPolicy()
    {
        return view('user_template.policy');
    }
    public function ShowTerms()
    {
        return view('user_template.terms');
    }
}