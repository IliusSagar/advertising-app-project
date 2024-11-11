@extends('master.frontend')

@section('content')

@php 
        $home_page = DB::table('home_pages')->first();
    @endphp


  

    


    <section>
        <div class="card p-4 ">

            <div class="container">

                <center><h1>Contact Us</h1></center>

              <div>
                {!! $home_page->contact_us !!}
              </div>


            </div>
        </div>
    </section>


@endsection