@extends('admin.footer.layout.master')
@section('settings-content')
        <h4>Manage Footer</h4>
            <form action="{{ route('admin.footer-info.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    


           
                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                               <div class="col-md-6 mb-3">
                                <label class="form-label">Copyright</label>
                                <input type="text" name="copyright" value="{{ @$footer->copyright }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('copyright')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" value="{{ @$footer->phone }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                                      <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" rows="3" class="form-control" placeholder="e.g. Active Learners">{{ @$footer->address }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                  <div class="col-md-6 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="desc" rows="3" class="form-control" placeholder="e.g. Active Learners">{{ @$footer->desc }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>




                          

                         





                              <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" value="{{ @$footer->email }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('email')
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