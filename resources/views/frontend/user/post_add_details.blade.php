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


/* Image Css Remove add file  */

 .image-upload-one{
    grid-area: img-u-one;
    display: flex;
    justify-content: center;
  }
  .image-upload-two{
    grid-area: img-u-two;
    display: flex;
    justify-content: center;
  }
  .image-upload-three{
    grid-area: img-u-three;
    display: flex;
    justify-content: center;
  }
  .image-upload-four{
    grid-area: img-u-four;
    display: flex;
    justify-content: center;
  }
  .image-upload-five{
    grid-area: img-u-five;
    display: flex;
    justify-content: center;
  }
  .image-upload-six{
    grid-area: img-u-six;
    display: flex;
    justify-content: center;
  }

  .image-upload-container{
    display: grid;
    grid-template-areas: 'img-u-one img-u-two img-u-three img-u-four img-u-five img-u-six';
  }
  .center {
    display:inline;
    margin: 3px;
  }

  .form-input {
    width:100px;
    padding:3px;
    background:#fff;
    border:2px dashed dodgerblue;
  }
  .form-input input {
    display:none;
  }
  .form-input label {
    display:block;
    width:100px;
    height: auto;
    max-height: 100px;
    /* background:#333; */
    border-radius:10px;
    cursor:pointer;
  }
  
  .form-input img {
    width:100px;
    height: 100px;
    margin: 2px;
    opacity: .4;
  }

  .imgRemove{
    position: relative;
    bottom: 114px;
    left: 68%;
    background-color: transparent;
    border: none;
    font-size: 25px;
    outline: none;
  }
  .imgRemove::after{
    content: ' \21BA';
    color: red;
    font-weight: 900;
    border-radius: 8px;
    cursor: pointer;
  }

  .small{
    color: #fff;
  }

  @media only screen and (max-width: 700px){
    .image-upload-container{
      grid-template-areas: 'img-u-one img-u-two img-u-three'
       'img-u-four img-u-five img-u-six';
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

            <form action="{{ route('store.post')}}" method="post" enctype="multipart/form-data">
                @csrf

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
        <span style="color: red;">
            @error('category_id')
                {{$message}}
            @enderror
        </span>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="subcategory_id" class="mb-2">Sub Category</label>

       

        <select name="subcategory_id" id="subcategory_id" class="form-control">
            <option selected disabled>Selected Sub Category</option>
        
        
        </select>
        <span style="color: red;">
            @error('subcategory_id')
                {{$message}}
            @enderror
        </span>
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
        <span style="color: red;">
            @error('divisions_id')
                {{$message}}
            @enderror
        </span>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="district_id" class="mb-2">District</label>
        <select name="district_id" id="district_id" class="form-control" >
            <option selected disabled>Select District</option>
        </select>
        <span style="color: red;">
            @error('district_id')
                {{$message}}
            @enderror
        </span>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="area_id" class="mb-2">Area</label>
        <select name="area_id" id="area_id" class="form-control" >
            <option selected disabled>Select Area</option>
        </select>
        <span style="color: red;">
            @error('area_id')
                {{$message}}
            @enderror
        </span>
    </div>
                    </div>

                    <hr>

                    <div class="col-md-12 mt-2 ">
                        <label for="">Condition</label>
                        <span style="color: red;">
                        @error('condition_value')
                            {{$message}}
                        @enderror
                    </span>
                    </div>

                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="Used" id="usedRadio" name="condition_value"> Used
                    </div>
                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="New" id="newRadio" name="condition_value"> New
                    </div>


                    <div class="col-md-12 mt-4 ">
                        <label for="">Authenticity</label>
                        <span style="color: red;">
                        @error('authenticity_value')
                            {{$message}}
                        @enderror
                    </span>
                    </div>

                    <div class="col-md-6 mt-2 mb-2">
                        <input type="radio" value="Original" id="originalRadio" name="authenticity_value"> Original
                    </div>
                    <div class="col-md-6 mt-2 mb-2">
                    <input type="radio" value="Refurbished" id="refurbishedRadio" name="authenticity_value"> Refurbished
                    </div>

               

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="brand_id" class="mb-2">Brand</label>

        @php 
          $brand = DB::table('brands')->get();
        @endphp 

        <select name="brand_id" id="brand_id" class="form-control">
            <option selected disabled>Selected Brand</option>
            @foreach($brand as $row)
                <option value="{{ $row->id}}">{{ $row->name}}</option>
            @endforeach
        
        </select>
        <span style="color: red;">
        @error('brand_id')
            {{$message}}
        @enderror
    </span>
    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group mt-2 mb-2">
        <label for="model_id" class="mb-2">Model</label>

       

        <select name="model_id" id="model_id" class="form-control">
            <option selected disabled>Selected Model</option>

        
        </select>
        <span style="color: red;">
        @error('model_id')
            {{$message}}
        @enderror
    </span>
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
            <span style="color: red;">
                @error('description')
                    {{$message}}
                @enderror
            </span>
        </div>

        <div class="col-md-12 mt-3 mb-3">
            <label for="">Price (Tk)</label>
            <input type="number" name="price" class="form-control mt-2" placeholder="Pick a good price - what would you pay?">
            <span style="color: red;">
                @error('price')
                    {{$message}}
                @enderror
            </span>
        </div>

        <div class="col-md-12 mt-3 mb-3">
        <div>
            <input id="checkbox-27" class="checkbox-custom" name="checkbox-27" type="checkbox" >
            <label for="checkbox-27" class="checkbox-custom-label">Negotiable</label>
        </div>
        </div>

        <hr>

        <div class="col-md-12 mt-4 ">
                        <label for=""><b>Add up to 6 photos</b></label>
                    </div>

                    <div class="row row-cols-2 row-cols-lg-3 mt-3 mb-3">
    
   
                    <div class="image-upload-container">
      <div class="image-upload-one">
        <div class="center">
          <div class="form-input">
            <label for="file-ip-1">
              <img id="file-ip-1-preview" src="{{ asset('frontend/no-image.png')}}">
              <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button>
            </label>
            <input type="file"  name="img_one" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);">
            <span style="color: red;">
                @error('img_one')
                    {{$message}}
                @enderror
            </span>
          </div>
          <small class="small">Use the &#8634; icon to reset the image</small>
        </div>
      </div>
      <!-- ************************************************************************************************************ -->
      <div class="image-upload-two">
        <div class="center">
          <div class="form-input">
            <label for="file-ip-2">
              <img id="file-ip-2-preview" src="{{ asset('frontend/no-image.png')}}">
              <button type="button" class="imgRemove" onclick="myImgRemove(2)"></button>
            </label>
            <input type="file" name="img_two" id="file-ip-2" accept="image/*" onchange="showPreview(event, 2);">
          </div>
          <small class="small">Use the &#8634; icon to reset the image</small>
        </div>
      </div>

      <!-- ************************************************************************************************************ -->
      <div class="image-upload-three">
        <div class="center">
          <div class="form-input">
            <label for="file-ip-3">
              <img id="file-ip-3-preview" src="{{ asset('frontend/no-image.png')}}">
              <button type="button" class="imgRemove" onclick="myImgRemove(3)"></button>
            </label>
            <input type="file" name="img_three" id="file-ip-3" accept="image/*" onchange="showPreview(event, 3);">
          </div>
          <small class="small">Use the &#8634; icon to reset the image</small>
        </div>
      </div>
      <!-- *********************************************************************************************************** -->
        <div class="image-upload-four">
          <div class="center">
            <div class="form-input">
              <label for="file-ip-4">
                <img id="file-ip-4-preview" src="{{ asset('frontend/no-image.png')}}">
                <button type="button" class="imgRemove" onclick="myImgRemove(4)"></button>
              </label>
              <input type="file" name="img_four" id="file-ip-4" accept="image/*" onchange="showPreview(event, 4);">
            </div>
            <small class="small">Use the &#8634; icon to reset the image</small>
          </div>
        </div>
        <!-- ************************************************************************************************************ -->
        <div class="image-upload-five">
          <div class="center">
            <div class="form-input">
              <label for="file-ip-5">
                <img id="file-ip-5-preview" src="{{ asset('frontend/no-image.png')}}">
                <button type="button" class="imgRemove" onclick="myImgRemove(5)"></button>
              </label>
              <input type="file" name="img_five" id="file-ip-5" accept="image/*" onchange="showPreview(event, 5);">
            </div>
            <small class="small">Use the &#8634; icon to reset the image</small>
          </div>
        </div>
  
        <!-- ************************************************************************************************************ -->
        <div class="image-upload-six">
          <div class="center">
            <div class="form-input">
              <label for="file-ip-6">
                <img id="file-ip-6-preview" src="{{ asset('frontend/no-image.png')}}">
                <button type="button" class="imgRemove" onclick="myImgRemove(6)"></button>
              </label>
              <input type="file" name="img_six" id="file-ip-6" accept="image/*" onchange="showPreview(event, 6);">
            </div>
            <small class="small">Use the &#8634; icon to reset the image</small>
          </div>
        </div>

      <!-- ************************************************************************************************************** -->
    </div>
  

  </div>

            <hr>

            <div class="col-md-12">
                <div class="card p-5">

                @php 
                        $user_name = Auth::user()->name;
                        $user_phone = Auth::user()->phone;
                    @endphp

                <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control mt-2" value="{{$user_name}}">
                        <span style="color: red;">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    

                    <div class="form-group">
                        <label for="">Add Phone Number</label>
                        <input type="text" name="phone" class="form-control mt-2" value="{{$user_phone}}">
                        <span style="color: red;">
                            @error('phone')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

    
            <div class="col-md-12 mt-3 mb-3">
        <div>
            <input id="checkbox-28" class="checkbox-custom"  name="checkbox-28" type="checkbox" >
            <label for="checkbox-28" class="checkbox-custom-label">I have read and accept the <a href="" target="_blank">Terms and Conditions</a></label>
            <span style="color: red;">
        @error('checkbox-28')
            {{$message}}
        @enderror
    </span>
        </div>
        </div>

        <div class="col-md-12 mt-3 mb-3">
        <button type="submit" class="btn btn-success">Post Ad</button>
        </div>




               

                    </div>
                    </form>

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // Fetch districts when a division is selected
        $('select[name="brand_id"]').on('change', function(){
            var brand_id = $(this).val();
            if (brand_id) {
                $.ajax({
                    url: "{{ url('/get/brand/') }}/"+brand_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var modelSelect = $('select[name="model_id"]').empty();
                        modelSelect.append('<option selected disabled>Select Model</option>');
                        $.each(data, function(key, value) {
                            modelSelect.append('<option value="'+ value.id +'">'+ value.model_name +'</option>');
                        });
                    }
                });
            } else {
                alert('Please select a Brand');
            }
        });

    });
</script>

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

                <script>
                    var number = 1;
do {
  function showPreview(event, number){
    if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      let preview = document.getElementById("file-ip-"+number+"-preview");
      preview.src = src;
      preview.style.display = "block";
    } 
  }
  function myImgRemove(number) {
      document.getElementById("file-ip-"+number+"-preview").src = "{{ asset('frontend/no-image.png')}}";
      document.getElementById("file-ip-"+number).value = null;
    }
  number++;
}
while (number < 5);
                </script>



@endsection