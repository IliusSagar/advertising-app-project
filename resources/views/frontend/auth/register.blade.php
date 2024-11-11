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
            <center><h2 class="mb-4">Register</h2></center>
            <div class="col-md-4"></div>

            
            <div class="col-md-4">
                <div class="card p-3 shadow">

                <form action="{{ route('user.register')}}" method="post">
                    @csrf

                    
                    <div class="form-item ">
    <input class="form-control" type="text" name="phone"  autocomplete="off" >
    <label for="phone">Phone <code>*</code></label>
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

  <div class="form-item ">
    <input class="form-control" type="password" name="confirmed_password"  autocomplete="off" >
    <label for="confirmed_password">Confirm Password <code>*</code></label>
    @error('confirmed_password')
    <span class="text text-danger" style="margin-right: 110px;">{{ $message }}</span>
    @enderror
  </div>
                
                
               

                <div class="form-group mb-3">
                  By check Register, you agree on our <a href="" class="mb-2">Privacy Policy</a>
                </div>

                <div class="form-group mb-2">
                   <button type="submit" class="btn btn-dark">Register</button>
            
                   <center>  <a href="{{ URL::to('/google/login')}}">
                        <img src="{{ asset('frontend/google.jpg')}}" class="img-fluid" alt="Google Sign Up" style="height: 100px;">
                    </a>
                    </center>

                </div>
                </form>
                <div class="form-group">
               
                   Have an Account ? <a href="{{ url('/login')}}" style="text-decoration: none;  font-weight: bold; font-size: 18px;" >Login</a>
                </div>

                </div>
            </div>
           


            <div class="col-md-4"></div>
        </div>
    </div>
   </div>
</section>

@endsection