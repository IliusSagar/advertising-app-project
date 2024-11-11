<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\PostAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostAdController extends Controller
{
    public function listAdPost(){
        $p_add = DB::table('post_ads')->orderBy('id','desc')->get();
        return view('backend.post_add.list',compact('p_add'));
    }

    public function updateStatus($id)
    {
        // Fetch the post by ID
        $post = PostAd::findOrFail($id);

        // Toggle the status (1 -> 0, 0 -> 1)
        $post->status = $post->status == 1 ? 0 : 1;

        // Save the updated status
        $post->save();

        // Optionally, you can set a success message
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    

    public function viewAdPost($id){
        $post_ad = DB::table('post_ads')->where('id',$id)->first();
        return view('backend.post_add.view',compact('post_ad'));
    }
}
