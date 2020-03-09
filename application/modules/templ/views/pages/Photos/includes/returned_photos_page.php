
</br><center>
<div id="success_transfer_photo"></div><div class="container my-4" id="scroll">
                                        <div class="row"> 
                                        <div class="col-lg-3 col-md-2 mb-4" ng-repeat="x in check_ret_photo">

                                          


                                          <div ng-repeat="y in check_all_client">
                                            <div ng-if="y.contract_client_id == x.client_contract_id">
                                                <div ng-repeat="z in check_all_loc">
                                                    <div ng-if="z.location_id == x.location_id">




                                            <p style="color:red;"><b>{{z.location_name}} | {{y.client_name}}</b></p>
                                                    <a href="<?php echo base_url();    ?>/Uploads/2020/{{y.client_name}}/{{z.location_name}}/{{'transits'}}/{{x.item_number}}/{{x.photo_name}}" target="_blank"><img class="img-fluid z-depth-1" src="<?php echo base_url();    ?>/Uploads/2020/{{y.client_name}}/{{z.location_name}}/{{'transits'}}/{{x.item_number}}/{{x.photo_name}}" alt="video"
                                                        data-toggle="modal" data-target="#modal{{x.saved_photo_id}}" style="height:230px;width:70%;"></a>
                                                        <label class="container ng-binding" style="/* margin-left:50px; */margin-top: 3px; color:black;"> &nbsp&nbsp&nbsp{{x.photo_name}}
                                                        <!--<input type="checkbox" name="foo" ng-model="x.selected" value={{x.photo_name}} style="margin-left:10px;" ng-change="optionToggled()"/>--> 
                                                        &nbsp&nbsp&nbsp<input type="submit" ng-click="delete_photo_returned(x.photo_name, x.saved_photo_id, y.client_name, z.location_name, x.item_number)" value="Delete Photo" />
                                                        {{x.message}}

                                                        
                                                        <span class="checkmark"></span>
                                                        </label>


                                                    </div>
                                                </div>
                                            </div>
                                          </div>

                                          

                                        </div>
                                        </div>
                                        
                                            </div>
                                            </br>
                                            
                                            
                                            
                                            
                                            

                                            

                                            




                  





                                            </center>