<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        $allproducts = Product::latest()->get();
        return view('user_template.home', compact('allproducts'));
    }
}
