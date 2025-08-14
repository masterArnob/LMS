@php
    $footer = \App\Models\Footer::first();
    $links = \App\Models\SocialLinks::where('status', 'active')->get();
    $ones =   \App\Models\FooterColOne::where('status', 'active')->get();
    $twos =   \App\Models\FooterColTwo::where('status', 'active')->get();
@endphp
@if (!empty($footer))
    <footer class="footer_3" style="background: url(images/footer_3_bg.jpg);">
        <div class="footer_3_overlay pt_120 xs_pt_100">
            <div class="wsus__footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 wow fadeInUp">
                            <div class="wsus__footer_3_logo_area">
                                <a class="logo" href="index.html">
                                    <img src="images/footer_logo.png" alt="EduCore" class="img-fluid">
                                </a>
                                <p>{{ @$footer->desc }}</p>
                                <h2>Follow Us On</h2>
                                <ul class="d-flex flex-wrap">
                                    @forelse ($links as $link)
                                          <li><a href="{{ $link->url }}" target="_blank">
                                    <img src="{{ asset($link->icon) }}" alt="" style="width: 20px !important; height: 20px !important;">
                                </a></li>
                                    @empty
                                        Please add social links in the admin panel.
                                    @endforelse
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
                            <div class="wsus__footer_link">
                                <h2>Help Links</h2>
                                <ul>
                                    @forelse ($ones as $one)
                                          <li><a href="{{ $one->url }}">{{ $one->title }}</a></li>
                                    @empty
                                        Please add help links in the admin panel.
                                    @endforelse
                         
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-3 wow fadeInUp">
                            <div class="wsus__footer_link">
                                <h2>More Links</h2>
                                <ul>
                                   @forelse ($twos as $two)
                                          <li><a href="{{ $two->url }}">{{ $two->title }}</a></li>
                                    @empty
                                        Please add more links in the admin panel.
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="wsus__footer_3_subscribe">
                                <h3>Subscribe Our Newsletter</h3>
                                 <form class="subs">
                            <input type="email" placeholder="Your email address..." name="email" required>
                            <button type="submit" class="common_btn">Subscribe</button>
                        </form>
                                <ul>
                                    <li>
                                    <div class="icon">
                                        <img src="{{ asset('uploads/default-files/mail_icon_white.png') }}" alt="Call" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <h4>Email us:</h4>
                                        <a href="mailto:{{ @$footer->email }}">{{ @$footer->email }}</a>
                                    </div>
                                </li>
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('uploads/default-files/call_icon_white.png') }}" alt="Call" class="img-fluid">
                                        </div>
                                        <div class="text">
                                            <h4>Call us:</h4>
                                            <a href="tel:{{ @$footer->phone }}">{{ @$footer->phone }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('uploads/default-files/location_icon_white.png') }}" alt="Location" class="img-fluid">
                                        </div>
                                        <div class="text">
                                            <h4>Office:</h4>
                                            <p>{{ @$footer->address }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__footer_copyright_area mt_140 xs_mt_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="wsus__footer_copyright_text">
                                <p>{{ @$footer->copyright }}</p>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Term of Service</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
@else
    <footer class="footer_3">
        <div class="container">
            <p>No footer data available.</p>
        </div>
    </footer>

@endif