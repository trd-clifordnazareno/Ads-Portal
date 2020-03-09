<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SOA / REF</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Clinet Contract Number" ng-model="soa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Billing Date</label>
                    <input type="date" class="form-control" id="" placeholder="" ng-model="start_billing">
                  </div>
                  <div class="form-group">
                      <div class="form-group">
                    <label for="exampleInputPassword1">End Billing Date</label>
                    <input type="date" class="form-control" id="" placeholder="" ng-model="end_billing">
                      </div>
                    <div class="form-group">
                    <label for="exampleInputFile">Upload PDF</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <!--<input type="file" class="custom-file-input" id="exampleInputFile">-->
                          
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <input type="file" name="images[]" class="custom-file-input" multiple id="upload_pdf"/>
                      </div>
                      <!--<div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>-->
                    </div>
                  </div>
                  </div>
                  
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" ng-click="save_and_upload('upload_pdf')">Submit</button>
                </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>