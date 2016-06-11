<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Image;

class UserController extends Controller
{
    
    public function __construct() {

        $this->middleware('auth');

    }

    public function getProfile() {

        return view('profile.profile', array('user' => Auth::user() ) );

    }

    public function updateAvatar(Request $request) {

      //Handle the user upload of avatar
      if($request->hasFile('avatar')) {

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/') . $filename);

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

      }

      return view('profile.profile', array('user' => Auth::user() ) );

    }
}
