<section>
        <div class="card p-2 shadow  mt-2">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <p style=" font-weight: bold; color: gray;">© <?php echo date("Y"); ?>
                        . All rights reserved. <a
                                style="text-decoration: none;" href="https://itporibar.com" target="_blank">IT
                                Poribar</a>
                        </p>
                    </div>

                    @php 
                    $home_page = DB::table('home_pages')->where('id', 2)->first();
                @endphp

                    <div class="">
                        <img src="{{ asset($home_page->footer_logo)}}" class="img-fluid" alt="" style="height: 40px; width: 140px;">
                    </div>
                </div>
            </div>
        </div>
    </section>