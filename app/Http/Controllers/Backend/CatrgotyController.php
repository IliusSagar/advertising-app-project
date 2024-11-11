<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class CatrgotyController extends Controller
{
    public function addCategory(){
        $category = DB::table('categories')->orderBy('category','asc')->get();
        return view('backend.category.add',compact('category'));
    }

    public function listCategory(){
        $category = DB::table('categories')->orderBy('category','asc')->get();
        return view('backend.category.list',compact('category'));
    }

    public function storeCategory(Request $request){

        $request->validate([
       
            'category' => 'required',
         
        ]);
       
        $data = array();
        $data['category'] = $request->category;
       

        $image = $request->image;

        
        if (!$image) {
            return Redirect()->back()->with('error', 'Without Image Not Updated');
        } else {
            if ($image) {
                $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                \Image::make($image)->resize(512, 512)->save(public_path('media/falticon/' . $image_name));
                $data['image'] = 'media/falticon/' . $image_name;
            }
        }
        
        Category::create($data);
        return Redirect()->route('list.category')->with('success', 'Category Inserted Successfully!');
        
    }

    public function deleteCategory($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();
    
        return redirect()->back()->with('delete', 'Category successfully deleted');
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.edit',compact('category'));
    }

    public function updateCategory(Request $request, $id){

        $request->validate([
       
            'category' => 'required',
         
        ]);
       

        $id = $request->id;

$category = Category::findOrFail($id);

if($request->hasFile('image')){
 $image = $request->file('image');


$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
Image::make($image)->resize(512,512)->save(public_path('media/falticon/'.$name_gen));
$img_url = 'media/falticon/'.$name_gen;

}else{
$img_url = $category->image;
}

$category->Update([
'category' => $request->category,
'image' => $img_url,
]);

return Redirect()->route('list.category')->with('success', 'Category Successfully Updated');

} // End method

}
