@extends('master.frontend')

@section('content')

<div class="card p-3 shadow ">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                @php 
                  $user = Auth::user();
                @endphp

                <div class="card p-3 shadow">
                @php 
  
  $postCat = $post_ad->category_id;
  $category = DB::table('categories')->where('id',$postCat)->first();
  @endphp

                <div class="row">

               
               
                <div class="col-md-12">
               <h4>Post Ad View Details - <span class="badge bg-success">{{$category->category}}</span><hr style="width: 100%;" >
                </div>

                
                   
                    <div class="col-md-12">
                   
                   <div class="card p-3">
      
                   <div class="row">

                   <div class="col-md-12 mt-2">
                    <img src="{{ asset($post_ad->img_one)}}" alt="" style="height: 80px;">
                    <img src="{{ asset($post_ad->img_two)}}" alt="" style="height: 80px;">
                    <img src="{{ asset($post_ad->img_three)}}" alt="" style="height: 80px;">
                    <img src="{{ asset($post_ad->img_four)}}" alt="" style="height: 80px;">
                    <img src="{{ asset($post_ad->img_five)}}" alt="" style="height: 80px;">
                    <img src="{{ asset($post_ad->img_six)}}" alt="" style="height: 80px;">
                    </div>

                   
                   <div class="col-md-4 mt-2">
                   @if($post_ad->status == 0)
                    Status: <span class="badge bg-warning">Admin Pending</span>
                    @else
                    Status: <span class="badge bg-success">Admin Approved</span>
      @endif
                    </div>

                    
                    @php 
  
  $postCat = $post_ad->category_id;
  $category = DB::table('categories')->where('id',$postCat)->first();
  @endphp

  <div class="col-md-4 mt-2">
                    Category: <span class="badge bg-primary">{{ $category->category}}</span>
                    </div>


                    @php 
  
  $postSubCat = $post_ad->subcategory_id;
  $subCategory = DB::table('sub_categories')->where('id',$postSubCat)->first();
  @endphp

  <div class="col-md-4 mt-2">
                    Sub Category: <span class="badge bg-primary">{{ $subCategory->name}}</span>
                    </div>

                    @php 
  
  $postDiv = $post_ad->divisions_id;
  $division = DB::table('divisions')->where('id',$postDiv)->first();
  @endphp

  <div class="col-md-4 mt-2">
                    Divisions: <span class="badge bg-primary">{{ $division->divisions_name}}</span>
                    </div>

                    @php 
  
  $postDis = $post_ad->district_id;
  $district = DB::table('districts')->where('id',$postDis)->first();
  @endphp

  <div class="col-md-4 mt-2">
                    Districts: <span class="badge bg-primary">{{ $district->districts_name}}</span>
                    </div>

                    @php 
  
  $postArea = $post_ad->area_id;
  $area = DB::table('areas')->where('id',$postArea)->first();
  @endphp

                    <div class="col-md-4 mt-2">
                    Areas: <span class="badge bg-primary">{{ $area->areas_name}}</span>
                    </div>

                    
                    <div class="col-md-4 mt-2">
                    Condition: <span class="badge bg-primary">{{ $post_ad->condition_value}}</span>
                    </div>

                    <div class="col-md-4 mt-2">
                    Authenticity: <span class="badge bg-primary">{{ $post_ad->authenticity_value}}</span>
                    </div>

                    @php 
  
  $postBrand = $post_ad->brand_id;
  $brand = DB::table('brands')->where('id',$postBrand)->first();
  @endphp

                    <div class="col-md-4 mt-2">
                    Brand: <span class="badge bg-primary">{{ $brand->name}}</span>
                    </div>

                    @php 
  
  $postModel = $post_ad->model_id;
  $model = DB::table('brand_models')->where('id',$postModel)->first();
  @endphp

                    <div class="col-md-4 mt-2">
                    Model: <span class="badge bg-primary">{{ $model->model_name}}</span>
                    </div>

                    <div class="col-md-4 mt-2">
                 
                    </div>

                    <div class="col-md-12 mt-2">
                    Edition: <span class="badge bg-primary">{{ $post_ad->edition}}</span>
                    </div>

                    
                    <div class="col-md-12 mt-2">Features: 
    @php
        $features = [
            'checkbox-1' => '4G',
            'checkbox-2' => '5G',
            'checkbox-3' => 'Dual SIM',
            'checkbox-4' => 'Micro SIM',
            'checkbox-5' => 'Mini SIM',
            'checkbox-6' => 'USB Type-B Port',
            'checkbox-7' => 'USB Type-C Port',
            'checkbox-8' => 'Fast Charging',
            'checkbox-9' => 'Flash Charging',
            'checkbox-10' => 'Android',
            'checkbox-11' => 'Windows',
            'checkbox-12' => 'IOS',
            'checkbox-13' => 'Expandable Memory',
            'checkbox-14' => '4 GB RAM',
            'checkbox-15' => '6 GB RAM',
            'checkbox-16' => '8 GB RAM',
            'checkbox-17' => '12 GB RAM',
            'checkbox-18' => 'Dual Camera',
            'checkbox-19' => 'Triple Camera',
            'checkbox-20' => 'Dual LED Flash',
            'checkbox-21' => 'Quad LED Flash',
            'checkbox-22' => 'Bluetooth',
            'checkbox-23' => 'Wifi',
            'checkbox-24' => 'GPS',
            'checkbox-25' => 'Fingerprint Sensor',
            'checkbox-26' => 'Infrared Port',
        ];
    @endphp

    @foreach($features as $checkbox => $feature)
        @if($post_ad->$checkbox != 0)
           <span class="badge bg-primary">{{ $feature }}</span>
        @endif
    @endforeach
</div>

                    <div class="col-md-12 mt-2">
                    Description: <span class="badge bg-primary">{{ $post_ad->description}}</span>
                    </div>

                    <div class="col-md-6 mt-2">
                    Price: <span class="badge bg-primary">{{ $post_ad->price}} Taka</span>
                    </div>

                    <div class="col-md-6 mt-2">Negotiable: 

                    @php
        $negotiables = [
         
            'checkbox-27' => 'Negotiable',
        ];
    @endphp

    @foreach($negotiables as $checkbox => $negotiable)
        @if($post_ad->$checkbox != 0)
           <span class="badge bg-primary">{{ $negotiable }}</span>
        @endif
    @endforeach
                    </div>

                    <div class="col-md-6 mt-2">
                    Name: <span class="badge bg-primary">{{ $post_ad->name}}</span>
                    </div>

                    <div class="col-md-6 mt-2">
                    Phone: <span class="badge bg-primary">{{ $post_ad->phone}}</span>
                    </div>



                   </div>

                 


                   </div>

 
                   </div>
                   
               
                    </div>
                </div>
                </div>

            </div>
           
        </div>
        </div>
    </div>

@endsection