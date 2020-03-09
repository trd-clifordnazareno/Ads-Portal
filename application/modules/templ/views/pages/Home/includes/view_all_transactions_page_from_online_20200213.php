<!--<div ng-repeat="x in msg">{{x.saved_photo_id}}</div>
{{msg}}
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
{{loc}}-->
<style>
.double {
  zoom: 2;
  transform: scale(3);
  -ms-transform: scale(3);
  -webkit-transform: scale(3);
  -o-transform: scale(3);
  -moz-transform: scale(3);
  transform-origin: 0 0;
  -ms-transform-origin: 0 0;
  -webkit-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
}




.chkbx {
  zoom: 2;
  transform: scale(1);
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  -o-transform: scale(1);
  -moz-transform: scale(1);
  transform-origin: 0 0;
  -ms-transform-origin: 0 0;
  -webkit-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
}
}
</style>
<center><img src="<?php echo base_url();    ?>scripts/rmn.png" style="width: 390px; margin-top: -1px;">
<div id="success_transfer_photo"></div>
</center>
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Client Name  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp- {{client_name}}</b></h3></br>
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Start Of Billing &nbsp&nbsp- {{start_date_billing}}</b></h3></br>
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>End Of Billing &nbsp&nbsp&nbsp&nbsp- {{end_date_billing}}</b></h3></br>
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Number Of Units &nbsp&nbsp&nbsp- {{no_of_units}}</b></h3> </br>
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Number Of Approves - {{no_of_success}}</b></h3></br>
<h3 style="margin-left: 90px; /*position: absolute;*/ margin-bottom: -10px; font-family: monospace;"><b >Number Of Pending &nbsp- {{no_of_units - no_of_success}}</b></h3></br>

<div ng-if="no_of_units == no_of_success">
<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Prepared By &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp- <span style="/*text-decoration-line: underline; text-decoration-style: solid;*/">Ivy Sanchez</span></b></h3></br>
<div><p style="margin-left: 30%; margin-bottom: -10px; font-family: monospace; margin-top: -9; font-size: x-large; font-weight: 900; color: red;">Accounting Officer</p></div>
<!--<h3 style="margin-left: 90px; margin-bottom: -10px; font-family: monospace;"><b>Approved By : {{usersname}}</b></h3></br>-->
</div>



</br>
<div ng-if="no_of_units != no_of_success">
</div>
<div style="margin-top:13px; margin-left: 5%;" id="demo"><input type="checkbox" ng-click="toggleAll()" class="chkbx" ng-model="isAllSelected"> <div style="margin-left: 30; position: absolute; margin-top: -1.5%;">Select all &nbsp&nbsp&nbsp&nbsp<button ng-click="approve()" class="btn btn-success" style="margin-top:-19px;">Approve All</button></div></div>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div id="print_hide"><button class="btn btn-success" ng-click="printfunction()" ng-if="no_of_units == no_of_success" style="margin-left: 30px;">Print</button></div>



<!--new-->
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div id="print_hide"><button class="btn btn-success" ng-click="printDiv()" ng-if="no_of_units == no_of_success" style="margin-left: 30px;">Print Text</button></div>

<!-- new-->

