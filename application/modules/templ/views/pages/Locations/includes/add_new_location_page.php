<div style="width: 500px;
     margin-left: 268px;">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Regester Location</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div id="add_on_panel"></div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Location Name</label>
                    <input type="text" class="form-control" id="" placeholder="Location Name" ng-model="location_name">
                </div>
                
                
                        

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="regester_location_details()">Submit</button>
                </div>
            </div>
        </form>

    </div>

    <ul>
    <li ng-repeat="x in myWelcome">
      <input type="checkbox" ng-model="x.selected" value={{x.client_name}} /> {{x.client_name}}
    </li>
  </ul>
                <!--<button type='button' ng-click="save()">Save</button><br>-->
                {{albumNameArray}}