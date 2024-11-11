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
              <span>Edit App Link</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.home.page.app.link',$home_page->id)}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="card-body">
<h4 class="text-center">Android</h4>
<hr>
                <div class="form-group">
                <label class="custom-label">Android App Link <code>(optional)</code></label>
                <input type="text" name="android_app_link" class="form-control"  value="{{ $home_page->android_app_link}}">
                @error('android_app_link')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>
                 
                  
                

                  <div class="form-group">
                    <label for="exampleInputFile">Android App Image <code>(Dimensions 382px x 132px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="android_app_image" class="custom-file-input" id="logo-two" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Android App Image</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview-two" src="{{ URL::to($home_page->android_app_image) }}" alt="Android App Image" style="max-width: 120px;" required>

                  </div>

                  <h4 class="text-center">IOS</h4>
<hr>
                <div class="form-group">
                <label class="custom-label">IOS App Link <code>(optional)</code></label>
                <input type="text" name="ios_app_link" class="form-control"  value="{{ $home_page->ios_app_link}}">
                @error('ios_app_link')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>
                 
                  
                 

                  <div class="form-group">
                    <label for="exampleInputFile">IOS App Image <code>(Dimensions 382px x 132px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="ios_app_image" class="custom-file-input" id="logo-four" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose IOS App Image</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview-four" src="{{ URL::to($home_page->ios_app_image) }}" alt="IOS App Image" style="max-width: 120px;" required>

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
  document.getElementById('logo-two').addEventListener('change', function (event) {
         const preview = document.getElementById('logo-preview-two');
         const file = event.target.files[0];

         if (file) {
             preview.src = URL.createObjectURL(file);
         } else {
             preview.src = '{{ URL::to($home_page->android_app_image) }}';
         }
     });
</script>


<script type="text/javascript">
  document.getElementById('logo-four').addEventListener('change', function (event) {
         const preview = document.getElementById('logo-preview-four');
         const file = event.target.files[0];

         if (file) {
             preview.src = URL.createObjectURL(file);
         } else {
             preview.src = '{{ URL::to($home_page->ios_app_image) }}';
         }
     });
</script>


@endsection