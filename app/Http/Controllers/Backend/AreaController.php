<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function addDivisions(){
     
        return view('backend.area.divisions.add');
    }

    public function listDivisions(){
        $division = DB::table('divisions')->orderBy('divisions_name','asc')->get();
        return view('backend.area.divisions.list',compact('division'));
    }

    public function storeDivisions(Request $request){

        $request->validate([
            'divisions_name' => 'required|unique:divisions',
        ]);
       
        $data = array();
        $data['divisions_name'] = $request->divisions_name;

        
        Division::create($data);
        return Redirect()->route('list.divisions')->with('success', 'Divisions Inserted Successfully!');
        
    }

    public function deleteDivisions($id)
    {
        // Find the category by ID
        $division = Division::findOrFail($id);
         
    
        // Delete the category
        $division->delete();
    
        return redirect()->back()->with('delete', 'Divisions Successfully Deleted');
    }

    public function editDivisions($id){

        $division = DB::table('divisions')->find($id);
        return view('backend.area.divisions.edit',compact('division'));
    }

    public function updateDivisions(Request $request, $id){

        $id = $request->id;

        $division = Division::findOrFail($id);

        $request->validate([
            'divisions_name' => 'required',
        
         
        ]);

        $division->Update([
        'divisions_name' => $request->divisions_name,
      
        ]);

        return Redirect()->route('list.divisions')->with('success', 'Divisions Updated Successfully!');

    }

    // Districts Method
    public function addDistricts(){
        $division = DB::table('divisions')->orderBy('divisions_name','asc')->get();
        return view('backend.area.districts.add',compact('division'));
    }

    public function listDistricts(){
        // $district = DB::table('districts')->orderBy('districts_name','asc')->get();

        $district = DB::table('districts')
    ->join('divisions', 'districts.division_id', '=', 'divisions.id')
    ->orderBy('divisions.divisions_name', 'asc')
    ->select('districts.*', 'divisions.divisions_name')
    ->get();
    
        return view('backend.area.districts.list',compact('district'));
    }

    public function storeDistricts(Request $request){

        $request->validate([
            'division_id' => 'required',
            'districts_name' => 'required|unique:districts',
        ]);
       
        $data = array();
        $data['division_id'] = $request->division_id;
        $data['districts_name'] = $request->districts_name;

        
        District::create($data);
        return Redirect()->route('list.districts')->with('success', 'Districts Inserted Successfully!');
        
    }

    public function deleteDistricts($id)
    {
        // Find the category by ID
        $district = District::findOrFail($id);
         
    
        // Delete the category
        $district->delete();
    
        return redirect()->back()->with('delete', 'Districts Successfully Deleted');
    }

    public function editDistricts($id){
        $district = DB::table('districts')->where('id',$id)->first();
        $division = DB::table('divisions')->get();
        return view('backend.area.districts.edit',compact('division','district'));
    }

    public function updateDistricts(Request $request, $id){

        $id = $request->id;

        $district = District::findOrFail($id);

        $request->validate([
            'division_id' => 'required',
            'districts_name' => 'required',
        
         
        ]);

        $district->Update([
        'division_id' => $request->division_id,
        'districts_name' => $request->districts_name,
      
        ]);

        return Redirect()->route('list.districts')->with('success', 'Districts Updated Successfully!');

    }

     // Areas Method
     public function addAreas(){
        $district = DB::table('districts')->orderBy('districts_name','asc')->get();
        return view('backend.area.areas.add',compact('district'));
    }

    public function listAreas(){
     
        $area = DB::table('areas')
    ->join('districts', 'areas.districts_id', '=', 'districts.id')
    ->orderBy('districts.districts_name', 'asc')
    ->select('areas.*', 'districts.districts_name')
    ->get();
    
        return view('backend.area.areas.list',compact('area'));
    }

    public function storeAreas(Request $request){

        $request->validate([
            'districts_id' => 'required',
            'areas_name' => 'required|unique:areas',
        ]);
       
        $data = array();
        $data['districts_id'] = $request->districts_id;
        $data['areas_name'] = $request->areas_name;

        
        Area::create($data);
        return Redirect()->route('list.areas')->with('success', 'Areas Inserted Successfully!');
        
    }

    public function deleteAreas($id)
    {
        // Find the category by ID
        $area = Area::findOrFail($id);
         
    
        // Delete the category
        $area->delete();
    
        return redirect()->back()->with('delete', 'Areas Successfully Deleted');
    }

    public function editAreas($id){

        $area = DB::table('areas')->where('id',$id)->first();
        $district = DB::table('districts')->get();

        return view('backend.area.areas.edit',compact('district','area'));
    }

    public function updateAreas(Request $request, $id){

        $id = $request->id;

        $area = Area::findOrFail($id);

        $request->validate([
            'districts_id' => 'required',
            'areas_name' => 'required',
        
         
        ]);

        $area->Update([
        'districts_id' => $request->districts_id,
        'areas_name' => $request->areas_name,
      
        ]);

        return Redirect()->route('list.areas')->with('success', 'Areas Updated Successfully!');

    }

}
