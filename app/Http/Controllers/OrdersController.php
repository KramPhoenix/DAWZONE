<?php

namespace App\Http\Controllers;

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
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $user = auth()->user();

        return view('order_step1', [
            'user' => $user,
            'total_price' => $cart->total_price,
            'total_quantity' => $cart->total_quantity
        ]);
    }


    public function create(){

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $user = auth()->user();

        return view('order_step2', [
            'user' => $user,
            'total_price' => $cart->total_price,
            'total_quantity' => $cart->total_quantity
        ]);
    }

    public function storeOrder()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $user = auth()->user();

        $data = [
            'total_quantity' => $cart->total_quantity,
            'total_price' => $cart->total_price,
            'user_id' => $user->id,
        ];

        $order = Order::create($data);



        foreach ($cart->products as $product){
            $order_products = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product']['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        Session::forget('cart');
        return redirect()->route('orders.myOrders');
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $request->validate([
            'direccion' => 'required',
            'ciudad' => 'required',
            'provincia' => 'required',
            'telf' => 'required|numeric',
        ]);


        $data = [
            'phone' => $request['telf'],
            'address' => $request['direccion'],
            'city' => $request['ciudad'],
            'province' => $request['provincia'],
        ];

        $user->update($data);

        return redirect()->route('orders.index');
    }

    public function myOrders()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', '=', $user->id)->get();

        return view('my_orders', [
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order_products = OrderProduct::where('order_id', '=', $id)->get();

        return view('my_order_products', [
            'order' => $id,
            'order_products' => $order_products
        ]);
    }

    public function destroy($id)
    {
        $order = Order::destroy($id);

        $order_products = OrderProduct::where('order_id', '=', $id)->delete();

        return redirect()->route('orders.myOrders');
    }

}
