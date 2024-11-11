<section>
    <div class="">
        <div class="">

            <nav class="navbar navbar-expand-lg " style="background: #232f3e;">
           

                <div class="container-fluid">
                   
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">

    @if($user)
      <a class="nav-link active text-white fw-bold" aria-current="page" href="">Mobile Verify</a>
    @else 
    <a class="nav-link active text-white fw-bold" aria-current="page" href="{{ route('login')}}">Mobile Verify</a>
    @endif


    </li>

    <li class="nav-item">
    @if($user)
      <a class="nav-link active text-white fw-bold" aria-current="page" href="">Profile Verify</a>
      @else 
    <a class="nav-link active text-white fw-bold" aria-current="page" href="{{ route('login')}}">Profile Verify</a>
    @endif
    </li>

    <li class="nav-item">
    @if($user)
      <a class="nav-link active text-white fw-bold" aria-current="page" href="">Account Transfer</a>
      @else 
    <a class="nav-link active text-white fw-bold" aria-current="page" href="{{ route('login')}}">Account Verify</a>
    @endif
    </li>

   

    <li class="nav-item">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
  <form class="d-flex align-items-center" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="background: white;">
    <button class="btn btn-outline-warning"  type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
    </li>
   
   
  </ul>



                       

                </div>
            </nav>
        </div>
    </div>
</section>