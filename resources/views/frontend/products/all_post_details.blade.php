@extends('master.frontend')

@section('content')


<div class="container">

    <div class="card p-4 m-4">
        <div class="row">

        @php 
        $brandID = $postDetails->brand_id;
        $modelID = $postDetails->model_id;
        $brandName = DB::table('brands')->where('id',$brandID)->first();
        $modelName = DB::table('brand_models')->where('id',$modelID)->first();
        @endphp
           
            <div class="col-md-7">

            <div class="card p-3">
            <img src="{{ asset($postDetails->img_one)}}" alt="img" style="height: 350px;">

            <h5 class="text-success font-weight: bold;">Tk {{$postDetails->price}}</h5>
            <br>
            <p>Condition: <span style="font-weight: bold;">{{$postDetails->condition_value}}</span><br>
            Brand: <span style="font-weight: bold;">{{$brandName->name}}</span><br>
            Model: <span style="font-weight: bold;">{{$modelName->model_name}}</span><br>
            Edition: <span style="font-weight: bold;">{{$postDetails->edition}}</span><br>
            Authenticity: <span style="font-weight: bold;">{{$postDetails->edition}}</span></p>
            <p style=""><span style="font-weight: bold;">Description: </span><br>
            <span style="">{{$postDetails->description}}</span>
            </div>


        </p>
           

            </div>
            <div class="col-md-4" >

                <div class="card p-3">
                <p>For sale by </p>
                <hr>
                <p><i class="fa fa-phone"></i> <span style="font-weight: bold;">01830596312</span></p>
                </div>


            </div>
        </div>
    </div>


    <div class="card p-3 mb-4">

    <div class="row">
        
            <p><b>Similar Ad</b></p>
            

            @php 
            $brandID = $postDetails->brand_id;
        $post_add = DB::table('post_ads')->where('brand_id',$brandID)->get();
       
        @endphp

            @foreach($post_add as $row)
            <div class="col-md-6">
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
                </div>
                @endforeach
           
           

        </div>

    </div>


</div>


@endsection