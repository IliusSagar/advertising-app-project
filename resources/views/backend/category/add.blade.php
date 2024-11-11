@extends('master.backend')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Add Category</span></h1>
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
              <form action="{{ route('store.category')}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputFile">Image Flaticon <code>(Dimensions 512px X 512px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="logo" onchange="getImagePreview(event)" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image Flaticon</label>

               

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div id="preview"></div>

                <div class="form-group">
                <label class="custom-label">Category Name <code>*</code></label>
                <input type="text" name="category" class="form-control" >
           
                <span style="color: red;">
                        @error('category')
                            {{$message}}
                        @enderror
                    </span>
                </div>

               
                 
                  
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
  function getImagePreview(event)
{
  var image=URL.createObjectURL(event.target.files[0]);
  var imagediv= document.getElementById('preview');
  var newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="150";
  newimg.height="120";
  imagediv.appendChild(newimg);
}
</script>


@endsection