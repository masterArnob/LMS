    <h4>SSLCommerz Config</h4>
            <form action="{{ route('admin.payment-settings.ssl-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
           
                    
             










                    <!-- Round Text & Stats Section -->
                    <div class="mb-4">
            
              
                        <div class="row">
                            <div class="col-md-6 mb-3">
                           

                                <label class="form-label">SSLCommerz Mode</label>
                                <select name="SSLCZ_TESTMODE" class="form-control">
                                 
                                    <option value="">Select</option>
                                    <option @selected(config('gatewaySettings.SSLCZ_TESTMODE') == 'true') value="true">Sandbox</option>
                                    <option @selected(config('gatewaySettings.SSLCZ_TESTMODE') == 'false') value="false">Live</option>
                                </select>
                                @error('PAYPAL_MODE')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label">SSLCommerz Rate</label>
                                <input type="text" name="SSLCZ_RATE" value="{{ config('gatewaySettings.SSLCZ_RATE') }}" 
                                       class="form-control" placeholder="e.g. Active Learners">
                                @error('SSLCZ_RATE')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                    
                        </div>
                    </div>

               

                   

                    <!-- Button & Video Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">ID & Secret</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">SSLCommerz Store ID</label>
                                <input type="text" name="SSLCZ_STORE_ID" value="{{ config('gatewaySettings.SSLCZ_STORE_ID') }}" 
                                       class="form-control" placeholder="e.g. Get Started">
                                @error('SSLCZ_STORE_ID')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">SSLCommerz Store Password</label>
                                <input type="text" name="SSLCZ_STORE_PASSWORD" value="{{ config('gatewaySettings.SSLCZ_STORE_PASSWORD') }}" 
                                       class="form-control" placeholder="e.g. https://example.com/register">
                                @error('SSLCZ_STORE_PASSWORD')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>



                                 <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                   <select name="ssl_status" class="form-control">
                                   
                                    <option value="">Select</option>
                                    <option @selected(config('gatewaySettings.ssl_status') == 'enable') value="enable">Enable</option>
                                    <option @selected(config('gatewaySettings.ssl_status') == 'disable') value="disable">Disable</option>
                                </select>
                                @error('ssl_status')
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