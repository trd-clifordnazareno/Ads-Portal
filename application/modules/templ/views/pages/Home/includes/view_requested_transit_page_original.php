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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>
                    
                </thead>
                <tbody>
                
                    <tr role="row" class="odd" ng-repeat="transit in view_transits_requested">
                  <td class="sorting_1">{{transit.plate_number}}</td>
                  <td>{{transit.type_of_transit}}</td>
                  <td>
                      <!--<?php //echo validation_errors();?>
                        <?php //echo form_open_multipart('admin/type_of_ads/multiple_files');?>
                        <p><input type="file" multiple="multiple" name="image_name[]" class="form-control" style="width:30%;"/></p>

                        <input type="submit" class="btn btn-success btn-block" style="width:30%;" value="Upload"/> 
                        </form>-->
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-md-3">
                                  <input type="file" name="images[]" class="{{transit.plate_number}}" multiple id="{{transit.plate_number}}"/><!--multiple ng-model="aaa"-->
                              </div>
                              <div class="col-md-9">
                                  <button class="btn btn-success btn-block" style="width:30%; margin-top: 3px;" value="Upload" ng-click="save_photo(client_name, transit.type_of_transit, transit.plate_number)">Upload</button>
                              </div>
                          </div>
                      </div>
                      
                      
                  </td>
                  
                </tr>
                </tbody>
                
              </table></div></div></div>
            </div>
            <!-- /.card-body -->
          </div>
{{msg}}
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Bootstrap Duallistbox</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Multiple</label>
                  <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick"> <div class="box1 col-md-6">   <label for="bootstrap-duallistbox-nonselected-list_" style="display: none;"></label>   <span class="info-container">     <span class="info">Showing all 2</span>     <button type="button" class="btn btn-sm clear1" style="float:right!important;">show all</button>   </span>   <input class="form-control filter" type="text" placeholder="Filter">   <div class="btn-group buttons">     <button type="button" class="btn moveall btn-outline-secondary" title="Move all">&gt;&gt;</button>        </div>   <select multiple="multiple" id="bootstrap-duallistbox-nonselected-list_" name="_helper1" style="height: 102px;"><option>Texas</option><option>Washington</option></select> </div> <div class="box2 col-md-6">   <label for="bootstrap-duallistbox-selected-list_" style="display: none;"></label>   <span class="info-container">     <span class="info">Showing all 5</span>     <button type="button" class="btn btn-sm clear2" style="float:right!important;">show all</button>   </span>   <input class="form-control filter" type="text" placeholder="Filter">   <div class="btn-group buttons">          <button type="button" class="btn removeall btn-outline-secondary" title="Remove all">&lt;&lt;</button>   </div>   <select multiple="multiple" id="bootstrap-duallistbox-selected-list_" name="_helper2" style="height: 102px;"><option selected="" data-sortindex="0">Alabama</option><option data-sortindex="4">Alaska</option><option data-sortindex="1">California</option><option data-sortindex="2">Delaware</option><option data-sortindex="3">Tennessee</option></select> </div></div><select class="duallistbox" multiple="multiple" style="display: none;">
                    <option selected="" data-sortindex="0">Alabama</option>
                    <option data-sortindex="4">Alaska</option>
                    <option data-sortindex="1">California</option>
                    <option data-sortindex="2">Delaware</option>
                    <option data-sortindex="3">Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>



