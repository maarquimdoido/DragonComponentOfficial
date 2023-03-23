<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shippinginfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('user_template.product', compact('product', 'related_products' ));
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
        if($quantity == null)
        {
            $quantity = 1;
        }
        $price = $quantity * $product_price  ;
        $products = $request->product_id;
        Cart::insert([
                'product_id' => $products,
                'user_id' =>Auth::id(),
                'price' => $price,
                'quantity' => $quantity,
        ]);

        return  redirect()->route('addtocart')->with('message', 'Your item added to cart successfully');
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
            'user_id' =>Auth::id(),
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
            'street_info' => $request->street_info,
        ]);

        return redirect()->route('checkout');
    }


    public function Checkout()
    {
        return view('user_template.checkout');
    }

    public function UserProfile()
    {
        return view('user_template.userprofile');
    }

    public function PendingOrders()
    {
        return view('user_template.pendingorders');
    }

    public function History()
    {
        return view('user_template.History');
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
}
