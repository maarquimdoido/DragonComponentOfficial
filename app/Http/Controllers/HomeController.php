<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != ""){
            $allproducts = Product::where('product_name', 'LIKE', "%$search%")->get();
        }else{
            $allproducts = Product::latest()->get();
        }
        return view('user_template.home', compact('allproducts', 'search'));
    }

    public function Credits()
    {
        return view('user_template.credits');
    }
}
