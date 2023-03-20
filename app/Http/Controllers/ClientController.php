<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('user_template.addtocart');
    }

    public function AddProductToCart()
    {
        
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
