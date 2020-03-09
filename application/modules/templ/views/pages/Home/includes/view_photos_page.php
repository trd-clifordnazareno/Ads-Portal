
</br><center>
<div id="success_transfer_photo"></div><div class="container my-4" id="scroll">
                                        <div class="row"> 
                                        <div class="col-lg-3 col-md-2 mb-4" ng-repeat="x in check_view_photo">

                                          

                                          <a href="<?php echo base_url();    ?>/Uploads/2020/{{client_contract_name}}/{{location_name}}/{{type_of_ads_given_name}}/{{x.item_number}}/{{x.photo_name}}" target="_blank"><img class="img-fluid z-depth-1" src="<?php echo base_url();    ?>/Uploads/2020/{{client_contract_name}}/{{location_name}}/{{type_of_ads_given_name}}/{{x.item_number}}/{{x.photo_name}}" alt="video"
                                              data-toggle="modal" data-target="#modal{{x.saved_photo_id}}" style="height:230px;width:70%;"></a>
                                              <label class="container ng-binding" style="/* margin-left:50px; */margin-top: -35px; color:yellow;"> &nbsp&nbsp&nbsp{{x.photo_name}}
                                            <input type="checkbox" name="foo" ng-model="x.selected" value={{x.photo_name}} style="margin-left:10px;" ng-change="optionToggled()"/> 

                                            
                                            <span class="checkmark"></span>
                                            </label>

                                        </div>
                                        </div>
                                        
                                            </div>
                                            </br>
                                            
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-sm-2">
                                                <button ng-click="show()" class="btn btn-danger" style="margin-top:-40px;">Disapprove</button>
                                                </div>
                                                <div class="col-sm-2">
                                                <button ng-click="approve()" class="btn btn-success" style="margin-top:-40px;">approve</button>
                                                </div>
                                                <div class="col-sm-2">
                                                <div style="margin-top:-24px; /*margin-left:300px;*/"><input type="checkbox" ng-click="toggleAll()" ng-model="isAllSelected"> Select all </div>
                                            
                                                </div>
                                                <div class="col-sm-2">
                                            <div class="btn-group" style="
    /*margin-left: 55%;*/
    margin-top: -30px;
">
                    <button type="button" class="btn btn-default">Options</button>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, 37px, 0px);">
                        <a class="dropdown-item" href="#" ng-click="blurry_function()">Blurry</a>
                        <a class="dropdown-item" href="#" ng-click="no_news_paper_function()">No News Paper</a>
                        <!--<a class="dropdown-item" href="#" ng-click="others_function()">Others</a>-->
                      </div>
                    </button>
                  </div>
                                                </div>
                                                <div class="col-sm-2">
                                                <div style="
    /*margin-left: 500px;*/ margin-top: -23px;
">
                                            Others : &nbsp&nbsp&nbsp<input type="checkbox" ng-model="txt_area">
                                            </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            
                                            

                                            

                                            




                  



</br>
</br>
</br>
<div id="txt_area" ng-show="txt_area">
                  <textarea rows="10" cols="100" ng-model="txt_area">
</textarea>
</br>
</br>
<button type="submit" class="btn btn-primary" ng-click="others_function_model()">Submit</button>
</div>
                                            </center>