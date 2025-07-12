@extends('admin.layout.master')
@section('content')

<!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Review Instructor Application
                    </h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.instructor-requests.index') }}" class="btn btn-info">
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
                            <img src="{{ asset($instructor->image) }}" class="rounded-circle mb-2" width="120" height="120" style="object-fit: cover;">
                            <h3>{{ $instructor->name }}</h3>
                            <span class="text-white badge bg-{{ $instructor->approve_status == 'approved' ? 'success' : 'danger' }}">
                                {{ ucfirst($instructor->approve_status) }}
                            </span>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <p class="form-control-plaintext">{{ $instructor->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contact</label>
                                        <p class="form-control-plaintext">{{ $instructor->contact ?? 'N/A' }}</p>
                                    </div>
                                </div>


                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Application Date</label>
                                        <p class="form-control-plaintext">{{ date('d M Y', strtotime($instructor->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        
                      
                        </div>
                    </div>

                    <!-- Document Viewer Section -->
                    <div class="mb-4">
                        <h4 class="mb-3">Application Documents</h4>
                        <div class="card">
                            <div class="card-body">
                                @if(!empty($instructor->document))
                                    <div class="row">
                                    
                                        <div class="col-md-12 mb-3">
                                            <div class="document-card border rounded p-3 d-flex justify-content-between">
                                                <div class="d-flex align-items-center mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                        <path d="M9 9l1 0"></path>
                                                        <path d="M9 13l6 0"></path>
                                                        <path d="M9 17l6 0"></path>
                                                    </svg>
                                                    <strong>{{ $instructor->document }}</strong>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ asset($instructor->document) }}" target="_blank" class="mx-2 btn btn-primary">
                                                        View PDF
                                                    </a>
                                                    <a href="{{ asset($instructor->docuemnt) }}" download class="btn btn-info">
                                                        Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        No documents submitted with this application.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('admin.instructor-requests.update', $instructor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h4 class="mb-3">Update Approval Status</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Status</label>
                                    <select class="form-select" name="approve_status">
                                        <option value="pending" @selected($instructor->approve_status == 'pending')>Pending</option>
                                        <option value="approved" @selected($instructor->approve_status == 'approved')>Approved</option>
                                        <option value="rejected" @selected($instructor->approve_status == 'rejected')>Rejected</option>
                                         <option value="banned" @selected($instructor->approve_status == 'banned')>Banned</option>
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