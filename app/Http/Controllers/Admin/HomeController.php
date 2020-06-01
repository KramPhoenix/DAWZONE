<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\News;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $brands = Brand::all()->count();
        $categories = Category::all()->count();
        $news = News::all()->count();
        $offers = Offer::all()->count();

        return view('admin.home', [
            'products' => $products,
            'news' => $news,
            'users' => $users,
            'offers' => $offers,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
