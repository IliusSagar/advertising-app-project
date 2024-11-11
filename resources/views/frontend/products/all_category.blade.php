@extends('master.frontend')

@section('content')


<div class="container">
    <div class="card p-4 m-4">
        <div class="row">
            <div class="col-md-3" >
                <div>
                    
                    <span><b>All Category</b></span><br>

                    @php 
  // Fetch all divisions and their related post counts in a single query
  $allCategory = DB::table('categories')
                  ->leftJoin('post_ads', 'categories.id', '=', 'post_ads.category_id')
                  ->select('categories.id', 'categories.category', DB::raw('COUNT(post_ads.id) as post_count'))
                  ->groupBy('categories.id', 'categories.category')
                  ->get();
@endphp

@foreach($allCategory as $category)
  <a href="{{ route('all.category',$category->id)}}"><span>{{ $category->category }}</span></a> ({{ $category->post_count }})<br>
@endforeach

                </div>

                <div class="mt-5">
                 
                    <span><b>All of Bangladesh</b></span><br>

                    @php 
  // Fetch all divisions and their related post counts in a single query
  $allDivisions = DB::table('divisions')
                  ->leftJoin('post_ads', 'divisions.id', '=', 'post_ads.divisions_id')
                  ->select('divisions.id', 'divisions.divisions_name', DB::raw('COUNT(post_ads.id) as post_count'))
                  ->groupBy('divisions.id', 'divisions.divisions_name')
                  ->get();
@endphp

@foreach($allDivisions as $division)
  <a href="{{ route('all.division',$division->id)}}"><span>{{ $division->divisions_name }}</span></a> ({{ $division->post_count }})<br>
@endforeach

                </div>

            </div>
            <div class="col-md-7">


                {{-- start membership data  --}}
                @foreach($member_post_add as $row)
                <a href="{{ route('post.add.details',$row->id)}}" style="text-decoration: none;">
                    <div style="border: 1px solid orange; padding: 15px;" class="mb-2 card p-3 shadow">
                        <div class="d-flex">
                            <div><img src="{{ asset($row->img_one)}}" alt="img" style="height: 150px;"></div>
                        <div style=" margin-left: 15px;">    
                            @php 
                                $modelId = $row->model_id;
                                $model = DB::table('brand_models')->where('id',$modelId)->first();
    
                                $divisionId = $row->divisions_id;
                                $division = DB::table('divisions')->where('id',$divisionId)->first();
    
                                $categoryId = $row->category_id;
                                $category = DB::table('categories')->where('id',$categoryId)->first();
                            @endphp
    
                            <h3>{{$model->model_name}} ({{$row->condition_value}})</h3>
                            <p>{{$division->divisions_name}}, {{$category->category}}</p>
                            <h5 class="text-success">Tk {{$row->price}}</h5>
                        </div>
    
                        </div>
    
                        <div class="d-flex justify-content-end">
                        <p class="badge bg-danger">membership</p>
    
                        </div>
                    </div>
                    </a>
                    @endforeach

                {{-- end membership data  --}}

               

            @foreach($post_add as $row)
            <a href="{{ route('post.add.details',$row->id)}}" style="text-decoration: none;">
                <div style="border: 1px solid orange; padding: 15px;" class="mb-2 card p-3 shadow">
                    <div class="d-flex">
                        <div><img src="{{ asset($row->img_one)}}" alt="img" style="height: 150px;"></div>
                    <div style=" margin-left: 15px;">    
                        @php 
                            $modelId = $row->model_id;
                            $model = DB::table('brand_models')->where('id',$modelId)->first();

                            $divisionId = $row->divisions_id;
                            $division = DB::table('divisions')->where('id',$divisionId)->first();

                            $categoryId = $row->category_id;
                            $category = DB::table('categories')->where('id',$categoryId)->first();
                        @endphp

                        <h3>{{$model->model_name}} ({{$row->condition_value}})</h3>
                        <p>{{$division->divisions_name}}, {{$category->category}}</p>
                        <h5 class="text-success">Tk {{$row->price}}</h5>
                    </div>

                    </div>

                    <div class="d-flex justify-content-end">
                    <p>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</p>

                    </div>
                </div>
                </a>
                @endforeach

            </div>
            <div class="col-md-2" ></div>
        </div>
    </div>
</div>


@endsection