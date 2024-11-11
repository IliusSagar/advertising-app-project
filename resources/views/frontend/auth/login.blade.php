@extends('master.frontend')

@section('content')

<style>
    
.form-item{
  position: relative;
  margin-bottom: 15px
}
/* .form-item input{
  display: block;
  width: 400px;
  height: 40px;
  background: transparent;
  border: solid 1px #ccc;
  transition: all .3s ease;
  padding: 0 15px
} */


.form-item input:focus{
  border-color: blue;
}
 
.form-item label{
  position: absolute;
  cursor: text;
  z-index: 7;
  top: 13px;
  left: 10px;
  font-size: 13px;
  font-weight: bold;
  background: #fff;
  padding: 0 10px;
  color: #999;
  transition: all .3s ease
}

.form-item input:focus + label,
.form-item input:valid + label{
  font-size: 13px;
  top: -5px
}

.form-item input:focus + label{
  font-size: 13px;
  top: -5px
}

.form-item input:focus + label{
  color: green;
}
</style>

<section>
   <div class="card p-5">
   <div class="container mt-3">
        <div class="row">
            <center><h2 class="mb-4">login</h2></center>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-3 shadow">

                <form action="{{ route('user.login')}}" method="post">
                @csrf

                <div class="form-item ">
    <input class="form-control" type="text" name="phone"  autocomplete="off" >
    <label for="phone">Mobile Number <code>*</code></label>
    @error('phone')
    <span class="text text-danger" style="margin-right: 110px;">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-item ">
    <input class="form-control" type="password" name="password"  autocomplete="off" >
    <label for="password">Password <code>*</code></label>
    @error('password')
    <span class="text text-danger" style="margin-right: 110px;">{{ $message }}</span>
    @enderror
  </div>  
                
                
               

                <div class="form-group mb-2">
                   <button type="submit" class="btn btn-dark">Login</button>
                  &nbsp; 
                  <a href="{{ route('forgot.password')}}" class="mb-2" style="text-decoration: none; font-weight:300;">Forgot your password?</a>
             
                  <center>  <a href="{{ URL::to('/google/login')}}">
                        <img src="{{ asset('frontend/google.jpg')}}" class="img-fluid" alt="Google Sign Up" style="height: 100px;">
                    </a>
                    </center>

                </div>
                </form>

               
                <div class="form-group">
               
                   Create New Account ? <a href="{{ url('/register')}}" style="text-decoration: none;  font-weight: bold; font-size: 18px;" >Register</a>
                </div>

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
   </div>
</section>

@endsection