<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class BrandController extends Controller
{
    public function addBrand(){
        $brand = DB::table('brands')->orderBy('name','asc')->get();
        return view('backend.brand.add',compact('brand'));
    }

    public function listBrand(){
        $brand = DB::table('brands')->orderBy('name','asc')->get();
        return view('backend.brand.list',compact('brand'));
    }

    public function storeBrand(Request $request){

        $request->validate([
       
            'name' => 'required',
         
        ]);
       
        $data = array();
        $data['name'] = $request->name;
       

        $image = $request->image;

        
        if (!$image) {
            return Redirect()->back()->with('error', 'Without Image Not Updated');
        } else {
            if ($image) {
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                \Image::make($image)->resize(512, 512)->save(public_path('media/brand/' . $image_name));
                $data['image'] = 'media/brand/' . $image_name;
            }
        }
        
        Brand::create($data);
        return Redirect()->route('list.brand')->with('success', 'Brand Inserted Successfully!');
        
    }

    public function deleteBrand($id)
    {
        // Find the category by ID
        $brand = Brand::findOrFail($id);

        // Delete the category
        $brand->delete();
    
        return redirect()->back()->with('delete', 'Brand successfully deleted');
    }

    public function editBrand($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.edit',compact('brand'));
    }

    public function updateBrand(Request $request, $id){

        $request->validate([
       
            'name' => 'required',
         
        ]);
       

        $id = $request->id;

        $brand = Brand::findOrFail($id);

        if($request->hasFile('image')){
        $image = $request->file('image');


        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(512,512)->save(public_path('media/brand/'.$name_gen));
        $img_url = 'media/brand/'.$name_gen;

        }else{
        $img_url = $brand->image;
        }

        $brand->Update([
        'name' => $request->name,
        'image' => $img_url,
        ]);

        return Redirect()->route('list.brand')->with('success', 'Brand Successfully Updated');

        } 


}
