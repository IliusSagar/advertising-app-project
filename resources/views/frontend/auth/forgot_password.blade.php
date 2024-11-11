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
            <center><h2 class="mb-4">Forgot Password</h2></center>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-3 shadow">

                <form action="{{ route('update.otp')}}" method="post">
                @csrf

                <div class="form-item ">
    <input class="form-control" type="text" name="phone"  autocomplete="off" >
    <label for="phone">Mobile Number <code>*</code></label>
    @error('phone')
    <span class="text text-danger" style="margin-right: 110px;">{{ $message }}</span>
    @enderror
  </div>

               
               
               

                <div class="form-group mb-2">
                   <button type="submit" class="btn btn-dark">Send OTP</button>
                 
                </div>
                </form>
                

                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
   </div>
</section>

@endsection