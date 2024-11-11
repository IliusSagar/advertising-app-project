@extends('master.backend')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Edit Home Page</span></h1>
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->


          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
           <span>Home Page Setup Menu</span>
              </div>
        
            

                <div class="">
                 
                  
                  
                      
           @include('backend.layouts.home_page_list')


                    
                  
                  
                </div>
          

            </div>
   

         
       
          

          </div>


          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
              <span>Edit Favicon</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.home.page.favicon',$home_page->id)}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="card-body">

                <div class="form-group">
                <label class="custom-label">Title <code>*</code></label>
                <input type="text" name="title" class="form-control"  value="{{ $home_page->title}}">
                @error('title')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>
                 
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Favicon <code>(Dimensions 1024px x 1024px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="favicon" class="custom-file-input" id="logo" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Favicon</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview" src="{{ URL::to($home_page->favicon) }}" alt="Favicon" style="max-width: 120px;" required>

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
             preview.src = '{{ URL::to($home_page->favicon) }}';
         }
     });
</script>


@endsection