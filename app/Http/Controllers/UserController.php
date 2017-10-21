<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    protected $information;

    public function __construct(User $information)
    {
        $this->information = $information;
    }

    public function profile(Request $request)
    {

        $users = User::find($request->id);

        return view('sites.user_profile', compact('users'));
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
