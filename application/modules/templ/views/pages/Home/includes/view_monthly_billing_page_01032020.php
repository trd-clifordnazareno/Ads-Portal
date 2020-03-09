

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
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                No.Units</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                Contract Code</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                Subcription From</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                Subscription To</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Contract Billing</th>

<!--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>-->

                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{client_name}}
                            </td>
                            <td class="sorting_1">
                                {{no_unit}}
                            </td>
                            <td class="sorting_1">
                                {{contract_number}}
                            </td>
                            <td class="sorting_1">
                                {{date_from_billing_period}}
                            </td>
                            <td class="sorting_1">
                                {{date_to_billing_period}}
                            </td>
                            <td class="sorting_1">
                                {{contract_billing}} 100.00.00
                            </td>
                        </tr>
                        


                <!--<tr role="row" class="odd" ng-repeat="x in myWelcome | filter:search">
                  <td class="sorting_1">{{x.client_name}}</td>
                  <td>{{x.no_unit}}</td>
                  <td>{{x.contract_number}}</td>
                  <td>{{x.date_from_billing_period}}</td>
                  <td>{{x.date_to_billing_period}}</td>
                  <td><a href="" ng-click="delete_client_contract(x.contract_client_id)">DELETE <?php echo $modal_id; ?></a> <a href="" ng-click="view_client_contract_details_page(x.contract_client_id)"> &nbsp&nbsp&nbsp UPDATE</a>
                      
                      
                      
                      
                      
                      <div class="btn-group">
                    &nbsp&nbsp&nbsp<button type="button" class="btn btn-info">Locations</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="#" ng-click="add_new_contract_location(x.contract_client_id)">Add</a>
                        
                        <!--<a class="dropdown-item" href="#">Something else here</a>-->
                    <div class="dropdown-divider"></div>
                    <!--<a class="dropdown-item" href="#">Separated link</a>-->
                    <!--<a class="dropdown-item" href="#" ng-click="view_client_contract_locations(x.contract_client_id)">View</a>-->
            </div>
            </button>
        </div>

        <!--<div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" ng-click="get_name(x.client_name)">Launch Large Modals
            </button>
        </div>-->
        <!--</td>
        <td><a href="" ng-click="view_monthly_billing(x.client_name, x.no_unit, x.contract_number, x.date_from_billing_period, x.date_to_billing_period, x.contract_client_id)">Open</a></td>
        
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
        <!--</tr>-->



        </tbody>


    </div>
    
    
    
    
    <div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                SOA Ref </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                Billing From</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                Billing To</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>

<!--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>-->

                    </thead>
                    <tbody>
                        
                        <tr role="row" class="odd" ng-repeat="x in view_monthly_billing_model | filter:search">
                        <td class="sorting_1">
                                {{x.soa}}
                            </td>
                            <td class="sorting_1">
                                {{x.monthly_start_billing}}
                            </td>
                            <td class="sorting_1">
                                {{x.monthly_end_billing}}
                            </td>
                            <td class="sorting_1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="btn-group">
                                                &nbsp&nbsp&nbsp<button type="button" class="btn btn-info">Locations</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="#" ng-click="add_new_contract_location(x.client_contract_id)">Add</a>

                                                        <!--<a class="dropdown-item" href="#">Something else here</a>-->
                                                        <div class="dropdown-divider"></div>
                                                        <!--<a class="dropdown-item" href="#">Separated link</a>-->
                                                        <a class="dropdown-item" href="#" ng-click="view_client_contract_locations(x.client_contract_id, x.monthly_start_billing, x.monthly_end_billing)">View</a>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo base_url(); ?>/Uploads/pdf/{{x.monthly_start_billing}}_to_{{x.monthly_end_billing}}_{{client_given_name}}.pdf">DOWNLOAD</a>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </td>
                        </tr>


                <!--<tr role="row" class="odd" ng-repeat="x in myWelcome | filter:search">
                  <td class="sorting_1">{{x.client_name}}</td>
                  <td>{{x.no_unit}}</td>
                  <td>{{x.contract_number}}</td>
                  <td>{{x.date_from_billing_period}}</td>
                  <td>{{x.date_to_billing_period}}</td>
                  <td><a href="" ng-click="delete_client_contract(x.contract_client_id)">DELETE <?php echo $modal_id; ?></a> <a href="" ng-click="view_client_contract_details_page(x.contract_client_id)"> &nbsp&nbsp&nbsp UPDATE</a>
                      
                      
                      
                      
                      
                      <div class="btn-group">
                    &nbsp&nbsp&nbsp<button type="button" class="btn btn-info">Locations</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" href="#" ng-click="add_new_contract_location(x.contract_client_id)">Add</a>
                        
                        <!--<a class="dropdown-item" href="#">Something else here</a>-->
                    <div class="dropdown-divider"></div>
                    <!--<a class="dropdown-item" href="#">Separated link</a>-->
                    <!--<a class="dropdown-item" href="#" ng-click="view_client_contract_locations(x.contract_client_id)">View</a>-->
            </div>
            </button>
        </div>

        <!--<div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" ng-click="get_name(x.client_name)">Launch Large Modals
            </button>
        </div>-->
        <!--</td>
        <td><a href="" ng-click="view_monthly_billing(x.client_name, x.no_unit, x.contract_number, x.date_from_billing_period, x.date_to_billing_period, x.contract_client_id)">Open</a></td>
        
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
        <!--</tr>-->



        </tbody>


    </div>













