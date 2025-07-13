@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">About Section</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.about-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Main Image Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Main Image</h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-2">
                                    <img id="showImage_one" src="{{ asset(@$about->image) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_one" name="image" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Round Text & Stats</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Round Text</label>
                                <input type="text" name="rounded_text" value="{{ old('rounded_text', @$about->rounded_text) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('rounded_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Learner Count</label>
                                <input type="text" name="lerner_count" value="{{ old('lerner_count', @$about->lerner_count) }}" 
                                       class="form-control" placeholder="e.g. 5000+">
                                @error('lerner_count')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Learner Count Text</label>
                                <input type="text" name="lerner_count_text" value="{{ old('lerner_count_text', @$about->lerner_count_text) }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('lerner_count_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Learner Image Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Learner Image</h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-2">
                                    <img id="showImage_two" src="{{ asset(@$about->lerner_image) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upload Learner Image</label>
                                    <input type="file" id="image_two" name="lerner_image" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('lerner_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Content</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title', @$about->title) }}" 
                                       class="form-control" placeholder="e.g. About Our Platform">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control summernote" rows="5">{{ old('long_description', @$about->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Button & Video Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Button & Video</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="button_text" value="{{ old('button_text', @$about->button_text) }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button URL</label>
                                <input type="url" name="button_url" value="{{ old('button_url', @$about->button_url) }}" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('button_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Video URL</label>
                                <input type="url" name="video_url" value="{{ old('video_url', @$about->video_url) }}" 
                                       class="form-control" placeholder="e.g. https://youtube.com/embed/abc123">
                                @error('video_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Video Image Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Video Thumbnail</h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-2">
                                    <img id="showImage_three" src="{{ asset(@$about->video_image) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upload Video Thumbnail</label>
                                    <input type="file" id="image_three" name="video_image" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('video_image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-footer mt-4">
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