<div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table border="1" id="example2" class="table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:19%;"><center>Index</center></th>
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:19%;"><center>Location Name</center></th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width:13%; height:30px;"><center>Plate Number</center></th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"><center>Photos</center></th>
                <!--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Engine version</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
                </thead>-->
                <tbody>
                
                <tr role="row" class="odd" ng-repeat="x in loc">
                    
                    
                    <td ng-init="count = 1">
                  
                  <div ng-repeat="client in msg">
                        <div ng-if="client.location_id == x.location_id" style="margin-bottom: 591px; font-size: xx-large;">
                        {{count + $index}}
                        </div>
                    
                    </div>
                    </td>
                    
                  <td class="sorting_1">
                  
                  <div ng-repeat="client in msg">
                        <div ng-if="client.location_id == x.location_id" style="height: 600px; font-size: xx-large;">
                        <center>{{x.location_name}}</center>
                        </div>
                    
                    </div>
                  
                  
                  </td>
                  <td>
                  
                  <div ng-repeat="client in msg">
                        <div ng-if="client.location_id == x.location_id" style="height: 600px; font-size: xx-large;">
                        <center>{{client.item_number}}</center>
                        </div>
                    
                    </div>
                    </td>
                  <td><div style="margin-left: 100px;">
                  <div ng-repeat="client in msg">
                        <div ng-if="client.location_id == x.location_id">
                        




                        <!---->
                        <div class="container" style="height: 600px">
                             <div class="row">
                                                    <div class="col-sm-10">
                                                    </br>
                                                    <a href="<?php echo base_url();    ?>/Uploads/2020/{{client_name}}/{{x.location_name}}/{{'transits'}}/{{client.item_number}}/{{client.photo_name}}" target="_blank">
                                                        <img class="img-fluid z-depth-1" src="<?php echo base_url();    ?>/Uploads/2020/{{client_name}}/{{x.location_name}}/{{'transits'}}/{{client.item_number}}/{{client.photo_name}}" alt="video"
                                                                            data-toggle="modal" data-target="#modal{{x.saved_photo_id}}" style="height: 300px;width: 50%;"></a></br>
                                                        {{client.photo_name}}
                                                        <div ng-if="client.returned == 2">
                                                        <div style="margin-top: -21%;margin-left: 1%;font-size: 100px;position: absolute;">&#10004;</div>
                                                        </div>
                                                        <div style="margin-top: -35%;margin-left: 9%;font-size: 190px;position: absolute;" id="show_check{{client.saved_photo_id}}"></div>
                                                        </br> </br>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <!--<div ng-if="client.returned == 0">
                                                            <button ng-click="disapproved_photo(client.saved_photo_id, client.client_contract_id, client.location_id, client.item_number, client.photo_name)" class="btn btn-danger" style="margin-left: 100px;position: absolute;;" id="hide_disapproved_btn{{client.saved_photo_id}}">Disapprove</button>
                                                        </div>-->
                                                        <!--<div ng-if="client.returned == 0 || client.returned == 1 || client.returned == 5">-->
                                                        <div ng-if="client.returned == 0">
                                                        <button ng-click="approved_photo(client.saved_photo_id, client.client_contract_id, client.location_id, client.item_number, client.photo_name)" class="btn btn-success" id="hide_approved_btn{{client.saved_photo_id}}">approve</button>
                                                        </div>




                                                        <div ng-if="client.returned == 0" style="margin-left: 30%;margin-top: -30px;" id="hide_message_btn{{client.saved_photo_id}}">
                                                        <b style="font-size: large;">&nbsp&nbsp&nbsp&nbsp&nbspDisapprove : </b>&nbsp&nbsp&nbsp <input type="checkbox" class="chkbx" ng-model="txt_area">



                                                        <input type="checkbox" name="foo" ng-model="client.selected" class="double" value={{client.photo_name}} style="margin-left:10px; margin-top: -70px; position: absolute;" ng-change="optionToggled()"/> 





                                                        <div id="txt_area" ng-show="txt_area" style="margin-left: -130%;margin-top: 30px;">
                                                      <textarea rows="10" cols="100" ng-model="txt_areas" style="height: 100px; width: 500px; margin-left: 30%;">
                                                        </textarea>
                                                        </br>
                                                        </br>
                                                        <button type="submit" class="btn btn-primary" ng-click="others_function_model(txt_areas, client.saved_photo_id, client.client_contract_id, client.location_id, client.item_number, client.photo_name)" style="margin-left: 300px;">Submit</button>
                                                        </div>
                                                        
                                                        </div>






                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                            
                             </div>
                        </div>
                        <!---->
                        </div>
                    
                    </div></div>
                  </td>
                  
                
                </tr></tbody>
                <tfoot>
                <tr><!--<th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th>-->
                <!--<th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th>--></tr>
                </tfoot>
              </div>
              <table>
                  <tr>
                      <td></br><div id="print_hide_bottom"><button class="btn btn-success" ng-click="printfunctionbottom()" ng-if="no_of_units == no_of_success" style="margin-left: 30px;">Print</button></div></td>
                  </tr>
              </table>