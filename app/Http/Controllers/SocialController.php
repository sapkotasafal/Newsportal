<?php

namespace App\Http\Controllers;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    // social media settings
    public function social(){
        Session::put('admin_page', 'Social');
        $social = Social::first();
        return view('admin.theme.social',compact('social'));
    }
    // Update
    public function socialupdate(Request $request,$id){
        $social = Social::findOrFail($id);
        $data = $request->all();
        $social->facebook = $data['facebook'];
        $social->twitter = $data['twitter'];
        $social->google = $data['google'];
        $social->pinterest = $data['pinterest'];
        $social->linkedin = $data['linkedin'];
        $social->save();

        Session::flash('success_message', 'Social Settings Has Been Updated Successfully');
        return redirect()->back();

    }
}
