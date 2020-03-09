{{msg}}
<p ng-model="m"></p>


<div class="card">
    <div class="card-header">
        <h3 class="card-title"><!--DataTable with default features--></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length">
                        <h1 style="margin-left: 30px;">CLIENT NAME : <font color="blue">{{client_name_contract}}</font></h1>
                        <!--<div ng-repeat="x in client_contract_locations" ng-if="$index < 1">
                            <div ng-repeat="toa in type_of_ads">
                                <button type="button" class="btn btn-info" ng-click="add_new_type_requested_ads(x.client_contract_id, x.location_id, toa.type_of_ads_id)">{{toa.type_of_ads_serveces}} sdsdsd</button>
                            </div>
                        </div>-->
                    </div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter">
                            <!--<label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>-->
                    </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 234px;">Client Contract ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 298px;">Location Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 298px;">Actions</th>

                        </thead>
                        <tbody>
                            <tr role="row" class="odd" ng-repeat="x in client_contract_locations">
                                <td class="sorting_1">{{x.client_contract_id}}</td>
                                <td>{{get_location_name(x.location_id)}}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-block btn-danger" ng-click="delete_client_contract_location(x.client_contract_id, x.location_id)">Delete</button>
                                            </div>
                                            <div class="col-sm-3" ng-repeat="toa in type_of_ads">
                                                <div class="btn-group">
                                                    &nbsp&nbsp&nbsp<button type="button" class="btn btn-info">{{toa.type_of_ads_serveces}}</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="#" ng-click="add_new_type_requested_ads(x.client_contract_id, x.location_id, toa.type_of_ads_id)">{{toa.type_of_ads_serveces}} Add</a>

                                                            <!--<a class="dropdown-item" href="#">Something else here</a>-->
                                                            <div class="dropdown-divider"></div>
                                                            <!--<a class="dropdown-item" href="#">Separated link</a>-->
                                                            <a class="dropdown-item" href="#" ng-click="view_type_of_ads(x.client_contract_id, x.location_id, toa.type_of_ads_id)">{{toa.type_of_ads_serveces}} View</a>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                            </tr></tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>