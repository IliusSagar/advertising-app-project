@extends('master.frontend')

@section('content')

@php 
        $home_page = DB::table('home_pages')->first();
    @endphp


  

    


    <section>
        <div class="card p-4 ">

            <div class="container">

                <center><h1>Privacy Policy</h1></center>

              <div>
                {!! $home_page->privacy_policy !!}
              </div>


            </div>
        </div>
    </section>


@endsection