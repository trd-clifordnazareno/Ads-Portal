

<form class="form-horizontal">
                <div class="card-body" style="
    align-items: center;
    /*margin-left: 230px;*/
">
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Search:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Search here" ng-model="search" style="margin-left: -30px;">
                    </div>
                  </div>
                  
                  
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
              </form>


<div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                Client Name</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>
                </thead>
                <tbody>

                <tr role="row" class="odd" ng-repeat="x in location_data | filter:search">
                  <td class="sorting_1">{{x.location_name}}</td>
                  <td><a href="" ng-click="delete_location(x.location_id)">DELETE <?php echo $modal_id;?></a> 
                      <!--<a href="" ng-click="update_location(x.location_id)"> &nbsp&nbsp&nbsp UPDATE</a>-->
                      
                      
                      
                      
                      
                      
                      
                      <!--<div>
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" ng-click="get_name(x.client_name)">Launch Large Modals
                          </button>
                      </div>-->
                  </td>
                  <!-- use this if you are using button for modal -->
            <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  Launch Large Modals
                </button>-->
                    <!--<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Large Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>One fine body… {{msg}} </p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      <!--</div>
                      <!-- /.modal-dialog -->
                    <!--</div>-->
                    <!-- /.modal -->
                </tr>
                
                
                
                </tbody>
                
              
            </div>



            

      

    





{{data}}