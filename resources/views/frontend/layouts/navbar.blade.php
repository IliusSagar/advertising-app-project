<style>
    .bg-dark {
        background: black!important;
    }
</style>

<section>
        <div class="">
            <div class="">

                <nav class="navbar bg-dark navbar-expand-lg " data-bs-theme="dark">
               

                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/')}}">
                            @php 
                              $home_page = DB::table('home_pages')->first();
                            @endphp
                            
                            <img src="{{ url($home_page->header_logo)}}" class="img-fluid" alt="" style="height: 40px; width: 140px;">
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=""><b><i class="fas fa-map-marker"></i> (Location) To <br> Bangladesh</b></a>
                                </li>

                               



                            </ul>

               


    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <form class="d-flex align-items-center" role="search">
        <input class="form-control me-2" type="search" placeholder="Search All Sellar" aria-label="Search" style="width: 600px; background: white;">
        <button class="btn btn-outline-warning"  type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
                          
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                               

                                <li class="nav-item dropdown me-4">
                                    <select name="" id="" class="form-control dropdown-toggle">
                                        <option value="en">EN</option>
                                        <option value="bn">BN</option>
                                    </select>
                                </li>

                                <li class="nav-item me-4">
                                    <a class="nav-link active" aria-current="page" href=""><b><i class="fas fa-comments"></i> Chat</b></a>
                                </li>

                                @php 
                  $user = Auth::user();
                @endphp

                            @if($user)
                                <li class="nav-item me-4">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/user/dashboard')}}"><b><i class="fas fa-user"></i> Account</b></a>
                                </li>
                            @else
                            <li class="nav-item me-4">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/login')}}"><b><i class="fas fa-user"></i> Login</b></a>
                                </li>
                            @endif

                            </ul>

                         
                           

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

  @include('frontend.layouts.verify')