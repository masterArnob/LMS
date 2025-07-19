@if (!empty($videoSection))
<section class="wsus__video mt_120 xs_mt_100">
        <img src="{{ asset(@$videoSection->image) }}" alt="Video" class="img-fluid w-100">
        <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
            href="{{ @$videoSection->video_url }}">
            <img src="{{ asset('frontend/images/play_icon_white.png') }}" alt="Play" class="img-fluid">
        </a>
        <div class="text wow fadeInLeft">
            <p>{!! @$videoSection->description !!}</p>
            <a href="{{ @$videoSection->button_url }}">{{ @$videoSection->button_text }} <i class="far fa-arrow-right"></i></a>
        </div>
    </section>    
@else
    Please add the video section data from the admin panel.
@endif
