<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\PostAd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Image;


class UserController extends Controller
{

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // If user doesn't exist, create a new one
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make('default_password'), // Set a default password or handle accordingly
            ]);
        }

        Auth::login($user, true);

        return redirect('/user/dashboard')->with('success', 'Successfully logged in with Google!');
    }

    public function userRegister(Request $request)
{
    $request->validate([
        'phone' => 'required|unique:users|digits:11',  // Assuming phone number has 10 digits
        'password' => 'required|min:4',
      'confirmed_password' => 'required|same:password', 
    ]);

    // Create a new user
    $user = new User();
    $user->phone = $request->input('phone');
    $user->password = Hash::make($request->input('password'));

    // Save the user to the database
    $user->save();

     return redirect('/login')->with('success', 'Registration Created Successfully!');
   
}

public function userLogin(Request $request){
    $request->validate([
        'phone'=>'required', 'string', 'min:5',
        'password'=>'required',
    ]);

    if(Auth::guard('web')->attempt(['phone'=>$request->phone,'password'=>$request->password])){
        return redirect('/user/dashboard')->with('success', 'User Login Successfully!');
    }else{
        // Session::flash('error-msg','Invalid Email or Password');
        return redirect()->back()->with('error', 'User Login Failed!');
    }
}

public function userLogout(){
    Auth::guard('web')->logout();
    return redirect('/login');
}

public function userDashboard(){
    return view('frontend.user.dashboard');
}

public function userPostAdList(){
    return view('frontend.user.post_ad_list');
}

// List of Customer Data
public function listCustomer(){
    $user = DB::table('users')->get();
    return view('backend.customer.list',compact('user'));
}

