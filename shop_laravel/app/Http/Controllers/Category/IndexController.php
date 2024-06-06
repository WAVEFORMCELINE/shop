<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('category.index', compact('categories'));
    }

    public function show($id)
    {
    $category = Category::with('children', 'products')->findOrFail($id);
    return view('categories.show', compact('category'));
    }
}