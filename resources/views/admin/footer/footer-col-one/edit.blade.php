@extends('admin.footer.layout.master')
@section('settings-content')
      <div class="d-flex align-items-center justify-content-between mb-4">
          <h4>Manage Footer Column One</h4>
        <a href="{{ route('admin.footer-col-one.index') }}" class="btn btn-primary">Back</a>
      </div>

           <form action="{{ route('admin.footer-col-one.update', $one->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
           
                    


           
                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                               <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ $one->title }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                                 <div class="col-md-6 mb-3">
                                <label class="form-label">URL</label>
                                <input type="url" name="url" value="{{ $one->url }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                        <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                               <select name="status" class="form-control">
                                <option @selected($one->status == 'active') value="active">Active</option>
                                <option @selected($one->status == 'inactive') value="inactive">Inactive</option>
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
                            update
                        </button>
                    </div>
                </form>

@endsection