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
              <span>Edit Company Information</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.home.page.company.information',$home_page->id)}}" method="post" >
              @csrf

                <div class="card-body">

                
                 
                <div class="form-group">
                <label class="custom-label">Company Name <code>*</code></label>
                <input type="text" name="company_name" class="form-control"  value="{{ $home_page->company_name}}">
                @error('company_name')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label class="custom-label">Company Address <code>*</code></label>
                <input type="text" name="company_address" class="form-control"  value="{{ $home_page->company_address}}">
                @error('company_address')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label class="custom-label">Business Email <code>*</code></label>
                <input type="email" name="email" class="form-control" value="{{ $home_page->email}}" >
                @error('email')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>
                 
                <div class="form-group">
                <label class="custom-label">Phone <code>*</code></label>
                <input type="text" name="phone" class="form-control"  value="{{ $home_page->phone}}">
                @error('phone')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                <label class="custom-label">Hotline <code>*</code></label>
                <input type="text" name="hotline" class="form-control" value="{{ $home_page->hotline}}" >
                @error('hotline')
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