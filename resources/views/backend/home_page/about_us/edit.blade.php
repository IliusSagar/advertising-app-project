@extends('master.backend')

@section('content'){{ asset('backend/')}}

<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>

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
              <span>Edit About Us</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="{{ route('update.home.page.about.us',$home_page->id)}}" method="post" >
              @csrf

                <div class="card-body">

                
                 
                <div class="form-group">
                {{-- <label class="custom-label">Home Page Under Content <code>*</code></label>
                <input type="text" id="summernote'" name="under_content" class="form-control"  value="{{ $home_page->under_content}}">
                @error('under_content')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror --}}

                <textarea id="summernote" name="about_us" >
                    {!! $home_page->about_us !!}
                  </textarea>
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

  <script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>


@endsection