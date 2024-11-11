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
               
                <div class="col-md-12">
                 <h3>About BikriPlus, The Largest Marketplace in Bangladesh!</h3>
                 <p>BikriPlus is a platform on which you can buy and sell almost everything! We help people buy and sell vehicles, find properties, get jobs or recruit employees, buy and sell mobile phones, purchase electronic products, and much more. With more than 50 categories our solutions are built to be safe, smart, and convenient for our customers.</p>
                 <h3>Buy, Sell, Rent, or Find Jobs in Bangladesh</h3>
                 <p>Every month, hundreds of millions of people use BikriPlus to find and sell mobiles, musical instruments, cars, houses, jobs, and more through classified ads. To sell new items or sell used items quickly, BikriPlus offers Boost Ad features. </p>
                 <p>BikriPlus has an extensive collection of new and used goods, making it easier for users to quickly buy new items or buy used items at their desired location. To buy online, users easily can reach their desired products through filtering options.</p>
                 <p>For businesses, BikriPlus has introduced the ‘Membership’ service, which helps them expand their businesses online. Members will have their virtual shop with a BikriPlus URL with free promotions of their goods. With different membership categories, businesses can flourish as verified members and authorized dealers.</p>
                 <p>With millions of unique monthly visitors, thousands of interested buyers, and thousands of active dealers on our platform, BikriPlus is the Largest Marketplace in Bangladesh.</p>
                 <h3>Benefits of Trading at BikriPlus</h3>
                 <p>At BikriPlus, we make it so easy to connect people to buy, sell or rent goods and services as other classified sites.</p>
                 <li>Fast & Easy Experience: Navigated buying and selling experience in Bangladesh which is simpler, faster, and easier. Shop and sell on the go and get your desired products in just a few clicks.</li>
                 <li>Post Ads Free: As a free classified website, we offer free ad posting features in many categories for the convenience of the users based on their locations.</li>
                 <li>Safe & Secure Shopping: We have listed our verified members and authorized dealers to create a safe shopping experience for our users.</li>
                 <p>Looking for the right buyer in {country}? Post an ad to sell or rent anything faster on {market}.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQS Section  -->

@endsection