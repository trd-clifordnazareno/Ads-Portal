<div class="card">
            <div class="card-header">
                <h3 class="card-title"><h1 style="margin-left: 39%;"><font color="blue">{{client_name}}</font></h1><!--DataTable with minimal features &amp; hover style--></h3>
            </div>
    <div id="no_data_available">
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row"><div class="col-sm-12 col-md-6"></div>
                      <div class="col-sm-12 col-md-6"></div>
                      
                  </div>
                  <div class="row"><div class="col-sm-12">
                          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{type_of_ads_number}}</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{type_of_ads_requested}}</th>
                    </thead>
                <tbody>
                
                    <tr role="row" class="odd" ng-repeat="transit in view_transits_requested">
                  <td class="sorting_1">{{transit.plate_number}}</td>
                  <td>{{transit.type_of_transit}}</td>
                  
                </tr>
                </tbody>
                
              </table></div></div></div>
            </div>
            <!-- /.card-body -->
          </div>
{{msg}}