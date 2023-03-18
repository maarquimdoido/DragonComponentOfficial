<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        return view('admin.allcategory');
    }

    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('','-', $request->category_name))
        ]);

        return redirect()->route('allcategory')->with('message', 'Category Added Successfully!');
    }
}
