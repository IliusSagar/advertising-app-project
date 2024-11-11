@extends('master.frontend')

@section('content')




    <div class="container">
    <div class="card p-5 shadow mt-4">

    @php 
                  $user = Auth::user();
                @endphp
        
        <div class="row">

        <div class="col-md-12">
            <center><h5>Welcome : {{$user->name}} {{$user->phone}}! Let's Post an ad</h5></center>
        </div>


            <div class="col-md-4"></div>
            <div class="col-md-4 mt-4">
           
            <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('post.ad.details')}}" style="text-decoration: none; font-weight: bold; color: black; font-size: 24px;"><i class="fa fa-money-bill"></i> Sell Something</a></li>
                    
</ul>
           
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@endsection