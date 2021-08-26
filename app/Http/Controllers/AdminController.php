<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class AdminController extends Controller
{
    public function adminLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // Validation
            $this -> validate($request ,[
                'email' => 'required',
                'password' => 'required'
            ]);

            // Admin login
            $data = array(
                'email' => $request->email,
                'password' => $request->password,

            );

            if (Auth::guard('admin')->attempt($data)){


                return redirect()->route('adminDashboard');
            }
            else{
                return back()->withErrors(['message'=>'invalid email and password']);
            }
            return redirect()->route('adminLogin');
        }
        if(Auth::guard('admin')->check()){
            return redirect()->route('adminDashboard');
        }else{
            return view('admin.login');

        }
    }
    // Forget Password
    public function forgetpassword(){
        return view('admin.forgetpassword');

    }
    // Admin Dashboard
    public function adminDashboard(){
        Session::put('admin_page','dashboard');
        return view('admin.dashboard');
    }
    // Admin logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('success_message', 'Logout Successfully');
        return redirect()->route('adminLogin');
    }

    // Admin Profile
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile',compact('admin'));
    }

    // update Admin profile
    public function profileUpdate(Request $request,$id){
        $data = $request->all();

        $validateData = $request->validate([
            'name' => 'required'
        ]);
        $admin_id = Auth::guard('admin')->user()->id;
        $admin = Admin::findorFail($id);
        $admin->name = $data['name'];
        $admin->address = $data['address'];
        $admin->phone_number = $data['phone_number'];

        if($request->hasFile('image'))
      {
          $destination_path ='public/uploads';
          $image =$request->file('image');
          $image_name =$image->getClientOriginalName();
          $path =$request->file('image')->storeAs($destination_path,$image_name);
          $admin['image'] = $image_name;
      }

        $admin->save();
        Session::flash('success_message','Admin Profile has been updated Successfully');
        return redirect()->back();

    }

    public function changePassword(){
        $admin = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.change_password',compact('admin'));
    }

    // check user password

    public function checkUserPassword (Request $request){

        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            return "true";die;
        }else{
            return "false";die;
        }

    }
    // update password
    public function updatePassword(Request $request,$id){
        $validateData = $request->validate([
            'current_password' => 'required | max:255',
            'password'=> 'min:6',
            'pass_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $admin = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $current_admin_password = $admin->password;
        $data = $request->all();
        if(Hash::check($data['current_password'],$current_admin_password)){
            $admin->password = bcrypt($data['password']);
            $admin->save();
            Session::flash('success_message','Admin password has been updated Successfully');
            return redirect()->back();
        }else{
            Session::flash('error_message','your password is not matched');
            return redirect()->back();

        }


    }

}
