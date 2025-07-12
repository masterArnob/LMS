@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Hero Section Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.hero-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Image Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Hero Image</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    @if (!empty(@$hero->image))
                                    <img id="showImage" src="{{ asset(@$hero->image) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                    @else
                                    <img id="showImage" src="https://via.placeholder.com/800x450?text=Hero+Image" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">      
                                    @endif
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Text Content Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Text Content</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Label</label>
                                <input type="text" name="label" value="{{ old('label', @$hero->label) }}" 
                                       class="form-control" placeholder="e.g. Welcome">
                                @error('label')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title', @$hero->title) }}" 
                                       class="form-control" placeholder="Main headline text">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle', @$hero->subtitle) }}" 
                                   class="form-control" placeholder="Supporting description">
                            @error('subtitle')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Call to Action Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Call to Action</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Primary Button Text</label>
                                <input type="text" name="button_text" value="{{ old('button_text', @$hero->button_text) }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Primary Button URL</label>
                                <input type="url" name="button_url" value="{{ old('button_url', @$hero->button_url) }}" 
                                       class="form-control" placeholder="https://example.com/action">
                                @error('button_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Video Button Text</label>
                                <input type="text" name="video_button_text" value="{{ old('video_button_text', @$hero->video_button_text) }}" 
                                       class="form-control" placeholder="e.g. Watch Video">
                                @error('video_button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Video Button URL</label>
                                <input type="url" name="video_button_url" value="{{ old('video_button_url', @$hero->video_button_url) }}" 
                                       class="form-control" placeholder="https://youtube.com/embed/...">
                                @error('video_button_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Banner Information -->
                    <div class="mb-4">
                        <h3 class="mb-3">Banner Information</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Banner Title</label>
                                <input type="text" name="banner_item_title" value="{{ old('banner_item_title', @$hero->banner_item_title) }}" 
                                       class="form-control" placeholder="e.g. 10,000+ Students">
                                @error('banner_item_title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Banner Subtitle</label>
                                <input type="text" name="banner_item_subtitle" value="{{ old('banner_item_subtitle', @$hero->banner_item_subtitle) }}" 
                                       class="form-control" placeholder="e.g. Trusted by thousands">
                                @error('banner_item_subtitle')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Round Text</label>
                            <input type="text" name="round_text" value="{{ old('round_text', @$hero->round_text) }}" 
                                   class="form-control" placeholder="Text for circular animation">
                            @error('round_text')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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