@extends('frontend.layout.master')

@section('content')


        <!--===========================
        BREADCRUMB START
    ============================-->
    <section class="wsus__breadcrumb course_details_breadcrumb" style="background: url({{ asset('uploads/default-files/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                           
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                            
                                <li>Order Success</li>
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
        COURSES DETAILS START
    ============================-->
    <section class="wsus__courses_details pb_120 xs_pb_100 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__courses_details_content">
                        <h2>Order Successful</h2>
                        <p>Your order has been placed successfully. Thank you for your purchase!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        COURSES DETAILS END
    ============================-->
@endsection
