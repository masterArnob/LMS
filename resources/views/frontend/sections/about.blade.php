@if (!empty($aboutSection))
<section class="wsus__about_3 mt_120 xs_mt_100 ">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="wsus__about_3_img">

                        <img src="{{ asset(@$aboutSection->image) }}" alt="About us" class="about_3_large img-fluid w-100">

                        <div class="text">
                            <h4> <span>{{ @$aboutSection->lerner_count }}</span> {{ @$aboutSection->lerner_count_text }}</h4>
                            <img src="{{ asset(@$aboutSection->lerner_image) }}" alt="Photo" class="img-fluid">
                        </div>

                        <div class="circle_box">
                            <svg viewBox="0 0 100 100">
                                <defs>
                                    <path id="circle2" d="
                            M 50, 50
                            m -37, 0
                            a 37,37 0 1,1 74,0
                            a 37,37 0 1,1 -74,0"></path>
                                </defs>
                                <text>
                                    <textPath xlink:href="#circle">
                                       {{@$aboutSection->rounded_text}}
                                    </textPath>
                                </text>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="wsus__about_3_text">
                        <div class="wsus__section_heading heading_left mb_15">
                            <h5>Learn More About Us</h5>
                            <h2>{{ @$aboutSection->title }}</h2>
                        </div>
                        {!! @$aboutSection->description !!}
                        <a class="common_btn" href="{{ @$aboutSection->button_url }}">{{ @$aboutSection->button_text }}</a>
                        <div class="about_video">
                            <img src="{{ @$aboutSection->video_image }}" alt="Video" class="img-fluid w-100">
                            <span>live</span>
                            <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                href="{{ @$aboutSection->video_url }}">
                                <img src="{{ asset('uploads/default-files/play_icon.png') }}" alt="Play" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
@else
    Please set up the About Section in the admin panel.
@endif
