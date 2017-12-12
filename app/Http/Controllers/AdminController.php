<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $information;
    protected $order;
    protected $orderDetail;
    protected $product;

    public function __construct(
        User $information,
        OrderDetail $orderDetail,
        Order $order,
        Product $product
    ){
        $this->information = $information;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->product = $product;
    }

    public function home()
    {
        $users = $this->information->all();
        $totaluser = $users->count();

        $Order = $this->order->all();
        $totalorder = $Order->count();

        $products = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->distinct()
            ->get();
        return view('admin.pages.dashboard_admin', compact(
            'totalorder',
            'totaluser',
            'products',
            'Order'
        ));
    }

     public function manage_food()
    {
        $Order = $this->order->all();
        $totalorder = $Order->count();
        $all_foods = Product::where('category','=','Food')->get();
        return view('admin.pages.manage_food', compact(
        'totalorder','all_foods'
        ));
    }

    public function post_products(Request $request)
    {
        $produces = new Product();
        $produces->name = $request->name;
        $produces->price = $request->price;
//        $produces->category = $request->category;
        $produces->description = $request->description;
        $produces->avatar = $request->avatar;
        $produces->save();

        return redirect()->back();

    }

    public function manage_drink()
    {
        $Order = $this->order->all();
        $totalorder = $Order->count();
        $all_drinks = Product::where('category','=','drink')->get();
        return view('admin.pages.manage_drink', compact(
        'totalorder','all_drinks'
        ));
    }

    public function manage_customer ()
    {
        $users = $this->information->orderBy('created_at', 'desc')->get();
        $Order = $this->order->all();
        $totalorder = $Order->count();
        return view('admin.pages.manage_customer', compact(
            'users',
            'totalorder'
        ));
    }

    public function manage_order ()
    {
        $orders = $this->order->orderBy('created_at', 'desc')->get();
        $products = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->distinct()
            ->get();
        $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->distinct()
            ->get();
        $totalorder = $orders->count();
        return view('admin.pages.manage_adminorder', compact(
            'users',
            'orders',
            'totalorder',
            'products'
        ));
    }

    public function getUserID($id)
    {
        $inforUser = $this->information->where('id', '=', $id)->get();

        return view('admin.pages.user_profile_manage', compact('inforUser','id'));
    }
}
