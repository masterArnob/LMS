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
                            <h1>Withdraw</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Withdraw</li>
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
                        DASHBOARD PROFILE EDIT START
                    ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    @include('instructor.layout.sidebar')
                </div>
                <div class="col-xl-9 col-md-8 wow fadeInRight">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Withdraw</h5>
                                <p>Manage withdraw requests and their status.</p>
                                <a class="common_btn" href="{{ route('instructor.withdraw.create') }}">+ create withdraw</a>
                            </div>
                        </div>

                    

                        <div class="wsus__dash_course_table">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                 
                                   
                                                       <th class="sale">
                                                        #
                                                    </th>
                                                    <th class="sale">
                                                        Title
                                                    </th>
                                                     <th class="sale">
                                                        Customer
                                                    </th>
                                                    <th class="status">
                                                        Price
                                                    </th>
                                                    <th class="status">
                                                        Commission Rate
                                                    </th>
                                                    <th class="action">
                                                        Earnings
                                                    </th>
                                                </tr>


                               
                                                {{-- @forelse ($orders as $order)
                                                    <tr>
                                                      
                                                         <td class="details">
                                                          
                                                          {{ $loop->iteration }}

                                                        </td>
                                                        <td class="details">
                                                          
                                                            <a class="title" href="{{ route('course.details', $order->course->slug) }}">{{ $order->course->title }}</a>

                                                        </td>

                                                            <td class="details">
                                                          
                                                            <a class="title" href="javascript:;">{{ $order->order->user->name }}</a>

                                                        </td>



                                                           <td class="details">
                                                          
                                                            <a class="title" href="javascript:;">{{ config('settings.currency_icon') }}{{ $order->price }}</a>

                                                        </td>



                                                                 <td class="details">
                                                          
                                                            <a class="title" href="javascript:;">{{ $order->commission_rate ?? 0 }}%</a>

                                                        </td>



                                                                    <td class="details">
                                                          
                                                            <a class="title" href="javascript:;">{{ config('settings.currency_icon') }}{{ calculateComission($order->price, $order->commission_rate) }}</a>

                                                        </td>
                                                   
                                               
                                                    </tr>
                                                @empty
                                                    No Data Available
                                                @endforelse --}}
                                 
                                            </tbody>
                                        </table>
                                        <div class="col-xl-12">
                                           {{-- 
                                            @if ($orders->hasPages())
                                                {{ $orders->withQueryString()->links() }}
                                            @endif
                                           --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                        DASHBOARD PROFILE EDIT END
                    ============================-->
@endsection
