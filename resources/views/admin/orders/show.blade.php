@extends('admin.layout.master')
@section('content')
      <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Invoice
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                  <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                  Print Invoice
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card card-lg">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <p class="h3">{{ config('settings.site_name') }}</p>
                    <address>
                      {{ config('settings.location') }}<br>
                      {{ config('settings.phone') }}<br>
                      {{ config('settings.email') }}<br>
              
                    </address>
                  </div>
                  <div class="col-6 text-end">
                    <p class="h3">{{ $order->user->name }}</p>
                    <address>
                      {{ $order->user->address }}<br>
                      +{{ $order->user->contact }}<br>
                      {{ $order->user->email }}
                    </address>
                  </div>
                  <div class="col-12 my-5">
                    <h1>Invoice #{{ $order->invoice_id }}</h1>
                    <label for="">Transaction ID #{{ $order->transaction_id }}</label><br>
                    <label for="">Payment Method: {{ $order->payment_method }}</label><br>
                     <label for="">Payment Status: {{ $order->status }}</label>

                  </div>
                </div>
                <table class="table table-transparent table-responsive">
                  <thead>
                  <tr>
                      <th class="text-center" style="width: 1%">#</th>
                      <th style="width: 5%">Course</th>
                      <th style="width: 5%">Instructor</th>
                      <th class="text-center" style="width: 1%">Qnt</th>
                      <th class="text-end" style="width: 1%">Unit</th>
                  
                    </tr>
                  </thead>

                  @forelse ($order->orderItems as $item)
                           <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                      <p class="strong mb-1"><a href="{{ route('course.details', $item->course->slug) }}">{{ $item->course->title }}</a></p>
                    </td>
                    <td>
                        {{ $item->course->instructor->name }}
                    </td>
                    <td class="text-center">
                      {{ $item->qty }}
                    </td>
                    <td class="text-end">${{ $item->price }}</td>
            
                   
                  </tr>
                  @empty
                      <tr>
                          <td colspan="5" class="text-center">No Data Available</td>
                      </tr>
                  @endforelse
             
                
                  <tr>
                    <td colspan="4" class="strong text-end">Subtotal</td>
                    <td class="text-end">${{ $order->total_amount }}</td>
                  </tr>
            
               
                  <tr>
                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total</td>
                    <td class="font-weight-bold text-end">${{ $order->paid_amount }}</td>
                  </tr>
                </table>
                <p class="text-secondary text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                  you again!</p>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta20
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
@endsection