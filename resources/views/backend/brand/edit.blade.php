@extends('master.backend')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Edit Brand</span></h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Logo</h3> -->
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.brand',$brand->id)}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="card-body">

                     
                <div class="form-group">
                    <label for="exampleInputFile">Image Brand <code>(Dimensions 512px X 512px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="logo" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image Brand</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div>
                  <img id="logo-preview" src="{{ URL::to($brand->image) }}" alt="Category Image" style="max-width: 200px;" required>
                  </div>


                <div class="form-group">
                <label class="custom-label">Brand Name <code>*</code></label>
                <input type="text" name="name" class="form-control" id="textString" value="{{ $brand->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

           
                 
             
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         
       
          

          </div>

   
          <!-- right column -->
      
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  document.getElementById('logo').addEventListener('change', function (event) {
         const preview = document.getElementById('logo-preview');
         const file = event.target.files[0];

         if (file) {
             preview.src = URL.createObjectURL(file);
         } else {
             preview.src = '{{ URL::to($brand->image) }}';
         }
     });
</script>



@endsection