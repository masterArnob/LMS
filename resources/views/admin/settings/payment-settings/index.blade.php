@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Payment Settings</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
<div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a href="#paypal" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                          Paypal</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a href="#stripe" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                        
                          Stripe</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a href="#ssl" class="nav-link" data-bs-toggle="tab" aria-selected="true" role="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                        
                          SSLCommerz</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active show" id="paypal" role="tabpanel">
                        @include('admin.settings.payment-settings.parts.paypal-form')
                      </div>
                      <div class="tab-pane" id="stripe" role="tabpanel">
                        @include('admin.settings.payment-settings.parts.stripe-form')
                      </div>
                      <div class="tab-pane" id="ssl" role="tabpanel">
                         @include('admin.settings.payment-settings.parts.ssl-form')
                     
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
</div>
@endsection
