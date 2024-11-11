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
              <span>Edit Social Media</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.home.page.social.media',$home_page->id)}}" method="post" >
              @csrf

                <div class="card-body">

                
                 
                <div class="form-group">
                <label class="custom-label">Facebook Link <code>*</code></label>
                <input type="text" name="facebook" class="form-control"  value="{{ $home_page->facebook}}">
                @error('facebook')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label class="custom-label">Instagram Link <code>*</code></label>
                <input type="text" name="instagram" class="form-control"  value="{{ $home_page->instagram}}">
                @error('instagram')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label class="custom-label">Youtube Link <code>*</code></label>
                <input type="text" name="youtube" class="form-control" value="{{ $home_page->youtube}}" >
                @error('youtube')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>
                 
                <div class="form-group">
                <label class="custom-label">Linkedin Link <code>*</code></label>
                <input type="text" name="linkedin" class="form-control"  value="{{ $home_page->linkedin}}">
                @error('linkedin')
                    <div class="alert text-danger">{{ $message }}</div>
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

 


@endsection