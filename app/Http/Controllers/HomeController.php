<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Product::where('category', '=', 'Food')
            ->take(4)->get();

        $drinks = Product::where('category', '=', 'Drink')
            ->take(4)->get();

        $order_details = OrderDetail::all();
        foreach ($order_details as $ord_detail) {
            $prd = Product::find($ord_detail->product_id);
            $ord_detail->total = $prd->price * $ord_detail->quantity;
            $ord_detail->save();
        }
        $orders = Order::all();

        foreach ($orders as $order) {
            $sum = 0;
            $ord_dts = OrderDetail::where('order_id', '=', $order->id)->get();
            foreach ($ord_dts as $ord_dt) {
                $sum += $ord_dt->total;
            }
            $order->sum = $sum;
            $order->save();
        }

        return view('sites.home', compact('foods', 'drinks'));
    }
}
