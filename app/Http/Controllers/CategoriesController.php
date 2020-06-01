<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show($id)
    {

        $products = Product::where('category_id', '=', $id)->get();
        $category = Category::find($id);

        return view('category', [
            'category' => $category,
            'products' => $products
        ]);

    }
}
