<div id="notification"></div>
<center>
<div style="width: 500px;
     /*margin-left: 26%;*/">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Register Clients Contract</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div id="add_on_panel"></div><?php echo $navigation_page; ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Client Name</label>
                    <input type="text" class="form-control" id="" placeholder="Client Name" ng-model="client_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contract Number</label>
                    <input type="text" class="form-control" id="" placeholder="Contact Number" ng-model="contract_number">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Subscription Date From :</label>
                    <input type="date" class="form-control" id="" placeholder="" ng-model="date_from_billing_period">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Subscription Date To :</label>
                    <input type="date" class="form-control" id="" placeholder="" ng-model="date_to_billing_period">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NO. Units</label>
                    <input type="text" class="form-control" id="" placeholder="NO. Units" ng-model="no_units">
                </div>
                <!--<div class="form-group">
                    <label for="exampleInputPassword1">Contract Code</label>
                    <input type="text" class="form-control" id="" placeholder="SOA" ng-model="soa">
                </div>-->


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" ng-click="regester_client_account()">Submit</button>
                </div>
            </div>
        </form>

    </div>

</center>