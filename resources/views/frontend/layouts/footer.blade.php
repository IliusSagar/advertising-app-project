<section class="">
        <div class="card p-5">
        <div class="container">
            <div class="row">


                @php
                   $category = DB::table('categories')->orderBy('id', 'desc')->limit(4)->get();
                @endphp

                <div class="col-md-3">
                    <h5>Best Category</h5>

                    @foreach($category as $row)
                        
                    
                    <a href="{{ route('all.category',$row->id)}}" style="text-decoration: none; color: gray;"><b>{{ $row->category}}</b></a>
                    <br>

                    @endforeach
                   
                </div>

                <div class="col-md-3">
                    <h5>Pages</h5>
                    <a href="{{ route('pages.about-us')}}" style="text-decoration: none; color: gray;"><b>About us</b></a>
                    <br>
                    <a href="{{ route('pages.careers')}}" style="text-decoration: none; color: gray;"><b>Careers</b></a>
                    <br>
                    <a href="{{ route('pages.terms_condition')}}" style="text-decoration: none; color: gray;"><b>Terms & Condition</b></a>
                    <br>
                    <a href="{{ route('pages.privacy_policy')}}" style="text-decoration: none; color: gray;"><b> Privacy Policy</b></a>
                </div>

                <div class="col-md-3">
                    <h5>Support</h5>
                    <a href="{{ route('pages.faq')}}" style="text-decoration: none; color: gray;"><b>Faq</b></a>
                    <br>
                    <a href="" style="text-decoration: none; color: gray;"><b>Chat</b></a>
                    <br>
                    <a href="{{ route('pages.contact_us')}}" style="text-decoration: none; color: gray;"><b>Contact Us</b></a>
                    <br><br>
                    <a href="{{ $home_page->facebook}}" target="_blank"><i class="fab fa-facebook" style="font-size: 20px; color: black;"></i></a>&nbsp;
                    <a href="{{ $home_page->instagram}}" target="_blank"><i class="fab fa-instagram" style="font-size: 20px; color: black;"></i></a>&nbsp;
                    <a href="{{ $home_page->youtube}}" target="_blank"><i class="fab fa-youtube" style="font-size: 20px; color: black;"></i></a>&nbsp;
                    <a href="{{ $home_page->linkedin}}" target="_blank"><i class="fab fa-linkedin" style="font-size: 20px; color: black;"></i></a>
                </div>

                <div class="col-md-3">
                    <h5>Download App</h5>
                    <img src="{{ url($home_page->android_app_image)}}" class="img-fluid" alt="" style="height: 50px; width: 110px;">
                    <img src="{{ url($home_page->ios_app_image)}}" class="img-fluid" alt="" style="height: 60px; width: 110px;">
                    <p><b>Address:</b> {{ $home_page->company_address}} <br><b>Email:</b> {{ $home_page->email}} <br><b>Hotline:
                            {{ $home_page->hotline}}</b></p>

                </div>
            </div>
        </div>
        </div>
    </section>