@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Custom Page Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.custom-page-builder.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <!-- Image Upload -->
                         

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                              <div class="col-md-12 mb-3">
                                <label class="form-label">Content</label>
                               <textarea name="content" class="form-control summernote" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                              








                                 <div class="col-md-6 mb-3">
                                <label class="form-label">SEO Title</label>
                                <input type="text" name="seo_title" value="{{ old('seo_title') }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('seo_title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                                 <div class="col-md-12 mb-3">
                                <label class="form-label">SEO Description</label>
                                <textarea name="seo_description" class="form-control summernote" rows="5">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            
                         

                            <!-- Status Field -->

                               <div class="col-md-6 mb-3">
                                <label class="form-label">Show At Nav</label>
                                <select name="show_at_nav" class="form-select">
                                    <option value="">Select</option>
                                    <option value="yes" {{ old('show_at_nav') == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ old('show_at_nav') == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('show_at_nav')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



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