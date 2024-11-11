<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Division;
use App\Models\PostAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function adsBangladesh($id)
{
    $category = Category::findOrFail($id);

// Fetch the ads related to this category using the category_id
$post_add = DB::table('post_ads')
              ->where('category_id', $category->id)
              ->get();

// Fetch membership data
$members = DB::table('memberships')->get();

// Assuming you want to fetch `user_id` for further filtering
$memberRanks = $members->pluck('user_id');

// Fetch ads related to this category for specific users
$member_post_add = DB::table('post_ads')
                     ->where('category_id', $category->id)
                     ->whereIn('user_id', $memberRanks)
                     ->get();


    // Return the view with the fetched ads and category data
    return view('frontend.products.all_bangladesh', compact('post_add', 'category','member_post_add'));
}

public function adPostDeatils($id)
{
    $postDetails = PostAd::findOrFail($id);
    return view('frontend.products.all_post_details', compact('postDetails'));
}

public function allCategory($id)
{
    $category = Category::findOrFail($id);

// Fetch the ads related to this category using the category_id
$post_add = DB::table('post_ads')
              ->where('category_id', $category->id)
              ->get();

// Fetch membership data
$members = DB::table('memberships')->get();

// Assuming you want to fetch `user_id` for further filtering
$memberRanks = $members->pluck('user_id');

// Fetch ads related to this category for specific users
$member_post_add = DB::table('post_ads')
                     ->where('category_id', $category->id)
                     ->whereIn('user_id', $memberRanks)
                     ->get();


    // Return the view with the fetched ads and category data
    return view('frontend.products.all_category', compact('post_add', 'category','member_post_add'));
}

public function allDivision($id)
{
    $division = Division::findOrFail($id);

// Fetch the ads related to this category using the category_id
$post_add = DB::table('post_ads')
              ->where('divisions_id', $division->id)
              ->get();

// Fetch membership data
$members = DB::table('memberships')->get();

// Assuming you want to fetch `user_id` for further filtering
$memberRanks = $members->pluck('user_id');

// Fetch ads related to this category for specific users
$member_post_add = DB::table('post_ads')
                     ->where('divisions_id', $division->id)
                     ->whereIn('user_id', $memberRanks)
                     ->get();


    // Return the view with the fetched ads and category data
    return view('frontend.products.all_divisions', compact('post_add', 'division','member_post_add'));
}

}
