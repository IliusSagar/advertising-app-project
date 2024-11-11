<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\BrandModelController;
use App\Http\Controllers\Backend\CatrgotyController;
use App\Http\Controllers\Backend\HomePageController;
use App\Http\Controllers\Backend\PostAdController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 // Start Open Link routes

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/login', function () {
    return view('frontend.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('frontend.auth.register');
});

Route::get('/otp/new/password',function(){
    return view('frontend.auth.new_password');
});

// 6 Pages Route
Route::get('/about-us', function () {
    return view('frontend.pages.about-us');
})->name('pages.about-us');

Route::get('/careers', function () {
    return view('frontend.pages.careers');
})->name('pages.careers');

Route::get('/terms-condition', function () {
    return view('frontend.pages.terms_condition');
})->name('pages.terms_condition');

Route::get('/privacy-policy', function () {
    return view('frontend.pages.privacy_policy');
})->name('pages.privacy_policy');

Route::get('/faq', function () {
    return view('frontend.pages.faq');
})->name('pages.faq');

Route::get('/contact-us', function () {
    return view('frontend.pages.contact_us');
})->name('pages.contact_us');

 // User Register/Login routes
 Route::controller(UserController::class)->group(function () {
    Route::post('/register/store', 'userRegister')->name('user.register');
    Route::post('/login/store', 'userLogin')->name('user.login');

    // Forgot Password routes
    Route::get('/forgot/password', 'forgotPassword')->name('forgot.password');
    Route::post('/otp/new/password', 'updateOtp')->name('update.otp');
    Route::post('/reset/password', 'updateResetPassword')->name('update.reset.password');

    // Socialite Google Login
    Route::get('/google/login', 'googleLogin')->name('google.login');
    Route::get('/oauth2callback', 'googleCallback')->name('google.callback');

});

 // Admin Login routes
 Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'adminLoginForm')->name('admin.login.form');
    Route::post('/admin-login', 'adminLogin')->name('admin.login');
}); 

 // Product Frontend routes
 Route::controller(ProductController::class)->group(function () {
    Route::get('/ads/bangladesh/{id}', 'adsBangladesh')->name('ads.bangladesh');
    Route::get('/ad/post/details/{id}', 'adPostDeatils')->name('post.add.details');

    // All Category & Division Routes
    Route::get('/all-category/{id}', 'allCategory')->name('all.category');
    Route::get('/all-division/{id}', 'allDivision')->name('all.division');
   
}); 


