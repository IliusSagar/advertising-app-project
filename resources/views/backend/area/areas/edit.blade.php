@extends('master.backend')

@section('content')

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<style>
    /* Fix the height of the select2 container */
.select2-container .select2-selection--single {
  height: 38px; /* Match the height of default input boxes */
  border: 1px solid #ced4da; /* Border style to match input box */
  padding: 6px 12px; /* Padding adjustment */
}

/* Center the text vertically */
.select2-container .select2-selection__rendered {
  line-height: 24px; /* Adjust based on padding */
}
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
            <h1><span class="text-success" style="border-bottom: 1px dotted green;">Edit Areas</span></h1>
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
              <form action="{{ route('update.areas',$area->id)}}" method="post" >
              @csrf

                <div class="card-body">

                <div class="form-group">
                <label class="custom-label">Districts Name <code>(Select Districts)</code></label>


                     <select  class="form-control  select2" name="districts_id" >
                    
                    <option disabled selected> Select Districts </option>

                        @foreach ($district as $row)
                                    <option value="{{ $row->id }}" <?php if ($row->id == $area->districts_id ) {
                                        echo "selected"; } ?> >{{ $row->districts_name }}</option>
                                @endforeach
                        
                         </select>

                     <span style="color: red;">
                        @error('districts_id')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                <label class="custom-label">Areas Name <code>*</code></label>
                <input type="text" name="areas_name" class="form-control" value="{{ $area->areas_name}}">
           
                <span style="color: red;">
                        @error('areas_name')
                            {{$message}}
                        @enderror
                    </span>
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
  $(document).ready(function() {
    $('.select2').select2();  
  });
</script>


@endsection