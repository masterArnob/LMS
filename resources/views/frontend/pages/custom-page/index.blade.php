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
                            <h1>{{ $page->title }}</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>{{ $page->title }}</li>
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
                CART VIEW START
            ============================-->
    <section class="wsus__cart_view mt-3 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="cart_list">
                         <div class="wsus__single_testimonial">
                  
                       {!! $page->content !!}

                    </div>

                    </div>
                </div>
            </div>
       
        </div>
    </section>
    <!--===========================
                CART VIEW END
            ============================-->
@endsection
