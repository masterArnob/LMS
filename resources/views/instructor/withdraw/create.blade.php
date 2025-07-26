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
                            <h1>Instructor Dashboard</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Create Withdraw Request</li>
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
                        <div class="row">
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Current Balance</h6>
                                    <h3>
                                    {{ config('settings.currency_icon') }}{{ $currentBalance ?? '0.00' }}
                                    </h3> 
                                
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Pending Balance</h6>
                                    <h3>{{ config('settings.currency_icon') }}{{ $pendingBalance ?? '0.00' }}</h3>
                                 
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6 wow fadeInUp">
                                <div class="wsus__dash_earning">
                                    <h6>Total Payout</h6>
                                    <h3> 
                                        {{ config('settings.currency_icon') }}{{ $totalPayout ?? '0.00' }}</h3>
                              
                                </div>
                            </div>
                        </div>


                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="wsus__dash_pro_single mt-4">
                                    <div class="">
                                        <h6 class="wsus__dashboard_heading">Withdrawal Information</h6>
                                        <div class="row mt-4">
                                            @forelse ($gateways as $gateway)
                                                <div class="col-xl-6 col-md-6 mb-4">
                                                    <div class="wsus__dash_pro_single"
                                                        style="border: 1px solid #e0e0e0; border-radius: 8px; padding: 15px; height: 100%;">
                                                        <h5 class="wsus__dashboard_heading"
                                                            style="font-size: 16px; margin-bottom: 10px;">
                                                            {{ $gateway->name }}
                                                        </h5>
                                                        <div class="wsus__dash_pro_area">
                                                            {!! $gateway->description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-12">
                                                    <div class="alert alert-warning">No payment gateways currently available
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>



                                <form action="" method="POST">

                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <label>Amount *</label>
                                                <input type="number" step="0.01" placeholder="Enter withdrawal amount"
                                                    name="amount" required>
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <label>Payment Method *</label>
                                                <select class="form-control" name="payment_method" required>
                                                    <option value="">Select Payment Method</option>
                                                    @forelse ($gateways as $gateway)
                                                        <option value="{{ $gateway->id }}">{{ $gateway->name }}</option>
                                                    @empty
                                                        <option value="">No Data Available</option>
                                                    @endforelse

                                                </select>
                                                @error('payment_method')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <label>Account Details *</label>
                                                <textarea class="form-control" placeholder="Enter your payment account details" name="account_info" rows="8"
                                                    required></textarea>
                                                @error('account_info')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-xl-12 mt-3">
                                            <div class="wsus__dash_pro_single">
                                                <button type="submit" class="common_btn">Submit Request</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


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
