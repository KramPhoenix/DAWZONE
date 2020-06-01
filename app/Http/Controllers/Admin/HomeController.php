<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Order;
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
        $orders = Order::all()->count();
        $offers = Offer::all()->count();

        return view('admin.home', [
            'products' => $products,
            'orders' => $orders,
            'users' => $users,
            'offers' => $offers,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
