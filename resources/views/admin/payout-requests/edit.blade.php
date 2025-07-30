@extends('admin.layout.master')
@section('content')

<!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Review Instructor Payout Application
                    </h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.payout-request.index') }}" class="btn btn-info">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3 text-center">
                            <img src="{{ asset($request->instructor->image) }}" class="rounded-circle mb-2" width="120" height="120" style="object-fit: cover;">
                            <h3>{{ $request->instructor->name }}</h3>
                            <span class="text-white badge bg-{{ $request->instructor->approve_status == 'approved' ? 'success' : 'danger' }}">
                                {{ ucfirst($request->instructor->approve_status) }}
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <p class="form-control-plaintext">{{ $request->instructor->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact</label>
                                        <p class="form-control-plaintext">{{ $request->instructor->contact ?? 'N/A' }}</p>
                                    </div>
                                </div>


                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Application Date</label>
                                        <p class="form-control-plaintext">{{ date('d M Y', strtotime($request->instructor->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        
                      
                        </div>
                    </div>

                    <!-- Document Viewer Section -->
                    <div class="mb-4">
                        <h4 class="mb-3">Payout Information</h4>
                        <div class="card">
                            <div class="card-body">
                            
                                    <div class="row">
                                    
                                        <div class="col-md-12 mb-3">
                                            <div class="document-card border rounded p-3 d-flex justify-content-between">
                                               Payment Gateway : {{ $request->payoutGateway->name }} <br>
                                               Amount: {{ config('settings.currency_icon') }}{{ $request->amount }} <br>
                                               A/C Informatioon: <br> {!! $request->account_information !!}
                                            </div>
                                        </div>
                                    
                                    </div>
                     
                                    <div class="alert alert-danger">
                                       After Updating the status, you can't revert the status.
                                    </div>
                          
                            </div>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('admin.payout-request.update', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h4 class="mb-3">Update Payout Status</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Transaction ID</label>
                                    <input type="text" class="form-control" name="transaction_id" value="{{ old('transaction_id', $request->transaction_id) }}" placeholder="Enter Transaction ID">
                                    @error('transaction_id')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        
                                    @enderror
                                </div>
                            </div>


                                <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Status</label>
                                    <select class="form-select" name="status" {{ $request->status == 'approved' ? 'disabled' : '' }}>
                                        <option value="pending" @selected($request->status == 'pending')>Pending</option>
                                        <option value="approved" @selected($request->status == 'approved')>Approved</option>
                                        <option value="rejected" @selected($request->status == 'rejected')>Rejected</option>
                                  
                                    </select>
                                    @error('approve_status')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        
                                    @enderror
                                </div>
                            </div>
                    
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .document-card {
        transition: all 0.2s ease;
    }
    .document-card:hover {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transform: translateY(-2px);
    }
</style>
@endpush