// End Open Link routes

 // Start User Middleware Route
 Route::group(['middleware'=>'user'],function(){

    Route::controller(UserController::class)->group(function () {
        Route::get('/user/dashboard', 'userDashboard')->name('user.dashboard');
        Route::get('/user/post/ad/list', 'userPostAdList')->name('user.post.ad.list');
        Route::get('/user/post/ad/view/{id}', 'userPostAdView')->name('user.post.ad.view');
        Route::get('/user/logout',  'userLogout')->name('user.logout');

        // Post Your Ad Route
        Route::get('/user/post/your/ad', 'userPostAd')->name('post.ad');
        // Route::get('/get-districts/{division_id}', 'getDistricts');
        // Route::get('/get-areas/{district_id}','getAreas');

        Route::get('get/districts/{district_id}', 'GetDistrict');
        Route::get('get/areas/{area_id}', 'GetAreas');

        // POST Ad Route
       Route::get('/post-ad',  'postAd')->name('post.ad');
       Route::get('/post-ad/details',  'postAdDetails')->name('post.ad.details');
       Route::get('get/category/{category_id}', 'GetCategory');
       Route::get('get/brand/{brand_id}', 'GetBrand');
       Route::post('/post-ad/store',  'storePost')->name('store.post');

       // Membership Route
       Route::get('/request-membership',  'requestMemberhip')->name('request.membership');
       Route::post('/store/membership',  'storeMembership')->name('request.membership.store');

       // Profile Setting Route
       Route::get('/profile-setting',  'profileSetting')->name('profile.setting');
       Route::post('/update-profile/{id}',  'updateProfile')->name('update.profile');
      


    });

 });
 // End User Middleware Route

   // Start Admin Middleware Route
   Route::group(['middleware'=>'admin'],function(){

    // Admin Dashboard Route
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    // Home Page Route
    // Favicon Route
    Route::get('/admin/home/page/favicon/edit', [HomePageController::class, 'editFaviconHomePage'])->name('edit.home.page.favicon');
    Route::post('/admin/home/page/favicon/update/{id}', [HomePageController::class, 'updateFaviconHomePage'])->name('update.home.page.favicon');

    // Header Logo Route
    Route::get('/admin/home/page/header/logo/edit', [HomePageController::class, 'editHeaderLogoHomePage'])->name('edit.home.page.header.logo');
    Route::post('/admin/home/page/header/logo/update/{id}', [HomePageController::class, 'updateHeaderLogoHomePage'])->name('update.home.page.header.logo');

     // Carousel Banner Route
     Route::get('/admin/home/page/carousel/banner/edit', [HomePageController::class, 'editCarouselBannerLogoHomePage'])->name('edit.home.page.carousel.banner');
     Route::post('/admin/home/page/carousel/banner/update/{id}', [HomePageController::class, 'updateCarouselBannerLogoHomePage'])->name('update.home.page.carousel.banner');

       // Home Page Under Route
       Route::get('/admin/home/page/under/content/edit', [HomePageController::class, 'editUnderContentHomePage'])->name('edit.home.page.under.content');
       Route::post('/admin/home/page/under/content/update/{id}', [HomePageController::class, 'updateUnderContentHomePage'])->name('update.home.page.under.content');

     // Company information Route
     Route::get('/admin/home/page/company/information/edit', [HomePageController::class, 'editCompanyInformationLogoHomePage'])->name('edit.home.page.company.information');
     Route::post('/admin/home/page/company/information/update/{id}', [HomePageController::class, 'updateCompanyInformationLogoHomePage'])->name('update.home.page.company.information');

     // Social Media Route
     Route::get('/admin/home/page/social/media/edit', [HomePageController::class, 'editSocialMediaHomePage'])->name('edit.home.page.social.media');
     Route::post('/admin/home/page/social/media/update/{id}', [HomePageController::class, 'updateSocialMediaHomePage'])->name('update.home.page.social.media');

     // App Link Route
     Route::get('/admin/home/page/app/link/edit', [HomePageController::class, 'editAppLinkHomePage'])->name('edit.home.page.app.link');
     Route::post('/admin/home/page/app/link/update/{id}', [HomePageController::class, 'updateAppLinkHomePage'])->name('update.home.page.app.link');

     // Footer logo Route
     Route::get('/admin/home/page/footer/logo/edit', [HomePageController::class, 'editFooterLogoHomePage'])->name('edit.home.page.footer.logo');
     Route::post('/admin/home/page/footer/logo/update/{id}', [HomePageController::class, 'updateFooterLogoHomePage'])->name('update.home.page.footer.logo');

     // 5 Pages Route
     Route::get('/admin/home/page/about/us/edit', [HomePageController::class, 'editAboutUsHomePage'])->name('edit.home.page.about.us');
     Route::post('/admin/home/page/about/us/update/{id}', [HomePageController::class, 'updateAboutUsHomePage'])->name('update.home.page.about.us');

     Route::get('/admin/home/page/careers/edit', [HomePageController::class, 'editCareersHomePage'])->name('edit.home.page.careers');
     Route::post('/admin/home/page/careers/update/{id}', [HomePageController::class, 'updateCareersHomePage'])->name('update.home.page.careers');

     Route::get('/admin/home/page/terms/condition/edit', [HomePageController::class, 'editTermsConditionHomePage'])->name('edit.home.page.terms.condition');
     Route::post('/admin/home/page/terms/condition/update/{id}', [HomePageController::class, 'updateTermsConditonHomePage'])->name('update.home.page.terms.condition');

     Route::get('/admin/home/page/privacy/policy/edit', [HomePageController::class, 'editPrivacyPolicyHomePage'])->name('edit.home.page.privacy.policy');
     Route::post('/admin/home/page/privacy/policy/update/{id}', [HomePageController::class, 'updatePrivacyPolicyHomePage'])->name('update.home.page.privacy.policy');

     Route::get('/admin/home/page/faq/edit', [HomePageController::class, 'editFaqHomePage'])->name('edit.home.page.faq');
     Route::post('/admin/home/page/faq/update/{id}', [HomePageController::class, 'updateFaqHomePage'])->name('update.home.page.faq');

     Route::get('/admin/home/page/contact/us/edit', [HomePageController::class, 'editContactUsHomePage'])->name('edit.home.page.contact.us');
     Route::post('/admin/home/page/contact/us/update/{id}', [HomePageController::class, 'updateContactUsHomePage'])->name('update.home.page.contact.us');

      // Customer Data  Route
      Route::get('/admin/customer/list', [UserController::class, 'listCustomer'])->name('list.customer');
  

      // Divisions  Route
      Route::get('/admin/divisions/add', [AreaController::class, 'addDivisions'])->name('add.divisions');
      Route::get('/admin/divisions/list', [AreaController::class, 'listDivisions'])->name('list.divisions');
      Route::post('/admin/divisions/store', [AreaController::class, 'storeDivisions'])->name('store.divisions');
      Route::get('/admin/divisions/delete/{id}', [AreaController::class, 'deleteDivisions'])->name('delete.divisions');
      Route::get('/admin/divisions/edit/{id}', [AreaController::class, 'editDivisions'])->name('edit.divisions');
      Route::post('/admin/divisions/update/{id}', [AreaController::class, 'updateDivisions'])->name('update.divisions');

      // Districts  Route
      Route::get('/admin/districts/add', [AreaController::class, 'addDistricts'])->name('add.districts');
      Route::get('/admin/districts/list', [AreaController::class, 'listDistricts'])->name('list.districts');
      Route::post('/admin/districts/store', [AreaController::class, 'storeDistricts'])->name('store.districts');
      Route::get('/admin/districts/delete/{id}', [AreaController::class, 'deleteDistricts'])->name('delete.districts');
      Route::get('/admin/districts/edit/{id}', [AreaController::class, 'editDistricts'])->name('edit.districts');
      Route::post('/admin/districts/update/{id}', [AreaController::class, 'updateDistricts'])->name('update.districts');

      // Areas  Route
      Route::get('/admin/areas/add', [AreaController::class, 'addAreas'])->name('add.areas');
      Route::get('/admin/areas/list', [AreaController::class, 'listAreas'])->name('list.areas');
      Route::post('/admin/areas/store', [AreaController::class, 'storeAreas'])->name('store.areas');
      Route::get('/admin/areas/delete/{id}', [AreaController::class, 'deleteAreas'])->name('delete.areas');
      Route::get('/admin/areas/edit/{id}', [AreaController::class, 'editAreas'])->name('edit.areas');
      Route::post('/admin/areas/update/{id}', [AreaController::class, 'updateAreas'])->name('update.areas');

      // Category  Route
      Route::get('/admin/category/add', [CatrgotyController::class, 'addCategory'])->name('add.category');
      Route::get('/admin/category/list', [CatrgotyController::class, 'listCategory'])->name('list.category');
      Route::post('/admin/category/store', [CatrgotyController::class, 'storeCategory'])->name('store.category');
      Route::get('/admin/category/delete/{id}', [CatrgotyController::class, 'deleteCategory'])->name('delete.category');
      Route::get('/admin/category/edit/{id}', [CatrgotyController::class, 'editCategory'])->name('edit.category');
      Route::post('/admin/category/update/{id}', [CatrgotyController::class, 'updateCategory'])->name('update.category');

      // Sub Category Route
      Route::get('/admin/subcategory/add', [SubCategoryController::class, 'addSubCategory'])->name('add.subcategory');
      Route::get('/admin/subcategory/list', [SubCategoryController::class, 'listSubCategory'])->name('list.subcategory');
      Route::post('/admin/subcategory/store', [SubCategoryController::class, 'storeSubCategory'])->name('store.subcategory');
      Route::get('/admin/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.subcategory');
      Route::get('/admin/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.subcategory');
      Route::post('/admin/subcategory/update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.subcategory');

       // Brand Route
       Route::get('/admin/brand/add', [BrandController::class, 'addBrand'])->name('add.brand');
       Route::get('/admin/brand/list', [BrandController::class, 'listBrand'])->name('list.brand');
       Route::post('/admin/brand/store', [BrandController::class, 'storeBrand'])->name('store.brand');
       Route::get('/admin/brand/delete/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
       Route::get('/admin/brand/edit/{id}', [BrandController::class, 'editBrand'])->name('edit.brand');
       Route::post('/admin/brand/update/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');

        // Model Route
        Route::get('/admin/model/add', [BrandModelController::class, 'addModel'])->name('add.model');
        Route::get('/admin/model/list', [BrandModelController::class, 'listModel'])->name('list.model');
        Route::post('/admin/model/store', [BrandModelController::class, 'storeModel'])->name('store.model');
        Route::get('/admin/model/delete/{id}', [BrandModelController::class, 'deleteModel'])->name('delete.model');
        Route::get('/admin/model/edit/{id}', [BrandModelController::class, 'editModel'])->name('edit.model');
        Route::post('/admin/model/update/{id}', [BrandModelController::class, 'updateModel'])->name('update.model');

         // Ad Post Route
         Route::get('/admin/post/ad/list', [PostAdController::class, 'listAdPost'])->name('list.ad.post');
         Route::post('/update-status/{id}', [PostAdController::class, 'updateStatus'])->name('update.status');
        
         Route::get('/admin/post/ad/view/{id}', [PostAdController::class, 'viewAdPost'])->name('view.ad.post');


         // Membership
         Route::get('/admin/membership/list', [UserController::class, 'listMembership'])->name('list.membership');
         Route::post('/update-status-member/{id}', [UserController::class, 'updateStatusMember'])->name('update.status.member');
         Route::get('/admin/membership/delete/{id}', [UserController::class, 'deleteMembership'])->name('delete.membership');

});
  // End Admin Middleware Route