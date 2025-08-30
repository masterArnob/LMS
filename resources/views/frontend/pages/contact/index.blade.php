@extends('frontend.layout.master')
@section('content')
    ============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('uploads/default-files/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Contact Us</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Contact Us</li>
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
        CONTACT US START
    ============================-->
    <section class="wsus__contact_us mt_95 xs_mt_75 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__contact_info">
                        <div class="icon">
                            <img src="{{ asset('uploads/default-files/contact_icon_1.png') }}" alt="contact" class="img-fluid">
                        </div>
                        <h4>Office Address</h4>
                        <p>{{ config('settings.location') }}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__contact_info">
                        <div class="icon">
                            <img src="{{ asset('uploads/default-files/contact_icon_2.png') }}" alt="contact" class="img-fluid">
                        </div>
                        <h4>Send a Message</h4>
                        <a href="mailto:{{ config('settings.email') }}">{{ config('settings.email') }}</a>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="wsus__contact_info">
                        <div class="icon">
                            <img src="{{ asset('uploads/default-files/contact_icon_3.png') }}" alt="contact" class="img-fluid">
                        </div>
                        <h4>Let's Discuss</h4>
                        <a href="callto:{{ config('settings.phone') }}">Phone: {{ config('settings.phone') }}</a>
                    </div>
                </div>
          
            </div>
           
        </div>
        <div class="wsus__contact_map mt_120 xs_mt_100 wow fadeInUp">
            <iframe
                src="{{ @$page->map }}"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--===========================
        CONTACT US END
    ============================-->

@endsection
