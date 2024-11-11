@extends('master.backend')

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <h1><span class="text-danger" style="border-bottom: 1px dotted red;">List Brand</span></h1>
            
          </div>

          <div class="col-sm-6 d-flex justify-content-end">
         
          <a href="{{route('add.brand')}}" class="btn btn-danger"> + Add Brand</a>
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th >Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($brand as $key=>$row)
                  <tr>

                  <td>{{ $key+1}}</td>
                   
                    <td>
                        <img src="{{ URL::to($row->image)}}" class="img-fluid" alt="Logo" loading="lazy" alt="logo" style="height: 50px;">
                    </td>
                    <td>{{ $row->name}}</td>
                    <td>{{ $row->slug}}</td>
                    <td >
                    @php 
                      $all_edit = Auth::guard('admin')->user()->all_edit;
                      $all_delete = Auth::guard('admin')->user()->all_delete;
                    @endphp
                    @if ($all_edit == Null)
                    <a  class="btn btn-info"><i class="fa fa-lock"></i></a>
                    @else
                        <a href="{{ route('edit.brand',$row->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        @endif
                        @if ($all_delete == Null)
                        <a  class="btn btn-danger"><i class="fa fa-lock"></i></a>
                        @else
                        <a href="{{ route('delete.brand',$row->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                        @endif
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