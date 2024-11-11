@extends('master.frontend')

@section('content')

<div class="card p-3 shadow ">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                @php 
                  $user = Auth::user();
                @endphp

                <div class="card p-3 shadow">
                

                <div class="row">

                <div class="col-md-4">
               <h4>Account</h4><hr style="width: 100%;" >
                </div>
                <div class="col-md-8">
               <h4>Profile Setting</h4> <hr style="width: 100%;" >
                </div>

                
                    <div class="col-md-4">
                        
                    @include('frontend.layouts.list')
                    </div>

                    <div class="col-md-8">
                   
                   <div class="card p-3">
                 
                    <form action="{{ route('update.profile',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="form-group mt-2">
                        <label for="">Name: </label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name}}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="">Phone: </label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone}}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="">Email: </label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email}}">
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Update Profile</button>

                    </form>
               
                    </div>

                </div>
                </div>

            </div>
           
        </div>


        
        </div>
    </div>

@endsection