<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function ProfileChange(Request $request, $id)
    {
        $user = User::find($id);
        return view('auth.profile', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);
        $user = User::where('id', $id)->first();
            if (!empty($request->profile)) {
                $profile_name = time() . rand(1, 999) . '.' . $request->profile->extension();
                $request->profile->move(public_path('profile'), $profile_name);
                $validator['profile'] = 'profile/' . $profile_name;
                $update_image = 'profile/' . $profile_name;
                //unlink
                $image = $user->profile;
                $remove = ltrim($image, 'profile/');
                if (File::exists(public_path('profile/' . $remove))) {

                    File::delete(public_path('profile/' . $remove));
                }
            } else {
                $validator['profile'] = $user->profile;
            }
            $update_profile = User::where('id', $id)->update($validator);
            return response()->json(['status' => true, 'success' => 'Profile Updated Success!', 'data' => $update_profile], 200);



    }
}
