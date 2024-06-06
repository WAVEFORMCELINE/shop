<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class RelocateController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('report.relocate', compact('products', 'categories'));
    }
}
