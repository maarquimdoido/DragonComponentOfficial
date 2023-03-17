<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index()
    {
        return view('admin.allsubcategory');
    }

    public function AddSubCategory()
    {
        return view('admin.addsubcategory');
    }
}
