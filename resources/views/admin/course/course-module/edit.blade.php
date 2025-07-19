@extends('admin.layout.master')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Course Review</h2>
                    <div class="text-muted mt-1">Review and approve/reject course submissions</div>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{ route('admin.course.index') }}" class="btn btn-secondary">Back to Courses</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Course Details Section -->
                        <div class="mb-4">
                            <h3 class="mb-3">Course Details</h3>
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Course Title</label>
                                        <div class="form-control-plaintext">{{ $course->title }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Instructor</label>
                                        <div class="form-control-plaintext">{{ $course->instructor->name }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div class="form-control-plaintext">{{ $course->description }}</div>
                                    </div>
                                </div>
                                
                                <!-- Right Column -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Thumbnail</label>
                                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" class="img-thumbnail w-100" style="max-height: 200px;">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Capacity</label>
                                            <div class="form-control-plaintext">{{ $course->capacity }} students</div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Price</label>
                                            <div class="form-control-plaintext">${{ number_format($course->price, 2) }}</div>
                                        </div>
                                    </div>
                                    
                                    @if($course->discount)
                                    <div class="mb-3">
                                        <label class="form-label">Discount</label>
                                        <div class="form-control-plaintext">{{ $course->discount }}%</div>
                                    </div>
                                    @endif
                                </div>
                                
                                <!-- Full Width Fields -->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Message for Reviewer</label>
                                        <div class="form-control-plaintext">{{ $course->message_for_reviewer ?? 'No message provided' }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="form-control-plaintext">
                                            <span class="badge bg-{{ $course->status == 'active' ? 'success' : 'warning' }} text-white">
                                                {{ ucfirst($course->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Approval Status</label>
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <select name="is_approved" class="form-select" required>
                                            <option value="">Select Action</option>
                                            <option value="pending" @selected($course->is_approved == 'pending')>Pending</option>
                                            <option value="approved" @selected($course->is_approved == 'approved')>Approved</option>
                                            <option value="rejected" @selected($course->is_approved == 'rejected')>Rejected</option>
                                        </select>
                                        @error('is_approved')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                                Update Status
                            </button>
                            
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection