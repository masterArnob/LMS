@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Course Category Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <!-- Image Upload -->
                            <div class="col-md-12 mb-3">
                                   <img id="showImage" src="" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image" name="image" class="form-control" id="image">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Icon Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Icon</label>
                                <input type="text" name="icon" value="{{ old('icon') }}" 
                                       class="form-control" placeholder="e.g. fas fa-code">
                                @error('icon')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <p>Copy thr svg from <a href="https://tabler.io/icons">here</a></p>
                            </div>

                            <!-- Trending Option -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Show at Trending?</label>
                                <select name="show_at_trending" class="form-select">
                                    <option value="">Select</option>
                                    <option value="yes" {{ old('show_at_trending') == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ old('show_at_trending') == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('show_at_trending')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Select</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">
                          
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection