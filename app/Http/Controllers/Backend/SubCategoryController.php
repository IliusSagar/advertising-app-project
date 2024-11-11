<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function addSubCategory(){
        $category = DB::table('categories')->orderBy('category','asc')->get();
        return view('backend.Sub_category.add',compact('category'));
    }

    public function listSubCategory(){
        $sub_category = DB::table('sub_categories')->orderBy('name','asc')->get();
        return view('backend.Sub_category.list',compact('sub_category'));
    }

    public function storeSubCategory(Request $request){

        $request->validate([
       
            'category_id' => 'required',
            'name' => 'required',
         
        ]);
       
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['name'] = $request->name;
       

      
        SubCategory::create($data);
        return Redirect()->route('list.subcategory')->with('success', 'Sub Category Inserted Successfully!');
        
    }

    public function deleteSubCategory($id)
    {
        // Find the category by ID
        $sub_category = SubCategory::findOrFail($id);

        // Delete the category
        $sub_category->delete();
    
        return redirect()->back()->with('delete', 'Sub Category successfully deleted');
    }

    public function editSubCategory($id){
        $sub_category = DB::table('sub_categories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('backend.Sub_category.edit',compact('sub_category','category'));
    }

    public function updateSubCategory(Request $request, $id){

        $id = $request->id;

        $sub_category = SubCategory::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        
         
        ]);

        $sub_category->Update([
        'category_id' => $request->category_id,
        'name' => $request->name,
      
        ]);

        return Redirect()->route('list.subcategory')->with('success', 'Sub Category Updated Successfully!');

    }

}
