@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Video Section Management</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.video-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Image Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Image</h3>
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
                                    @if (!empty(@$section->image))
                                    <img id="showImage" src="{{ asset(@$section->image) }}" 
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
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Video URL</label>
                                <input type="url" name="video_url" value="{{ old('video_url', @$section->video_url) }}" 
                                       class="form-control" placeholder="e.g. Welcome">
                                @error('video_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                     
                        </div>
                    

                    </div>

                           <div class="col-md-12 mb-3">
                                <label class="form-label">Description</label>
                                 <textarea name="description" class="form-control summernote" rows="5">{{ old('description', @$section->description) }}</textarea>
                                   
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                    <div class="row">
                            <div class="col-md-6 mb-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="button_text" value="{{ old('button_text', @$section->button_text) }}" 
                                   class="form-control" placeholder="Supporting description">
                            @error('button_text')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>




                              <div class="col-md-6 mb-3">
                            <label class="form-label">Button URL</label>
                            <input type="url" name="button_url" value="{{ old('button_url', @$section->button_url) }}" 
                                   class="form-control" placeholder="Supporting description">
                            @error('button_url')
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