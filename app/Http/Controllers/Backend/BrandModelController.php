<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandModelController extends Controller
{
    public function addModel(){
        $brand = DB::table('brands')->orderBy('name','asc')->get();
        return view('backend.brand_model.add',compact('brand'));
    }

    public function listModel(){
        $brand_model = DB::table('brand_models')->orderBy('model_name','asc')->get();
        return view('backend.brand_model.list',compact('brand_model'));
    }

    public function storeModel(Request $request){

        $request->validate([
       
            'brand_id' => 'required',
            'model_name' => 'required',
         
        ]);
       
        $data = array();
        $data['brand_id'] = $request->brand_id;
        $data['model_name'] = $request->model_name;
       

      
        BrandModel::create($data);
        return Redirect()->route('list.model')->with('success', 'Model Inserted Successfully!');
        
    }

    public function deleteModel($id)
    {
        // Find the category by ID
        $brand_model = BrandModel::findOrFail($id);

        // Delete the category
        $brand_model->delete();
    
        return redirect()->back()->with('delete', 'Model successfully deleted');
    }

    public function editModel($id){
        $brand_model = DB::table('brand_models')->where('id',$id)->first();
        $brand = DB::table('brands')->get();
        return view('backend.brand_model.edit',compact('brand_model','brand'));
    }

    public function updateModel(Request $request, $id){

        $id = $request->id;

        $brand_model = BrandModel::findOrFail($id);

        $request->validate([
            'brand_id' => 'required',
            'model_name' => 'required',
        
         
        ]);

        $brand_model->Update([
        'brand_id' => $request->brand_id,
        'model_name' => $request->model_name,
      
        ]);

        return Redirect()->route('list.model')->with('success', 'Model Updated Successfully!');

    }

}
