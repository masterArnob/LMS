@extends('admin.footer.layout.master')
@section('settings-content')
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h4>Manage Footer Social Links</h4>
        <a href="{{ route('admin.footer-social-links.index') }}" class="btn btn-primary">Back</a>
      </div>

           <form action="{{ route('admin.footer-social-links.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    


           
                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                                 <!-- Image Upload -->
                            <div class="col-md-12 mb-3">
                                   <img id="showImage" src="" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px; width: auto;">
                                <div class="form-group">
                                    <label class="form-label">Upload Icon</label>
                                    <input type="file" id="image" name="icon" class="form-control" id="image">
                                    <small class="form-hint">Recommended size: 1920x1080px (JPG, PNG)</small>
                                    @error('icon')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                                 <div class="col-md-6 mb-3">
                                <label class="form-label">URL</label>
                                <input type="url" name="url" value="" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                        <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                               <select name="status" class="form-control">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                               </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                             




                          

                         





                    


                    
                        </div>
                    </div>
               

               

                   

               

           

                    <!-- Form Actions -->
                    <div class="form-footer mt-4">
                        <button type="submit" class="btn btn-primary">
                            save
                        </button>
                    </div>
                </form>

@endsection