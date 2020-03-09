<div style="width: 500px;
     margin-left: 190px;">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Regester Clients</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div id="add_on_panel"></div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Client Name</label>
                    <input type="text" class="form-control" id="" placeholder="Client Name" ng-model="client_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contact Number</label>
                    <input type="text" class="form-control" id="" placeholder="Contact Number" ng-model="contact_number">
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="regester_client_details()">Submit</button>
                </div>
            </div>
        </form>

    </div>

