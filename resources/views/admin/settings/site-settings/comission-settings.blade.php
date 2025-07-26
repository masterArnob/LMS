@extends('admin.settings.site-settings.layout.master')
@section('settings-content')
        <h4>Commission Settings</h4>
            <form action="{{ route('admin.comission-settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    


                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                               <div class="col-md-6 mb-3">
                                <label class="form-label">Instructor Commission Rate Per Sale (%)</label>
                                <input type="number" name="comission_rate" value="{{ config('settings.comission_rate') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('comission_rate')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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