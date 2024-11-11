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
                   $category = DB::table('categories')->get();
                @endphp

                    @foreach($category as $row)
                    <div class="col-md-3 mt-2">
                        <div class="card p-2 shadows">
                            <div class="d-flex justify-content-start">
                                <img src="{{ URL::to($row->image)}}" class="img-fluid" alt="" style="height: 70px; width: 70px;">
                                <div class="d-flex align-items-center" style="margin-left: 10px;">
                                    <h6>{{ $row->category}} <br><span style="font-size: 12px; color: gray;">53,326 ads</span></h6>

                                </div>
                            </div>
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
        <div class="card p-4 mt-2">

            <div class="container">
                <center>
                    <h2 class="mt-3">Questions & Answer</h2>
                    <hr>
                </center>
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and
                                    hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                                    our default variables. It's also worth noting that just about any HTML can go within
                                    the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQS Section  -->

@endsection