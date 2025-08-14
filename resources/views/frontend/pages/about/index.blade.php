@extends('frontend.layout.master')
@section('content')
    <!--===========================
        BREADCRUMB START
    ============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('uploads/default-files/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>How We Work</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        BREADCRUMB END
    ============================-->


    <!--===========================
        ABOUT 3 START
    ============================-->
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
    <!--===========================
        ABOUT 3 END
    ============================-->




    <!--===========================
        COUNTER START
    ============================-->
    @if (!empty($about))
            <section class="wsus__about_counter wsus__counter mt_120 xs_mt_100">
        <div class="container">
            <div class="wsus__counter_bg" style="background: url({{ asset('uploads/default-files/counter_bg.jpg') }});">
                <div class="row">
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                             <h2><span class="counter">{{ @$about->counter_one }}</span></h2>
                           <p>{{ @$about->title_one }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ @$about->counter_two }}</span></h2>
                            <p>{{ @$about->title_two }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ @$about->counter_three }}</span></h2>
                            <p>{{ @$about->title_three }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="wsus__single_counter">
                            <h2><span class="counter">{{ @$about->counter_four }}</span></h2>
                            <p>{{ @$about->title_four }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
        please add about page in admin panel
    @endif
    <!--===========================
        COUNTER END
    ============================-->


    <!--===========================
        TESTIMONIAL START
    ============================-->
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
    <!--===========================
        TESTIMONIAL END
    ============================-->


    <!--===========================
        BLOG 4 START
    ============================-->
    <section class="blog_4 mt_110 xs_mt_90 pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow fadeInLeft">
                    <div class="wsus__section_heading heading_left mb_50">
                        <h5>Latest blogs</h5>
                        <h2>Our Latest News Feed.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row blog_4_slider">
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_1.jpg" alt="Blog" class="img-fluid">
                        <span class="date">March 23, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Richard Tea
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                3 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Exploring Learning Landscapes in Academic.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_2.jpg" alt="Blog" class="img-fluid">
                        <span class="date">April 28, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Doug Lyphe
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                21 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Uncovering Learning Opportunities in Academia.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_3.jpg" alt="Blog" class="img-fluid">
                        <span class="date">Jan 12, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Eleanor Fant
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                48 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Internationally Distinguished Skillful Educators.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 wow fadeInUp">
                <div class="wsus__single_blog_4">
                    <a href="#" class="wsus__single_blog_4_img">
                        <img src="images/blog_4_img_4.jpg" alt="Blog" class="img-fluid">
                        <span class="date">April 28, 2024</span>
                    </a>
                    <div class="wsus__single_blog_4_text">
                        <ul>
                            <li>
                                <span><img src="images/user_icon_black.png" alt="User" class="img-fluid"></span>
                                By Doug Lyphe
                            </li>
                            <li>
                                <span><img src="images/comment_icon_black.png" alt="Comment" class="img-fluid"></span>
                                21 Comments
                            </li>
                        </ul>
                        <a href="#" class="title">Uncovering Learning Opportunities in Academia.</a>
                        <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
                        <a href="#" class="common_btn">Read More <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        BLOG 4 END
    ============================-->
@endsection
