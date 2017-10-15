<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
    protected $information;

    public function __construct(User $information)
    {
        $this->information = $information;
    }

    public function profile()
    {
//        if (!\Auth::check()) {
//
//            return redirect()->route('home');
//        }
        $users = $this->information->first();
        return view('sites.user.user_profile', compact('users'));
    }

    public function editProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('profile')
                ->withErrors($validator);
        }
        $users = User::find(Auth::user()->id);
        $users->fill($request->all());
        $users->save();

        return redirect()->route('profile');
    }
}
