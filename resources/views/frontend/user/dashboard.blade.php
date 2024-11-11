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
               <h4>Welcome : {{$user->name}} {{$user->phone}}</h4> <hr style="width: 100%;" >
                </div>

                
                    <div class="col-md-4">
                        
                    @include('frontend.layouts.list')
                    </div>
                    <div class="col-md-8">
                   
                   <div class="card p-3">
                   <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                            <center>
                                <p>Click the Post an ad now! button to post your ad.</p>
                                <a href="{{ route('post.ad')}}" class="btn btn-warning" style="color: #673500;">Post Your Ad Now!</a></center>
                        </div>
                   </div>
                   
               
                    </div>
                </div>
                </div>

            </div>
           
        </div>


        <div class="row">
            <div class="col-md-12">
                @php 
                  $user = Auth::user();
                @endphp

                <div class="card p-3 shadow">
                

                <div class="row">

               
                <div class="col-md-12">
               <h4>Post Ad List <hr style="width: 100%;" >
                </div>

                
                   
                    <div class="col-md-12">
                   
                   <div class="card p-3">
                   <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>

  @php 
  $user_id = Auth::user()->id;
  $post_ad = DB::table('post_ads')->where('user_id', $user_id)->get();
  @endphp

  @foreach($post_ad as $key=>$row)
    <tr>
      <th scope="row">{{$key+1}}</th>
      @if($row->status == 0)
      <td class="badge bg-warning text-white m-2">Admin Pending</td>
      @else
      <td class="badge bg-success text-white m-2">Admin Approved</td>
      @endif
      <td>
        <img src="{{ asset($row->img_one)}}" alt="" style="height: 40px;">
      </td>

      @php 
  
  $postCat = $row->category_id;
  $category = DB::table('categories')->where('id',$postCat)->first();
  @endphp

      <td>{{$category->category}}</td>
      <td>
        <a href="{{ route('user.post.ad.view',$row->id)}}" class="btn btn-success">View</a>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
                   </div>
                   
               
                    </div>
                </div>
                </div>

            </div>
           
        </div>

        </div>
    </div>

@endsection