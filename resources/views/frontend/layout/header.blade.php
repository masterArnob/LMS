@php
    $section = App\Models\TopBarSection::first();
@endphp
<header class="header_3">
        <div class="row">
            <div class="col-xxl-4 col-lg-7 col-md-8 d-none d-md-block">
                <ul class="wsus__header_left d-flex flex-wrap">
                  <li><a href="mailto:{{ @$section->email }}"><i class="fas fa-envelope"></i> {{ @$section->email }}</a></li>
                    <li><a href="callto:{{ @$section->phone }}"><i class="fas fa-phone-alt"></i> {{ @$section->phone }}</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> 58k Followers</a></li>
                </ul>
            </div>
            <div class="col-xxl-5 col-lg-7 d-none d-xxl-block">
                <div class="wsus__header_center">
                    <p> <span>{{ @$section->offer_name }}</span> {{ @$section->offer_short_description }} <a
                            href="{{ @$section->offer_button_url }}">{{ @$section->offer_button_text }}</a></p>
                </div>
            </div>
        
        </div>
    </header>