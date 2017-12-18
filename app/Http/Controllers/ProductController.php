<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Session;

class ProductController extends Controller
{
    protected $prd_detail;
    protected $prd_img;
    protected $cmt;

    public function __construct(Product $prd_detail, Gallery $prd_img, Comment $cmt)
    {
        $this->prd_detail = $prd_detail;
        $this->prd_img = $prd_img;
        $this->cmt = $cmt;
    }

    public function detail($id)
    {
        $listPrd = Product::all();
        foreach ($listPrd as $prd1) {
            $rating = Comment::where('product_id', '=', $prd1->id)->where('rated', '>', '0')
                ->avg('rated');
            $prd1->rated = $rating;
            $prd1->save();
        }

        $prd_detail = $this->prd_detail->where('id', '=', "$id")->first();
        $prd_img = $this->prd_img->where('product_id', '=', "$id")->get();
        $prd_similar = $this->prd_detail
            ->whereBetween('price', [$prd_detail->price - 10, $prd_detail->price + 10])
            ->take(5)->get();
        $prd_id = $id;
        $listCmt = $this->cmt->where('product_id', $prd_detail->id)->orderBy('created_at', 'desc')->get();
        $listUser = User::all();
        $countuser = $this->countUser($prd_detail);


        return view('sites.product',
            compact('prd_id', 'prd_detail', 'prd_img', 'prd_similar', 'listCmt', 'listUser', 'countuser'));
    }

    public function getdata_product()
    {
        $product = Product::all();

        return Response::json($product);
    }

    public function getdata_food()
    {
        $food = Product::where('category', '=', 'Food')->paginate(30);

        return Response::json($food);
    }

    public function getdata_drink()
    {
        $drink = Product::where('category', '=', 'Drink')->paginate(30);

        return Response::json($drink);
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
        // dd($request);
        $this->validate($request,
            [
                'name'        => 'required|unique:products,name|min:3|max:30|',
                'price'       => 'required|min:0',
                'description' => 'required',
            ],
            [
                'name.required'        => 'Please Insert Name',
                'price.required'       => 'Please Insert Price',
                'description.required' => 'Please Insert Description',
            ]);
        // dd($request->img);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return Response::json($product);
    }

    public function create_food(Request $request)
    {
        $this->validate($request,
            [
                'name'        => 'required|unique:products,name|min:3|max:30|',
                'price'       => 'required|min:0',
                'description' => 'required',
                // 'image' => 'required',
            ],
            [
                'name.required'        => 'Please Insert Name',
                'price.required'       => 'Please Insert Price',
                'description.required' => 'Please Insert Description',
            ]);
        $new_food = new Product();
        $new_food->name = $request->name;
        $new_food->price = $request->price;
        $new_food->description = $request->description;
        $new_food->avatar = $request->image;
        $new_food->category = "Food";
        $new_food->save();
        $new_category = new Gallery();
        $new_category->product_id = $new_food->id;
        $new_category->image = $new_food->avatar;
        $new_category->save();
    }

    //drink
    public function delete_drink(Request $req)
    {
        return Product::destroy($req->id);
    }

    public function update_drink(Request $request, $id)
    {
        $error = $this->validate($request,
            [
                'name'        => 'required|unique:products,name|min:3|max:30|',
                'price'       => 'required|min:0',
                'description' => 'required',
            ],
            [
                'name.required'        => 'Please Insert Name',
                'price.required'       => 'Please Insert Price',
                'description.required' => 'Please Insert Description',
            ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->avatar = $request->file('avatar');
        $product->save();

        return Response::json($product);
    }

    public function create_drink(Request $request)
    {
        $this->validate($request,
            [
                'name'        => 'required|unique:products,name|min:3|max:30|',
                'price'       => 'required|min:0',
                'description' => 'required',
            ],
            [
                'name.required'        => 'Please Insert Name',
                'price.required'       => 'Please Insert Price',
                'description.required' => 'Please Insert Description',
            ]);

        return Product::create(
            [

                'name'        => $request->input(['name']),
                'price'       => $request->input(['price']),
                'description' => $request->input(['description']),
                'category'    => "Drink",

            ]);
    }


    public function postcomment(Request $request)
    {
        $product = $request->product_1;
        $comment = $request->content_1;
        $rate = $request->cmt_star;
        $comment_1 = new Comment();
        $comment_1->product_id = $product;
        $comment_1->content = $comment;
        $comment_1->user_id = Auth::User()->id;
        $comment_1->rated = $rate;
        $this->checkcmt($comment_1);
        $comment_1->save();
        $prd_detail = $this->prd_detail->where('id', '=', "$product")->first();
        $listCmt = $this->cmt->where('product_id', $product)->orderBy('created_at', 'desc')->get();
        $listUser = User::all();

        return view('sites.comment', compact('listCmt', 'listUser', 'prd_detail'));

    }

    public function checkcmt(Comment $cmnt)
    {
        $listCmt1 = Comment::all();
//        $zero = 0.834;
        foreach ($listCmt1 as $listcmt) {
            if (levenshtein($listcmt->content, $cmnt->content) == 0) {
                Comment::destroy($listcmt->id);
            }
        }

    }

    public function deleteCmt(Request $request)
    {
        Comment::destroy($request->id1);

        return redirect(route('product.detail', $request->id));
    }

    public function updaterate(Request $request)
    {
        $product = $request->prd1;
        $rate = $request->rate1;

        $prd_detail = $this->prd_detail->where('id', '=', "$product")->first();
        $prd_detail->rated = Comment::where('product_id', '=', $product)->where('rated', '>', '0')
            ->avg('rated');
        $count = Comment::where('product_id', '=', $product)->where('rated', '>', '0')
            ->count();
        $ratetb = ($prd_detail->rated * $count + $rate) / ($count + 1);
        $countuser = $this->countUser($prd_detail);

        return view('sites.rate', compact('ratetb', 'countuser'));

    }

    public function countUser(Product $pdt)
    {
        $listCmt = $this->cmt->where('product_id', $pdt->id)->get();
        $users = DB::table('users')->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('comments.product_id', '=', $pdt->id)->select('users.id')
            ->distinct()->get();
        $count = $users->count();

        return $count;
    }

    public function product_hot()
    {
        $product_hot = DB::select('
            select products.name, sum(order_details.quantity) as so_luong
            from order_details,products 
            where products.id=order_details.product_id
            Group by products.name
            Order by so_luong DESC
            Limit 5
            ');
        $sum = DB::select('
            select sum(order_details.quantity) as so_luong
            from order_details
            ');
        $product_hot['sum'] = $sum;

        return Response::json($product_hot);
    }

    public function totalamount()
    {
        $totalamount = DB::select('
            select sum(sum) as tong_tien
            from orders
            ');

        return Response::json($totalamount);
    }

    public function day_total()
    {
        $ngay_hientai = DB::select('
            select sum(sum) as tong_tien
            from orders
            where DATE(orders.created_at) = Curdate()
            ');

        return Response::json($ngay_hientai);
    }

    public function thang_total()
    {
        $thang_hientai = DB::select('
            select sum(sum) as tong_tien
            from orders
            where Month(orders.created_at) = Curdate()
            ');

        return Response::json($ngay_hientai);
    }

}
