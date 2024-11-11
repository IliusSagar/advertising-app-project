@extends('master.frontend')

@section('content')

<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }

           
.select2-container .select2-selection--single {
  height: 38px; 
  border: 1px solid #ced4da; 
  padding: 6px 12px; 
}


.select2-container .select2-selection__rendered {
  line-height: 24px; 
}
    </style>


<div class="card p-3 shadow ">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                @php 
                  $user = Auth::user();
                @endphp


                <center>
                    <h2 class="mt-4"><span style="color: green; font-size: 28px;">Post Your Ad</span></h2> 
                    <hr>

                    <!-- <a href="{{ route('user.logout')}}" class="btn btn-danger">Logout</a> -->
                </center>

                <div class="row">
                    <div class="col-md-4">
                    @include('frontend.layouts.list')
                    </div>
                    <div class="col-md-8">

                    <div class="card p-3 shadow">
            <form id="multiStepForm">
                <!-- Step 1 -->
                <div class="step active">
                    
                <div class="form-group mt-2 mb-2">
        <label for="category_id" class="mb-2">Category</label>

        @php 
          $category = DB::table('categories')->get();
        @endphp 

        <select name="category_id" id="category_id" class="form-control">
            <option selected disabled>Selected Category</option>
            @foreach($category as $row)
                <option value="{{ $row->id }}">{{ $row->category }}</option>
            @endforeach
        </select>
    </div>

                   

                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep()">Next</button>
                </div>

                <!-- Step 2 -->
                <div class="step">
                    
                <div class="form-group mt-2 mb-2">
        <label for="divisions_id" class="mb-2">Divisions</label>
        <br>

        @php 
          $division = DB::table('divisions')->get();
        @endphp 

        <select name="divisions_id" id="divisions_id" class="form-control" style="width: 700px;">
            <option selected disabled>Selected Divisions</option>
            @foreach($division as $row)
                <option value="{{ $row->id }}">{{ $row->divisions_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-2 mb-2">
        <label for="district_id" class="mb-2">District</label>
        <select name="district_id" id="district_id" class="form-control">
            <option selected disabled>Select District</option>
        </select>
    </div>

    <div class="form-group mt-2 mb-2">
        <label for="area_id" class="mb-2">Area</label>
        <select name="area_id" id="area_id" class="form-control">
            <option selected disabled>Select Area</option>
        </select>
    </div>
              

                    <button type="button" class="btn btn-secondary mt-3" onclick="prevStep()">Previous</button>
                    <button type="button" class="btn btn-primary mt-3" onclick="nextStep()">Next</button>
                </div>

                <!-- Step 3 -->
                <div class="step">



                    <div class="form-group mt-2 mb-2">
                        <label for="confirm">Confirm Details</label>
                        <input type="text" id="confirm" class="form-control" placeholder="Confirm details" disabled>
                    </div>

                    <button type="button" class="btn btn-secondary mt-3" onclick="prevStep()">Previous</button>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>



                    </div>
                </div>


            </div>
           
        </div>
        </div>
    </div>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');

        function showStep(n) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === n);
            });
        }

        function nextStep() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        document.getElementById('multiStepForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Form Submitted!');
        });
    </script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for Category Dropdown
        $('#category_id').select2({
            placeholder: "Select a category",
            allowClear: true
        });

        // Initialize Select2 for Divisions Dropdown
        $('#divisions_id').select2({
            placeholder: "Select a division",
            allowClear: true
        });
    });
</script>


<script>
    $(document).ready(function() {
        // When a division is selected, fetch the corresponding districts
        $('#division_id').change(function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: '/get-districts/' + division_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district_id').empty().append('<option selected disabled>Select District</option>');
                        $.each(data, function(key, value) {
                            $('#district_id').append('<option value="'+ value.id +'">'+ value.districts_name +'</option>');
                        });
                    }
                });
            } else {
                $('#district_id').empty().append('<option selected disabled>Select District</option>');
                $('#area_id').empty().append('<option selected disabled>Select Area</option>');
            }
        });

        // When a district is selected, fetch the corresponding areas
        $('#district_id').change(function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: '/get-areas/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#area_id').empty().append('<option selected disabled>Select Area</option>');
                        $.each(data, function(key, value) {
                            $('#area_id').append('<option value="'+ value.id +'">'+ value.areas_name +'</option>');
                        });
                    }
                });
            } else {
                $('#area_id').empty().append('<option selected disabled>Select Area</option>');
            }
        });
    });
</script>

@endsection