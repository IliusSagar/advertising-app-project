<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Image;

class HomePageController extends Controller
{
    // Favicon Method
    public function editFaviconHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.favicon.edit',compact('home_page'));
    }

    public function updateFaviconHomePage(Request $request,$id){

        $request->validate([
            'title' => 'required',
         
        ]);

        $id = $request->id;
        $home_page = HomePage::findOrFail($id);
        
        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(1024,1024)->save(public_path('media/favicon/'.$name_gen));
           $img_url = 'media/favicon/'.$name_gen;
           
           }else{
           $img_url = $home_page->favicon;
           }
           
           $home_page->Update([
           'title' => $request->title,
           'favicon' => $img_url,
           ]);
        return Redirect()->back()->with('success', 'Favicon Update Successfully!');
        
    }

    // Header logo Method
    public function editHeaderLogoHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.header_logo.edit',compact('home_page'));
    }

    public function updateHeaderLogoHomePage(Request $request,$id){

      

        $id = $request->id;
        $home_page = HomePage::findOrFail($id);
        
        if($request->hasFile('header_logo')){
            $image = $request->file('header_logo');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(3582,1112)->save(public_path('media/header_logo/'.$name_gen));
           $img_url = 'media/header_logo/'.$name_gen;
           
           }else{
           $img_url = $home_page->header_logo;
           }
           
           $home_page->Update([
           'header_logo' => $img_url,
           ]);
        return Redirect()->back()->with('success', 'Header Logo Updated Successfully!');
        
    }

    // Carousel Banner Method
    public function editCarouselBannerLogoHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.carousel_banner.edit',compact('home_page'));
    }

    public function updateCarouselBannerLogoHomePage(Request $request,$id){

      

        $id = $request->id;
        $home_page = HomePage::findOrFail($id);
        
        // Banner One
        if($request->hasFile('banner_one')){
            $image = $request->file('banner_one');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(2240,600)->save(public_path('media/carousel/'.$name_gen));
           $img_url = 'media/carousel/'.$name_gen;
           
           }else{
           $img_url = $home_page->banner_one;
           }

           // Banner Two
           if($request->hasFile('banner_two')){
            $image = $request->file('banner_two');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(2240,600)->save(public_path('media/carousel/'.$name_gen));
           $img_url_two = 'media/carousel/'.$name_gen;
           
           }else{
           $img_url_two = $home_page->banner_two;
           }

           // Banner Three
           if($request->hasFile('banner_three')){
            $image = $request->file('banner_three');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(2240,600)->save(public_path('media/carousel/'.$name_gen));
           $img_url_three = 'media/carousel/'.$name_gen;
           
           }else{
           $img_url_three = $home_page->banner_three;
           }
           
           $home_page->Update([
           'banner_one' => $img_url,
           'banner_two' => $img_url_two,
           'banner_three' => $img_url_three,
           ]);

        return Redirect()->back()->with('success', 'Carousel Updated Successfully!');
        
    }

    // Home Page Under Content Method
    public function editUnderContentHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.under_content.edit',compact('home_page'));
    }

    public function updateUnderContentHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'under_content' => 'required',
          
         
        ]);

        $home_page->Update([
        'under_content' => $request->under_content,
       
        ]);

        return Redirect()->back()->with('success', 'Home Page Updated Successfully!');

    }

    // Company Information Method
    public function editCompanyInformationLogoHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.company_information.edit',compact('home_page'));
    }

    public function updateCompanyInformationLogoHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'hotline' => 'required',
         
        ]);

        $home_page->Update([
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'email' => $request->email,
        'phone' => $request->phone,
        'hotline' => $request->hotline,
        ]);

        return Redirect()->back()->with('success', 'Company Information Updated Successfully!');

    }


    // Social Media Method
    public function editSocialMediaHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.social_media.edit',compact('home_page'));
    }

    public function updateSocialMediaHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'linkedin' => 'required',
         
        ]);

        $home_page->Update([
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'youtube' => $request->youtube,
        'linkedin' => $request->linkedin,
        ]);

        return Redirect()->back()->with('success', 'Social Media Updated Successfully!');

    }

     // App Link Method
     public function editAppLinkHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.app_link.edit',compact('home_page'));
    }

    public function updateAppLinkHomePage(Request $request,$id){

      

        $id = $request->id;
        $home_page = HomePage::findOrFail($id);
        
        // Banner One
        if($request->hasFile('android_app_image')){
            $image = $request->file('android_app_image');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(382,132)->save(public_path('media/app/'.$name_gen));
           $img_url = 'media/app/'.$name_gen;
           
           }else{
           $img_url = $home_page->android_app_image;
           }

           // Banner Two
           if($request->hasFile('ios_app_image')){
            $image = $request->file('ios_app_image');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(382,132)->save(public_path('media/app/'.$name_gen));
           $img_url_two = 'media/app/'.$name_gen;
           
           }else{
           $img_url_two = $home_page->ios_app_image;
           }

          
           $home_page->Update([
           'android_app_link' => $request->android_app_link,
           'android_app_image' => $img_url,
           'ios_app_link' => $request->ios_app_link,
           'ios_app_image' => $img_url_two,

           ]);

        return Redirect()->back()->with('success', 'App Link Updated Successfully!');
        
    }

    // Footer Logo Method
    public function editFooterLogoHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.footer_logo.edit',compact('home_page'));
    }

    public function updateFooterLogoHomePage(Request $request,$id){

      

        $id = $request->id;
        $home_page = HomePage::findOrFail($id);
        
        // Banner One
        if($request->hasFile('footer_logo')){
            $image = $request->file('footer_logo');
           
           
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(3582,1112)->save(public_path('media/footer_logo/'.$name_gen));
           $img_url = 'media/footer_logo/'.$name_gen;
           
           }else{
           $img_url = $home_page->footer_logo;
           }

          
           $home_page->Update([

           'footer_logo' => $img_url,
         

           ]);

        return Redirect()->back()->with('success', 'Footer Logo Updated Successfully!');
        
    }

     // 5 Pages Method
     public function editAboutUsHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.about_us.edit',compact('home_page'));
    }

    public function editCareersHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.careers.edit',compact('home_page'));
    }

    public function editTermsConditionHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.terms_condition.edit',compact('home_page'));
    }

    public function editPrivacyPolicyHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.privacy_policy.edit',compact('home_page'));
    }

    public function editFaqHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.faq.edit',compact('home_page'));
    }

    public function editContactUsHomePage(){

        $home_page = HomePage::where('id', 2)->first();

        return view('backend.home_page.contact_us.edit',compact('home_page'));
    }


    public function updateAboutUsHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'about_us' => 'required',
          
         
        ]);

        $home_page->Update([
        'about_us' => $request->about_us,
   
        ]);

        return Redirect()->back()->with('success', 'About Us Updated Successfully!');

    }

    public function updateCareersHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'careers' => 'required',
          
         
        ]);

        $home_page->Update([
        'careers' => $request->careers,
   
        ]);

        return Redirect()->back()->with('success', 'Careers Updated Successfully!');

    }

    public function updateTermsConditonHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'terms_condition' => 'required',
          
         
        ]);

        $home_page->Update([
        'terms_condition' => $request->terms_condition,
   
        ]);

        return Redirect()->back()->with('success', 'Terms & Condition Updated Successfully!');

    }

    public function updatePrivacyPolicyHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'privacy_policy' => 'required',
          
         
        ]);

        $home_page->Update([
        'privacy_policy' => $request->privacy_policy,
   
        ]);

        return Redirect()->back()->with('success', 'Privacy Policy Updated Successfully!');

    }

    public function updateFaqHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'faq' => 'required',
          
         
        ]);

        $home_page->Update([
        'faq' => $request->faq,
   
        ]);

        return Redirect()->back()->with('success', 'FAQ Updated Successfully!');

    }

    public function updateContactUsHomePage(Request $request, $id){

        $id = $request->id;

        $home_page = HomePage::findOrFail($id);

        $request->validate([
            'contact_us' => 'required',
          
         
        ]);

        $home_page->Update([
        'contact_us' => $request->contact_us,
   
        ]);

        return Redirect()->back()->with('success', 'Contact Us Updated Successfully!');

    }



}
