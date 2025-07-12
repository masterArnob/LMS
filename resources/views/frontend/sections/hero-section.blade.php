    <section class="wsus__banner_3" style="background: url(images/banner_3_bg.png);">
        <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-6 wow fadeInUp">
                <div class="wsus__banner_3_text">
                    <h5>{{ @$hero->label }}</h5>
                    <h1>{{ @$hero->title }} <span>EduCore</span></h1>
                    <p class="description">{{ @$hero->subtitle }}</p>
                    <div class="wsus__banner_2_btn_area mt_60">
                        @if (!empty($hero->button_url))
                           <a class="common_btn" href="{{ $hero->button_url }}">{{ @$hero->button_text }} <i class="far fa-arrow-right"
                                aria-hidden="true"></i></a>
                        @else
   <a class="common_btn" href="#">{{ @$hero->button_text }} <i class="far fa-arrow-right"
                                aria-hidden="true"></i></a>
                        @endif
                     
                        <div class="play_btn_area">
                            <a class="play_btn venobox vbox-item" data-autoplay="true" data-vbtype="video"
                                href="{{ @$hero->video_button_url }}">
                                <img src="images/play_icon.png" alt="Play" class="img-fluid">
                            </a>
                            <h4>{{ @$hero->video_button_text }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 wow fadeInRight">
                <div class="wsus__banner_3_img">
                    <div class="img">
                        <img src="{{ asset(@$hero->image) }}" alt="Banner" class="img-fluid">

                        <div class="text">
                            <h4>{{ @$hero->banner_item_title }}</h4>
                            <p>{{ @$hero->banner_item_subtitle }}</p>
                        </div>

                        <div class="circle_box">
                            <svg viewBox="0 0 100 100">
                                <defs>
                                    <path id="circle" d="
                            M 50, 50
                            m -37, 0
                            a 37,37 0 1,1 74,0
                            a 37,37 0 1,1 -74,0"></path>
                                </defs>
                                <text>
                                    <textPath xlink:href="#circle">
                                        {{ @$hero->round_text }}
                                    </textPath>
                                </text>
                            </svg>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>