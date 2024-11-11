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
              <span>Edit Carousel Banner</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.home.page.carousel.banner',$home_page->id)}}" method="post" enctype="multipart/form-data">
              @csrf

                <div class="card-body">

                
                 
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Banner One <code>(Dimensions 2240px x 600px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="banner_one" class="custom-file-input" id="logo" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Banner One</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview" src="{{ URL::to($home_page->banner_one) }}" alt="Carousel Banner One" style="max-width: 120px;" required>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Banner Two <code>(Dimensions 2240px x 600px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="banner_two" class="custom-file-input" id="logo-two" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Banner Two</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview-two" src="{{ URL::to($home_page->banner_two) }}" alt="Carousel Banner Two" style="max-width: 120px;" required>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Banner Three <code>(Dimensions 2240px x 600px)</code></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="banner_three" class="custom-file-input" id="logo-three" accept="image/*" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile">Choose Banner three</label>

                        

                      </div>

                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <img id="logo-preview-three" src="{{ URL::to($home_page->banner_three) }}" alt="Carousel Banner Three" style="max-width: 120px;" required>

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
             preview.src = '{{ URL::to($home_page->banner_one) }}';
         }
     });
</script>

<script type="text/javascript">
  document.getElementById('logo-two').addEventListener('change', function (event) {
         const preview = document.getElementById('logo-preview-two');
         const file = event.target.files[0];

         if (file) {
             preview.src = URL.createObjectURL(file);
         } else {
             preview.src = '{{ URL::to($home_page->banner_two) }}';
         }
     });
</script>

<script type="text/javascript">
  document.getElementById('logo-three').addEventListener('change', function (event) {
         const preview = document.getElementById('logo-preview-three');
         const file = event.target.files[0];

         if (file) {
             preview.src = URL.createObjectURL(file);
         } else {
             preview.src = '{{ URL::to($home_page->banner_three) }}';
         }
     });
</script>


@endsection