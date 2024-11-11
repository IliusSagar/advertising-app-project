@extends('master.backend')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">List Membership Data</span></h1>
            
          </div>

          <div class="col-sm-6 d-flex justify-content-end">
         
       
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
                    <th>User Name</th>
                    <th>User Mobile</th>
                    <th>Ranking</th>
                    <th >Status</th>
                    <th >Update Status</th>
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                    @foreach($membership as $key=>$row)
                    <tr>
  
                    <td>{{ $key+1}}</td>


                    @php 
                      $userId = $row->user_id;
                      $userData = DB::table('users')->where('id',$userId)->first();
                    @endphp

                    <td>{{ $userData->name }}</td>
                    <td>{{ $userData->phone }}</td>

                    <td>{{ $row->ranking }}</td>
         

                    
               
                        @if($row->status == 0)
                        <td class="text-warning"><b>Membership Pending</b></td>
                        @else
                        <td class="text-success"><b>Membership Approved</b></td>
                        @endif
   
                    <td>

                        <form action="{{ route('update.status.member', $row->id) }}" method="post">
                            @csrf
                            @if($row->status == 1)
                                <button type="submit" class="btn btn-warning">Pending</button>
                            @else
                                <button type="submit" class="btn btn-success">Approved</button>
                            @endif
                        </form>


                        

                    </td>
                    
                    <td>
                        <a href="{{ route('delete.membership',$row->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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