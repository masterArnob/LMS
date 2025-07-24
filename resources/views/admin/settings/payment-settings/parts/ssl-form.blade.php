    <h4>SSLCommerz Config</h4>
            <form action="{{ route('admin.topbar-section.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
             

                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="" 
                                       class="form-control" placeholder="e.g. Web Development">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" value="" 
                                       class="form-control" placeholder="e.g. 5000+">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Offer Name</label>
                                <input type="text" name="offer_name" value="" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('offer_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                               <div class="col-md-6 mb-3">
                                <label class="form-label">Offer Short Description</label>
                                <input type="text" name="offer_short_description" value="" 
                                       class="form-control" placeholder="e.g. About Our Platform">
                                @error('offer_short_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

               

                   

                    <!-- Button & Video Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Button</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="offer_button_text" value="" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('offer_button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Button URL</label>
                                <input type="url" name="offer_button_url" value="" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('offer_button_url')
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