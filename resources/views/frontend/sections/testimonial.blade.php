@if (!empty($testimonials))
<section class="wsus__testimonial pt_120 xs_pt_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto wow fadeInUp">
                    <div class="wsus__section_heading mb_40">
                        <h5>Testimonial</h5>
                        <h2>Comments From Our Learners</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row testimonial_slider">

            @forelse ($testimonials as $item)
                            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_testimonial">

                    <p class="rating">
                        @for ($i=1; $i<= $item->rating; $i++)
                               <i class="fas fa-star"></i>
                        @endfor
                     
                    </p>
                    <p class="description">{{ $item->review }}</p>
                 
                    <div class="wsus__testimonial_footer">
                        <div class="img">
                            <img src="{{ asset($item->user_image) }}" alt="user" class="img-fluid">
                        </div>
                        <h3>
                            {{ $item->user_name }}
                            <span>{{ $item->user_title }}</span>
                        </h3>
                    </div>
                </div>
            </div>
            @empty
                No Data Available
            @endforelse
        </div>
    </section>    
@endif
