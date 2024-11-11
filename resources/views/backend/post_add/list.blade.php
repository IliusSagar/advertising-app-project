@extends('master.backend')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">List Ad Post</span></h1>
          </div>

          
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Sl</th>
                    <th>Status</th>
                    <th>Membership No</th>
                    <th>User Name</th>
                    <th>User Contact</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th >Update Status</th>
                    <th>View Details</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($p_add as $key=>$row)
                  <tr>

                  <td>{{ $key+1}}</td>

                  @if($row->status == 0)
                    <td class="badge bg-warning text-white m-2">Admin Pending</td>
                    @else
                    <td class="badge bg-success text-white m-2">Admin Approved</td>
                    @endif

                    @php 
                    $userId = $row->user_id;
                    $user = DB::table('users')->first();
                    @endphp

                    <td><span class="badge bg-danger text-white m-2">no membership</span></td>
                    <td>{{ $user->name ?? 'N/A'}}</td>
                    <td>{{ $user->phone ?? 'N/A'}}</td>
                   
                    <td>
                        <img src="{{ URL::to($row->img_one)}}" class="img-fluid" alt="Logo" loading="lazy" alt="logo" style="height: 50px;">
                    </td>
                 
              
                    @php 
  
  $postCat = $row->category_id;
  $category = DB::table('categories')->where('id',$postCat)->first();
  @endphp

      <td>{{$category->category}}</td>
                
      <td>
                <form action="{{ route('update.status', $row->id) }}" method="post">
                    @csrf
                    @if($row->status == 1)
                        <button type="submit" class="btn btn-danger">Decline</button>
                    @else
                        <button type="submit" class="btn btn-success">Approved</button>
                    @endif
                </form>
            </td>
            <td>
              <a href="{{ route('view.ad.post', $row->id) }}" class="btn btn-primary">View</a>
            </td>
                  </tr>
                  @endforeach
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    $(document).on("click","#delete", function(e){
     e.preventDefault();
     var link = $(this).attr("href");
     swal({
       title: "Are you want to delete?",
       text: "Once Delete, This will be Permanently Delete!",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if(willDelete){
         window.location.href = link;
       }else{
         swal("Safe Data!");
       }
     });
    });
   </script>



  
@endsection