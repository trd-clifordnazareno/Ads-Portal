<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<center>
<div id="notification"></div>
<div style="width: 500px;
     margin-left: 268px;">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Transits (Bus/Jeepney)</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div id="add_on_panel"></div>
                <div class="form-group" ng-int="client_contract_id">
                    <label for="exampleInputEmail1">Plate Number</label>
                    <!--<input type="text" class="form-control" id="" placeholder="Location Name" ng-model="location_name">-->
                    <input type="text" class="form-control" id="" placeholder="Plate Number" value="" ng-model="transit_plate_number">
                </div>
                
                
                <!--<button type='button' ng-click="regester_contract_location_details()">Save</button><br>-->
                
                <label for="exampleInputEmail1">Select Type of Transit</label></br>
                <input type="text" list="transit" style="height: 30px;width: 50%;" placeholder="   Transit Name" ng-model="transit_type"/>
                        <datalist id="transit">
                            <option value="Bus">Bus</option>
                            <option value="jeepney">Jeep</option>
                        </datalist>   

                <!-- /.card-body -->

                <div class="card-footer">
                    <!--<button type="submit" class="btn btn-primary" ng-click="regester_location_details()">Submit</button>-->
                    <button type="submit" class="btn btn-primary" ng-click="regester_transit()">Submit</button>
                </div>
                <!--{{albumNameArray}}-->
            </div>
        </form>

    </div>
</div>
</center>
