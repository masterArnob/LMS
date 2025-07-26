@extends('admin.settings.site-settings.layout.master')
@section('settings-content')
        <h4>Logo Settings</h4>
            <form action="{{ route('admin.logo-settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    


                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                                    <div class="col-md-12 mb-3">
                               
                                   <img id="showImage_one" src="{{ asset(config('settings.site_logo')) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                      <h3 class="">Site Logo</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_one" name="site_logo" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('site_logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>




                                 <div class="col-md-12 mb-3">
                               
                                   <img id="showImage_two" src="{{ asset(config('settings.site_footer_logo')) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                      <h3 class="">Site Footer Logo</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_two" name="site_footer_logo" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('site_footer_logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                                <div class="col-md-12 mb-3">
                               
                                   <img id="showImage_three" src="{{ asset(config('settings.site_favicon')) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                      <h3 class="">Site Favicon</h3>
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" id="image_three" name="site_favicon" class="form-control">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('site_favicon')
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
@endsection