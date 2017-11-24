<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Helpers\HelpText;
use Hash;
use Response;

class UserController extends Controller
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

    public function profile(Request $request)
    {
        $users = User::find($request->id);
        $order = $this->order->where('user_id', '=', $users->id)
            ->orderBy('id','desc')->first();
        $orderDetail = $this->orderDetail->first();
        $productDetail = $this->product->where('id', '=', $orderDetail->product_id)
            ->first();
        return view('sites.user.user_profile', compact(
            'users',
            'orderDetail',
            'productDetail',
            'order'
        ));
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('user.profile')
                ->withErrors($validator);
        }
        $users = User::find(Auth::user()->id);
        $users->fill($request->all());
        $users->save();

        return redirect()->back();
    }

    public function updateAvatar(Request $request) {
        $user = User::find(Auth::user()->id);

        if($request->hasFile('image_upload')){
            HelpText::deleteFile($user->avatar);

            $nameFile = $request->image_upload->hashName();
            $path = $request->file('image_upload')->store('upload/user_image', 'uploads');
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->back();
    }
}
