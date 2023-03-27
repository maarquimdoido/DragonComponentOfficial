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
        return view('un_registered.home', compact('allproducts'));
    }

    public function Credits()
    {
        return view('user_template.credits');
    }
}
