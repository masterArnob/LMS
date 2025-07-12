@extends('admin.layout.master')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Feature Section</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.features.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Text Content Section -->
                    <div class="mb-4">
                       
                        <div class="row">
                            <!-- Image Upload -->
                            <div class="col-md-12 mb-3">
                               
                                   <img id="showImage_one" src="{{ asset(@$feature->image_one) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                      <h3 class="">Feature 1</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_one" name="image_one" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image_one')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title One</label>
                                <input type="text" name="title_one" value="{{ old('title_one', @$feature->title_one) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_one')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                          
                               <div class="col-md-6 mb-3">
                                <label class="form-label">Sub Title One</label>
                                <input type="text" name="subtitle_one" value="{{ old('subtitle_one', @$feature->subtitle_one) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('subtitle_one')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>





                              <div class="col-md-12 mb-3">
                                 
                                   <img id="showImage_two" src="{{ asset(@$feature->image_two) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                     <h3 class="">Feature 2</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_two" name="image_two" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image_two')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title Two</label>
                                <input type="text" name="title_two" value="{{ old('title_two', @$feature->title_two) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_two')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                               <div class="col-md-6 mb-3">
                                <label class="form-label">Sub Title Two</label>
                                <input type="text" name="subtitle_two" value="{{ old('subtitle_two', @$feature->subtitle_two) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('subtitle_two')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>





                             <div class="col-md-12 mb-3">
                                  
                                   <img id="showImage_three" src="{{ asset(@$feature->image_three) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                     <h3 class="">Feature 3</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_three" name="image_three" class="form-control" >
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('image_three')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title Three</label>
                                <input type="text" name="title_three" value="{{ old('title_three', @$feature->title_three) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('title_three')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                               <div class="col-md-6 mb-3">
                                <label class="form-label">Sub Title Three</label>
                                <input type="text" name="subtitle_three" value="{{ old('subtitle_three', @$feature->subtitle_three) }}" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('subtitle_three')
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