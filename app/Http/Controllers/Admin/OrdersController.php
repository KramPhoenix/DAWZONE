<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order_products = OrderProduct::where('order_id', '=', $id)->get();

        return view('admin.orders.show', [
            'order' => $id,
            'order_products' => $order_products
        ]);
    }



}
