@if (!empty($brands))
<section class="wsus__brand mt_45 pt_120 xs_pt_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__brand_slider_area wow fadeInUp">
                        <h6>Trusted by Over 24,758 Outstanding Teams</h6>
                        <div class="marquee_animi">
                            <ul class="d-flex flex-wrap">
                           
                             
                                @forelse ($brands as $brand)
                                         <li>
                                    <a href="{{ $brand->url }}" target="_blank">
                                        <img src="{{ asset($brand->image) }}" alt="brand" class="img-fluid w-100">
                                    </a>
                                </li>
                                @empty
                                    No Data Available
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@else
    Please Select Brands from Admin Panel
@endif
