<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Response;

class ProductController extends Controller
{
    protected $prd_detail;
    protected $prd_img;

    public function __construct(Product $prd_detail, Gallery $prd_img)
    {
        $this->prd_detail = $prd_detail;
        $this->prd_img = $prd_img;
    }

    public function detail($id)
    {
        $prd_detail = $this->prd_detail->where('id', '=', "$id")->first();
        $prd_img = $this->prd_img->where('product_id', '=', "$id")->get();
        $prd_similar = $this->prd_detail
            ->whereBetween('price', [$prd_detail->price - 10000, $prd_detail->price + 10000])
            ->take(4)->get();
        $prd_id = $id;

        return view('sites.product', compact('prd_id', 'prd_detail', 'prd_img', 'prd_similar'));
    }
    public function getdata_food(){
        $food = Product::where('category','=','Food')->paginate(12);
        return Response::json($food) ;
    }
    public function getdata_drink(){
        $drink = Product::where('category','=','Drink')->paginate(12);
        return Response::json($drink) ;
    }

    public function all_food()
    {
        $food = Product::all()->where('category', '=', 'Food');

        return Response::json($food);
    }

    public function all_drink()
    {
        $drink = Product::all()->where('category', '=', 'Drink');

        return Response::json($drink);
    }

    // Food
    public function delete_food(Request $req)
    {
        return Product::destroy($req->id);
    }

    public function update_food(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return Response::json($product);
    }

    public function create_food(Request $request)
    {
        return Product::create(
            ['name'        => $request->input(['name']),
             'price'       => $request->input(['price']),
             'description' => $request->input(['description']),
             'category'    => $request->input(['category']),
            ]);
    }
}