// List of Membership Data
public function listMembership(){
    $membership = DB::table('memberships')->get();
    return view('backend.customer.membership',compact('membership'));
}

    // Forgot Password MEthod

    public function forgotPassword(){
        return view('frontend.auth.forgot_password');
    }

    public function updateOtp(Request $request)
    {
        // Validate the phone input
        $credentials = $request->validate([
            'phone' => ['required', 'string', 'exists:users,phone'], // Ensure the phone number exists in the users table
        ]);
    
        // Generate a random 4-digit OTP
        $otp = rand(1000, 9999);
    
        // Update the user's OTP where the phone number matches
        $user = User::where('phone', $request->phone)->first();

       
         $url = "http://bulksmsbd.net/api/smsapi";
         $api_key = "98Df4ltxJ88o55DLe3J3";
         $senderid = "8809617619405";
         $number = $request->phone;
      

         $message = "সম্মানিত গ্রাহক ($user->phone), আপনার OTP: $otp. অনুগ্রহ পূর্বক এই OTP টি শেয়ার করবেন না কোথাও।";
     
         $response = Http::asForm()->post($url, [
             'api_key' => $api_key,
             'senderid' => $senderid,
             'number' => $number,
             'message' => $message,
         ]);
    
        if ($user) {
            $user->update(['otp' => $otp]);
            
           
            return view('frontend.auth.new_password');
        } else {
         
            return back()->withErrors(['phone' => 'Phone number not found.']);
        }

        // $user->update(['otp' => $otp]);
        // return view('frontend.auth.new_password');
        
    }

    public function updateResetPassword(Request $request)
    {
        // Validate the phone input
        $credentials = $request->validate([
            'otp' => ['required', 'string', 'exists:users,otp'], 
            'password' => ['required', 'string', 'min:5'],
            'confirmed_password' => ['required', 'same:password'],
        ]);
    
        // Generate a random 4-digit OTP
        $password =  Hash::make($request->password);
    
        // Update the user's OTP where the phone number matches
        $user = User::where('otp', $request->otp)->first();
    
        if ($user) {
            $user->update(['password' => $password]);
            
            // Redirect to the new password view after updating OTP
            return redirect()->route('login')->with('success', 'New Password Inserted Successfully!');
        } else {
            // Handle case if no user found
            return back()->withErrors(['code' => 'OTP Code Invalid.']);
        }
    }

    // Post Your Ad
    public function userPostAd()
    {
        return view('frontend.user.post_add');
    }

    // public function getDistricts($division_id)
    // {
    //     $districts = DB::table('districts')
    //                     ->where('division_id', $division_id)
    //                     ->get();

    //     return response()->json($districts);
    // }


    // public function getAreas($district_id)
    // {
    //     $areas = DB::table('areas')
    //                 ->where('districts_id', $district_id)
    //                 ->get();

    //     return response()->json($areas);
    // }

    // Get Divisions to Districs
    public function GetDistrict($district_id){
        $district = DB::table('districts')->where('division_id',$district_id)->get();
        return json_encode($district);
    }

     // Get Districs to Areas
     public function GetAreas($area_id){
        $district = DB::table('areas')->where('districts_id',$area_id)->get();
        return json_encode($district);
    }

    // Post Ad Method
    public function postAd(){
        return view('frontend.user.post_add');
    }

    public function postAdDetails(){
        return view('frontend.user.post_add_details');
    }

    // Get Category
    public function GetCategory($category_id){
        $sub_category = DB::table('sub_categories')->where('category_id',$category_id)->get();
        return json_encode($sub_category);
    }

     // Get Brand
     public function GetBrand($brand_id){
        $brand_model = DB::table('brand_models')->where('brand_id',$brand_id)->get();
        return json_encode($brand_model);
    }

    // store post add
    public function storePost(Request $request){

        $request->validate([
       
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'divisions_id' => 'required',
            'district_id' => 'required',
            'area_id' => 'required',
            'condition_value' => 'required',
            'authenticity_value' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'checkbox-28' => 'required',
            'description' => 'required',
            'price' => 'required',
            'img_one' => 'required',
            'name' => 'required',
            'phone' => 'required',
          
         
        ]);

        $user_id = Auth::user()->id;
       
        $data = array();
        $data['user_id'] = $user_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['divisions_id'] = $request->divisions_id;
        $data['district_id'] = $request->district_id;
        $data['area_id'] = $request->area_id;
        $data['condition_value'] = $request->condition_value;
        $data['authenticity_value'] = $request->authenticity_value;
        $data['brand_id'] = $request->brand_id;
        $data['model_id'] = $request->model_id;
        $data['edition'] = $request->edition;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['membership_no'] = $request->membership_no;
        $data['status'] = 0;

        for ($i = 1; $i <= 28; $i++) {
            $data['checkbox-' . $i] = $request->input('checkbox-' . $i, false);
        }
       

        $img_one = $request->img_one;
        $img_two = $request->img_two;
        $img_three = $request->img_three;
        $img_four = $request->img_four;
        $img_five = $request->img_five;
        $img_six = $request->img_six;


            if ($img_one) {
                $img_one_name = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
                \Image::make($img_one)->resize(512, 512)->save(public_path('media/post/' . $img_one_name));
                $data['img_one'] = 'media/post/' . $img_one_name;
            }

            if ($img_two) {
                $img_two_name = hexdec(uniqid()) . '.' . $img_two->getClientOriginalExtension();
                \Image::make($img_two)->resize(512, 512)->save(public_path('media/post/' . $img_two_name));
                $data['img_two'] = 'media/post/' . $img_two_name;
            }

            if ($img_three) {
                $img_three_name = hexdec(uniqid()) . '.' . $img_three->getClientOriginalExtension();
                \Image::make($img_three)->resize(512, 512)->save(public_path('media/post/' . $img_three_name));
                $data['img_three'] = 'media/post/' . $img_three_name;
            }

            if ($img_four) {
                $img_four_name = hexdec(uniqid()) . '.' . $img_four->getClientOriginalExtension();
                \Image::make($img_four)->resize(512, 512)->save(public_path('media/post/' . $img_four_name));
                $data['img_four'] = 'media/post/' . $img_four_name;
            }

            if ($img_five) {
                $img_five_name = hexdec(uniqid()) . '.' . $img_five->getClientOriginalExtension();
                \Image::make($img_five)->resize(512, 512)->save(public_path('media/post/' . $img_five_name));
                $data['img_five'] = 'media/post/' . $img_five_name;
            }

            if ($img_six) {
                $img_six_name = hexdec(uniqid()) . '.' . $img_five->getClientOriginalExtension();
                \Image::make($img_six)->resize(512, 512)->save(public_path('media/post/' . $img_six_name));
                $data['img_six'] = 'media/post/' . $img_six_name;
            }
  
        
        PostAd::create($data);
        return Redirect()->route('user.post.ad.list')->with('success', 'Post Add Successfully!');
        
    }

    public function userPostAdView($id){
        $post_ad = PostAd::findOrFail($id);
        return view('frontend.user.post_view',compact('post_ad'));
    }

    // Membership Method
    public function requestMemberhip(){
        return view('frontend.user.membership');
    }

    public function storeMembership(Request $request)
    {
        
        $data = array();
        $data['user_id'] = $request->user_id;
        $data['status'] = 0;
        $data['ranking'] = 0;

       
    
        // Insert the data into the Membership table
        Membership::create($data);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Membership request submitted successfully!');
    }

    public function updateStatusMember($id)
    {
        // Fetch the post by ID
        $post = Membership::findOrFail($id);

        // Toggle the status (1 -> 0, 0 -> 1)
        $post->status = $post->status == 1 ? 0 : 1;

        // Save the updated status
        $post->save();

        // Optionally, you can set a success message
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function deleteMembership($id)
    {
        // Find the category by ID
        $member = Membership::findOrFail($id);

        // Delete the category
        $member->delete();
    
        return redirect()->back()->with('delete', 'Membership successfully deleted');
    }

    public function profileSetting(){
        $user = DB::table('users')->get();
        return view('frontend.user.profile',compact('user'));
    }

    public function updateProfile(Request $request, $id){

       
       

        $id = $request->id;

        $user = User::findOrFail($id);

       
        $user->Update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        
        ]);

        return Redirect()->back()->with('success', 'Profile Updated Successfully Updated');

        } 


}
