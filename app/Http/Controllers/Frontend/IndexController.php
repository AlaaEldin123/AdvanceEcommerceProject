<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
class IndexController extends Controller
{
    public function Index(){
    $categories = Category::orderBy('category_name_en','ASC')->get();
    $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
    return view('frontend.index',compact('categories','sliders'));
    }

    public function UserLogout(){
Auth::logout();
return Redirect()->route('login');
    }
   
   public function UserProfile(){
   	$id =Auth::user()->id;
   	$user = User::find($id);
   	return view('frontend.profile.user_profile',compact('user'));
   }

   public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->phone = $request->phone;

    	if($request->file('profile_photo_path')){
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['profile_photo_path'] = $filename;
    	}
    	$data->save();

    	$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);
   }//end method store user


  public function UserChangePassword(){
  	
  	 return view('frontend.profile.change_password');
  }

  public function UserPasswordUpdate(Request $request){
  			$validationData = $request->validate([
			'oldpassword' =>'required',
			'password'=>'required|confirmed',

			]);
			$hashedpassword = Auth::user()->password;
			if(Hash::check($request->oldpassword,$hashedpassword)){

			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
			}else{

			return redirect()->back();
			}
  }
}
