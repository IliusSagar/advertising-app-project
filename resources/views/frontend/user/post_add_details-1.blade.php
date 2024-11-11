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




/* only demo styles */


/* end only demo styles */

.checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;   
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}

.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 25px;
    height: 25px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    background: rebeccapurple;
    color: #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    color: #bbb;
}

.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}

@media (min-width: 268px) and (max-width: 690px) {
    .select2{
        width: 100%;
    }
 }
    </style>


    <div class="container">
    <div class="card p-5 shadow mt-4">

    @php 
                  $user = Auth::user();
                @endphp
        
        <div class="row">

        <div class="col-md-12">
            <h5>Find in the details</h5>
            <hr style="width: 100%;">
        </div>


            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">


                    <div class="col-md-12">
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
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="subcategory_id" class="mb-2">Sub Category</label>

       

        <select name="subcategory_id" id="subcategory_id" class="form-control">
            <option selected disabled>Selected Sub Category</option>
        
        
        </select>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="divisions_id" class="mb-2">Divisions</label>
        <br>

        @php 
          $division = DB::table('divisions')->get();
        @endphp 

        <select name="divisions_id" id="divisions_id" class="form-control" >
            <option selected disabled>Selected Divisions</option>
            @foreach($division as $row)
                <option value="{{ $row->id }}">{{ $row->divisions_name }}</option>
            @endforeach
        </select>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="district_id" class="mb-2">District</label>
        <select name="district_id" id="district_id" class="form-control" >
            <option selected disabled>Select District</option>
        </select>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="area_id" class="mb-2">Area</label>
        <select name="area_id" id="area_id" class="form-control" >
            <option selected disabled>Select Area</option>
        </select>
    </div>
                    </div>

                    <hr>

                    <div class="col-md-12 mt-2 ">
                        <label for="">Condition</label>
                    </div>

                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="Used" id="usedRadio" name="conditionUsed"> Used
                    </div>
                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="New" id="newRadio" name="conditionUsed"> New
                    </div>


                    <div class="col-md-12 mt-4 ">
                        <label for="">Authenticity</label>
                    </div>

                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="Original" id="originalRadio" name="conditionOriginal"> Original
                    </div>
                    <div class="col-md-6 mt-2 mb-2">
                    <input type="radio" value="Refurbished" id="refurbishedRadio" name="conditionOriginal"> Refurbished
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="brand_id" class="mb-2">Brand</label>

       

        <select name="brand_id" id="brand_id" class="form-control">
            <option selected disabled>Selected Brand</option>
        
                <option value="">Brand-1</option>
                <option value="">Brand-2</option>
        
        </select>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="model_id" class="mb-2">Model</label>

       

        <select name="model_id" id="model_id" class="form-control">
            <option selected disabled>Selected Model</option>
        
                <option value="">Model-1</option>
                <option value="">Model-2</option>
        
        </select>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
                        <label for="">Edition <code>(optional)</code></label>
                        <input type="text" class="form-control mt-2" name="edition">
                    </div>
                    </div>

                    <div class="col-md-12 mt-4 ">
                        <label for="">Features (optional)</label>
                    </div>

                    <div class="col-md-6">

        <div>
            <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox" >
            <label for="checkbox-1" class="checkbox-custom-label">4G</label>
        </div>
        <div>
            <input id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox">
            <label for="checkbox-2" class="checkbox-custom-label">5G</label>
        </div>
        <div>
            <input id="checkbox-3" class="checkbox-custom" name="checkbox-3" type="checkbox">
            <label for="checkbox-3"class="checkbox-custom-label">Dual SIM</label>    
        </div>
        <div>
            <input id="checkbox-4" class="checkbox-custom" name="checkbox-4" type="checkbox">
            <label for="checkbox-4"class="checkbox-custom-label">Micro SIM</label>    
        </div>
        <div>
            <input id="checkbox-5" class="checkbox-custom" name="checkbox-5" type="checkbox">
            <label for="checkbox-5"class="checkbox-custom-label">Mini SIM</label>    
        </div>
        <div>
            <input id="checkbox-6" class="checkbox-custom" name="checkbox-6" type="checkbox">
            <label for="checkbox-6"class="checkbox-custom-label">USB Type-B Port</label>    
        </div>
        <div>
            <input id="checkbox-7" class="checkbox-custom" name="checkbox-7" type="checkbox">
            <label for="checkbox-7"class="checkbox-custom-label">USB Type-C Port</label>    
        </div>
        <div>
            <input id="checkbox-8" class="checkbox-custom" name="checkbox-8" type="checkbox">
            <label for="checkbox-8"class="checkbox-custom-label">Fast Charging</label>    
        </div>
        <div>
            <input id="checkbox-9" class="checkbox-custom" name="checkbox-9" type="checkbox">
            <label for="checkbox-9"class="checkbox-custom-label">Flash Charging</label>    
        </div>
        <div>
            <input id="checkbox-10" class="checkbox-custom" name="checkbox-10" type="checkbox">
            <label for="checkbox-10"class="checkbox-custom-label">Android</label>    
        </div>
        <div>
            <input id="checkbox-11" class="checkbox-custom" name="checkbox-11" type="checkbox">
            <label for="checkbox-11"class="checkbox-custom-label">Windows</label>    
        </div>
        <div>
            <input id="checkbox-12" class="checkbox-custom" name="checkbox-12" type="checkbox">
            <label for="checkbox-12"class="checkbox-custom-label">IOS</label>    
        </div>
        <div>
            <input id="checkbox-13" class="checkbox-custom" name="checkbox-13" type="checkbox">
            <label for="checkbox-13"class="checkbox-custom-label">Expandable Memory</label>    
        </div>

        </div>

        <div class="col-md-6">

        <div>
            <input id="checkbox-14" class="checkbox-custom" name="checkbox-14" type="checkbox" >
            <label for="checkbox-14" class="checkbox-custom-label">4 GB RAM</label>
        </div>
        <div>
            <input id="checkbox-15" class="checkbox-custom" name="checkbox-15" type="checkbox" >
            <label for="checkbox-15" class="checkbox-custom-label">6 GB RAM</label>
        </div>
        <div>
            <input id="checkbox-16" class="checkbox-custom" name="checkbox-16" type="checkbox" >
            <label for="checkbox-16" class="checkbox-custom-label">8 GB RAM</label>
        </div>
        <div>
            <input id="checkbox-17" class="checkbox-custom" name="checkbox-17" type="checkbox" >
            <label for="checkbox-17" class="checkbox-custom-label">12 GB RAM</label>
        </div>
        <div>
            <input id="checkbox-18" class="checkbox-custom" name="checkbox-18" type="checkbox" >
            <label for="checkbox-18" class="checkbox-custom-label">Dual Camera</label>
        </div>
        <div>
            <input id="checkbox-19" class="checkbox-custom" name="checkbox-19" type="checkbox" >
            <label for="checkbox-19" class="checkbox-custom-label">Triple Camera</label>
        </div>
        <div>
            <input id="checkbox-20" class="checkbox-custom" name="checkbox-20" type="checkbox" >
            <label for="checkbox-20" class="checkbox-custom-label">Dual LED Flash</label>
        </div>
        <div>
            <input id="checkbox-21" class="checkbox-custom" name="checkbox-21" type="checkbox" >
            <label for="checkbox-21" class="checkbox-custom-label">Quad LED Flash</label>
        </div>
        <div>
            <input id="checkbox-22" class="checkbox-custom" name="checkbox-22" type="checkbox" >
            <label for="checkbox-22" class="checkbox-custom-label">Bluetooth</label>
        </div>
        <div>
            <input id="checkbox-23" class="checkbox-custom" name="checkbox-23" type="checkbox" >
            <label for="checkbox-23" class="checkbox-custom-label">Wifi</label>
        </div>
        <div>
            <input id="checkbox-24" class="checkbox-custom" name="checkbox-24" type="checkbox" >
            <label for="checkbox-24" class="checkbox-custom-label">GPS</label>
        </div>
        <div>
            <input id="checkbox-25" class="checkbox-custom" name="checkbox-25" type="checkbox" >
            <label for="checkbox-25" class="checkbox-custom-label">Fingerprint Sensor</label>
        </div>
        <div>
            <input id="checkbox-26" class="checkbox-custom" name="checkbox-26" type="checkbox" >
            <label for="checkbox-26" class="checkbox-custom-label">Infrared Port</label>
        </div>

        </div>

        <div class="col-md-12 mt-3 mb-3">
            <label for="">Description</label>
            <textarea name="description" id="" rows="5" class="form-control mt-2" placeholder="More details | More interested buyers!"></textarea>
        </div>

        <div class="col-md-12 mt-3 mb-3">
            <label for="">Price (Tk)</label>
            <input type="number" class="form-control mt-2" placeholder="Pick a good price - what would you pay?">
        </div>

        <div class="col-md-12 mt-3 mb-3">
        <div>
            <input id="checkbox-27" class="checkbox-custom" name="checkbox-27" type="checkbox" >
            <label for="checkbox-27" class="checkbox-custom-label">Negotiable</label>
        </div>
        </div>

        <hr>

        <div class="col-md-12 mt-4 ">
                        <label for=""><b>Add up to 5 photos</b></label>
                    </div>

                    <div class="row row-cols-2 row-cols-lg-3 mt-3 mb-3">
    
    <div class="col-4 col-lg-2">
    <div class="col-md-3">
        <div id="imageUploadContainer" style="background-image: url('{{ asset('frontend/no-image.png') }}'); background-size: cover; background-position: center; height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
            <input type="file" name="avatar" style="opacity: 0; width: 100%; height: 100%; position: absolute; cursor: pointer;">
        </div>
    </div>
    </div>

    <div class="col-4 col-lg-2">
    <div class="col-md-3">
        <div id="imageUploadContainer" style="background-image: url('{{ asset('frontend/no-image.png') }}'); background-size: cover; background-position: center; height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
            <input type="file" name="avatar" style="opacity: 0; width: 100%; height: 100%; position: absolute; cursor: pointer;">
        </div>
    </div>
    </div>

    <div class="col-4 col-lg-2">
    <div class="col-md-3">
        <div id="imageUploadContainer" style="background-image: url('{{ asset('frontend/no-image.png') }}'); background-size: cover; background-position: center; height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
            <input type="file" name="avatar" style="opacity: 0; width: 100%; height: 100%; position: absolute; cursor: pointer;">
        </div>
    </div>
    </div>

    <div class="col-4 col-lg-2">
    <div class="col-md-3">
        <div id="imageUploadContainer" style="background-image: url('{{ asset('frontend/no-image.png') }}'); background-size: cover; background-position: center; height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
            <input type="file" name="avatar" style="opacity: 0; width: 100%; height: 100%; position: absolute; cursor: pointer;">
        </div>
    </div>
    </div>

    <div class="col-4 col-lg-2">
    <div class="col-md-3">
        <div id="imageUploadContainer" style="background-image: url('{{ asset('frontend/no-image.png') }}'); background-size: cover; background-position: center; height: 100px; width: 100px; display: flex; align-items: center; justify-content: center; border: 2px solid #ccc;">
            <input type="file" name="avatar" style="opacity: 0; width: 100%; height: 100%; position: absolute; cursor: pointer;">
        </div>
    </div>
    </div>

  

  </div>

            <hr>

            <div class="col-md-12">
                <div class="card p-5">
                <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control mt-2">
                    </div>
                    <div class="form-group">
                        <label for="">Add Phone Number</label>
                        <input type="text" class="form-control mt-2">
                    </div>
                </div>
            </div>

    
            <div class="col-md-12 mt-3 mb-3">
        <div>
            <input id="checkbox-28" class="checkbox-custom" name="checkbox-28" type="checkbox" >
            <label for="checkbox-28" class="checkbox-custom-label">I have read and accept the <a href="" target="_blank">Terms and Conditions</a></label>
        </div>
        </div>

        <div class="col-md-12 mt-3 mb-3">
        <button type="submit" class="btn btn-success">Post Ad</button>
        </div>




  

                    </div>
                   

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // Fetch districts when a division is selected
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/get/category/') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var subCategorySelect = $('select[name="subcategory_id"]').empty();
                        subCategorySelect.append('<option selected disabled>Select Sub Category</option>');
                        $.each(data, function(key, value) {
                            subCategorySelect.append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                alert('Please select a Category');
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // Fetch districts when a division is selected
        $('select[name="divisions_id"]').on('change', function(){
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/get/districts/') }}/"+division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var districtSelect = $('select[name="district_id"]').empty();
                        districtSelect.append('<option selected disabled>Select District</option>');
                        $.each(data, function(key, value) {
                            districtSelect.append('<option value="'+ value.id +'">'+ value.districts_name +'</option>');
                        });
                    }
                });
            } else {
                alert('Please select a division');
            }
        });

        // Fetch areas when a district is selected
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/get/areas/') }}/"+district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var areaSelect = $('select[name="area_id"]').empty();
                        areaSelect.append('<option selected disabled>Select Area</option>');
                        $.each(data, function(key, value) {
                            areaSelect.append('<option value="'+ value.id +'">'+ value.areas_name +'</option>');
                        });
                    }
                });
            } else {
                alert('Please select a district');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
      
        $('#category_id').select2({
            placeholder: "Select a category",
            allowClear: true
        });

        $('#subcategory_id').select2({
            placeholder: "Select a sub category",
            allowClear: true
        });

      
        $('#divisions_id').select2({
            placeholder: "Select a division",
            allowClear: true
        });

     
         $('#district_id').select2({
            placeholder: "Select a division",
            allowClear: true
        });

        $('#area_id').select2({
            placeholder: "Select a division",
            allowClear: true
        });

        $('#brand_id').select2({
            placeholder: "Select a brand",
            allowClear: true
        });

        $('#model_id').select2({
            placeholder: "Select a model",
            allowClear: true
        });

    });
</script>


<script>
                    $("input:radio").change(function () {
                        if ($(this).val() === "New") {
                            $('#newRadio').prop('checked', true);
                        } else if ($(this).val() === "Used") {
                            $('#usedRadio').prop('checked', true);
                        }
                    });
                </script>

<script>
                    $("input:radio").change(function () {
                        if ($(this).val() === "Original") {
                            $('#originalRadio').prop('checked', true);
                        } else if ($(this).val() === "Refurbished") {
                            $('#refurbishedRadio').prop('checked', true);
                        }
                    });
                </script>



@endsection