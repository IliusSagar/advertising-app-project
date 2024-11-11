@extends('master.frontend')

@section('content')

@php 
        $home_page = DB::table('home_pages')->first();
    @endphp

    <style>
      
    </style>
    

  <!-- Start Carousel Section -->
  <section>
        <div class="">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url($home_page->banner_one)}}" class="d-block w-100 img-fluid" alt="..." >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url($home_page->banner_two)}}" class="d-block w-100 img-fluid" alt="..." >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url($home_page->banner_three)}}" class="d-block w-100 img-fluid" alt="..." >
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End Carousel Section -->

    <!-- Start Category Section  -->
    <section >
        <div class="card  p-3 " >
            <center>
                <h2 class="mt-3">Category Wise Items</h2>
                <hr>
            </center>

            <div class="container">
                <div class="row">

                @php
    $categories = DB::table('categories')->get();
@endphp

@foreach($categories as $row)
    @php
        $postCount = DB::table('post_ads')
                        ->where('category_id', $row->id)
                        ->where('status', 1)
                        ->count('category_id');
    @endphp

    <div class="col-md-3 mt-2">
        <div class="card p-2 shadows">
            <a href="{{ route('ads.bangladesh',$row->id)}}" style="text-decoration: none;">
                <div class="d-flex justify-content-start">
                    <img src="{{ URL::to($row->image)}}" class="img-fluid" alt="" style="height: 70px; width: 70px;">
                    <div class="d-flex align-items-center" style="margin-left: 10px;">
                        <h6>{{ $row->category }} 
                            <br>
                            <span style="font-size: 12px; color: gray;">
                                {{ $postCount }} ads
                            </span>
                        </h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach

                  
                   
                   
                  
                 
                
                  


                </div>
            </div>

        </div>

    </section>
    <!-- End Category Section  -->

    <!-- Start FAQS Section  -->
    <section>
        <div class="card p-4 ">

            <div class="container">

                @php 
                    $home_page = DB::table('home_pages')->where('id', 2)->first();
                @endphp
               
                <div class="col-md-12">
                    {!! $home_page->under_content !!}
                </div>


            </div>
        </div>
    </section>
    <!-- End FAQS Section  -->

@endsection