<?php $this->load->view('include/header/header'); ?>



<div id="get"></div>

<div ng-app="myApp">
    <div>
        <table class="table table-bordered text-center" style="margin-left: 17%; width: 70%;">
            <tbody>

                <tr ng-controller="clients_functionalities_cntrlr">

                <?php  if($usertype == "admin") {  ?>
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="load_all_client_list()">View Clients</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="add_clients_account()">Add Clients</button>
                    </td>
                <?php  }  ?>



                </tr>





            </tbody></table>
        <div ng-view></div>
    </div>
</div>


<?php $this->load->view('include/footer/footer');
?>




<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "";
  window.print();
}




function printDiv() {
    var divToPrint = document.getElementById('example');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<p style='margin-left:90%;'> FROM : " + document.getElementById('from').value + " <br> TO : " + document.getElementById('to').value + "</p>");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
</script>



<script>
            var app = angular.module("myApp", ["ngRoute"]);
            app.config(function ($routeProvider) {
                $routeProvider
                        .when("/", {
                            redirectTo: '/view_account'
                        })
                        .when("/view_account", {
                            templateUrl: "Home/request/view_account",
                            controller: "client_contract_model"
                        })
                        .when("/view_account_details/:client_id", {
                            templateUrl: "Clients_Account/request/view_clients_account_details",
                            controller: "display_client_account_model"
                        })
                        .when("/redirect_view_account_details", {
                            redirectTo: '/view_account',
                            controller: "client_contract_model"
                        })
                        .when("/regester_clients_account", {
                        templateUrl: "Clients_Account/request/regester_clients_account",
                                    controller: "regester_client_account_cntrlr"
                        })
                        .when("/regester_contract_location/:client_contract_id", {
                        templateUrl: "Home/request/regester_contract_locations",
                        controller: "regester_contract_location_cntrlr"
                        })
                        .when("/view_client_contract_locations/:client_contract_id/:start_billing/:end_billing", {
                        templateUrl: "Clients_Account/request/view_client_contract_locations",
                        controller: "view_client_contract_locations_cntrlr"
                        })
                        .when("/redirect_view_client_contract_locations/:client_contract_id", {
                        redirectTo: '/view_client_contract_locations/:client_contract_id'
                        })
                        .when("/add_new_transit/:client_contract_id/:location_id/:type_of_ads", {
                        templateUrl: "Type_Of_Ads/request/add_new_transit",
                        controller: "transit_cntrlr"
                        })
                        .when("/view_requested_transits/:client_contract_id/:location_id/:type_of_ads_id/:start_billing/:end_billing", {
                        templateUrl: "Type_Of_Ads/request/view_requested_transits",
                        controller: "view_transit_cntrlr"
                        })
                        .when("/view_monthly_billing/:client_name/:no_unit/:contract_number/:date_from_billing_period/:date_to_billing_period/:contract_client_id", {
                        templateUrl: "client_contract_billing/request/view_monthly_billing",
                        controller: "client_contract_billing_cntrlr"
                        })
                        .when("/create_monthly_billing/:contract_number/:contract_client_id/", {
                        templateUrl: "client_contract_billing/request/create_monthly_billing",
                        controller: "client_contract_billing_cntrlr"
                        })
                        .when("/view_photos/:transit_plate_number/:view_photo_detector/:client_contract_id/:location_id/:type_of_ads_id/:start_billing/:end_billing/:plate_number", {
                        templateUrl: "Photo/request/view_photos",
                        controller: "view_transit_cntrlr"
                        })




                        .when("/view_all_transactions/:client_contract_id/:start_billing/:end_billing", {
                        templateUrl: "Clients_Account/request/view_all_transactions",
                        controller: "view_all_transactions_cntrlr"
                        })




                        .when("/view_all_transactions_redirect/:client_contract_id/:start_billing/:end_billing", {
                            redirectTo: '/view_all_transactions/:client_contract_id/:start_billing/:end_billing',
                        controller: "view_all_transactions_cntrlr"
                        })

                        .otherwise({
                        redirectTo: '/'
                        });
            });



///new no request

            app.controller('view_all_transactions_cntrlr', function($scope, $http, $location, $routeParams){
                $http.get("<?php echo base_url(); ?>/index.php/admin/Photo/view_all_transactions_model/" + "/" + $routeParams.client_contract_id + "/" + $routeParams.start_billing + "/" + $routeParams.end_billing)
                        .then(function (response) {
                            $scope.msg = response.data.view_all_transactions;
                            $scope.loc = response.data.check_loc;
                            $scope.client_name = response.data.client_name;
                            $scope.no_of_units = response.data.client_no_of_units
                            $scope.no_of_success = response.data.check_count;
                            $scope.usersname = response.data.usersname;
                        });



                        $scope.disapproved_photo = function($saved_photo_id, $client_contract_id, $location_id, $item_number, $photo_name){
                            $http.get("<?php echo base_url(); ?>/index.php/admin/Photo/disapproved_photo_model/" + "/" + $saved_photo_id + "/" + $client_contract_id + "/" + $location_id + "/" + $item_number + "/" + $photo_name)
                                .then(function (response) {
                                    alert("The Photo Has Been Disapproved");
                                    hide_btn("#hide_disapproved_btn" + $saved_photo_id);
                                    hide_btn("#hide_message_btn" + $saved_photo_id);
                                });
                        }


                        $scope.approved_photo = function($saved_photo_id, $client_contract_id, $location_id, $item_number, $photo_name){show_check($saved_photo_id);
                            $http.get("<?php echo base_url(); ?>/index.php/admin/Photo/approved_photo_model/" + "/" + $saved_photo_id + "/" + $client_contract_id + "/" + $location_id + "/" + $item_number + "/" + $photo_name)
                                .then(function (response) {
                                    alert("The Photo Has Been Approved");
                                    hide_btn("#hide_approved_btn" + $saved_photo_id);
                                    hide_btn("#hide_disapproved_btn" + $saved_photo_id);
                                    hide_btn("#hide_message_btn" + $saved_photo_id);
                                });
                        }

                        
                        $scope.others_function_model = function($data, $saved_photo_id, $client_contract_id, $location_id, $item_number, $photo_name){
                            var r = confirm("Press a button!");
                            if (r == true) {
                                $http.get("<?php echo base_url(); ?>/index.php/admin/Photo/others_function_model_model/" + "/" + $saved_photo_id + "/" + $client_contract_id + "/" + $location_id + "/" + $item_number + "/" + $photo_name + "/" + $data)
                                .then(function (response) {
                                    alert("The Photo Was Disapproved Successfully");
                                    hide_btn("#hide_message_btn" + $saved_photo_id);
                                    hide_btn("#hide_disapproved_btn" + $saved_photo_id);
                                    hide_btn("#hide_approved_btn" + $saved_photo_id);
                                });
                            } else {
                                alert("You pressed Cancel!");
                            }
                            
                        }




                        $scope.toggleAll = function() {
                            var toggleStatus = !$scope.isAllSelected;
                            angular.forEach($scope.msg, function(itm){ itm.selected = toggleStatus; });
                        
                            }




                            $scope.optionToggled = function(){
                                $scope.isAllSelected = $scope.msg.every(function(itm){ return itm.selected; })
                            }




                            $scope.approve = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.msg, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/approve_photo_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Approved Photos")
                                        ///load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Approved");
                                        $location.path("/view_all_transactions_redirect/" + $routeParams.client_contract_id + "/" + $routeParams.start_billing + "/" + $routeParams.end_billing);
                                    });
                                    };
                                });
                            }




                            $scope.checkboxArray = [];
  
  //alert function 
  $scope.alert = function() {
    var selected = $scope.msg.filter(function(item) {
      return item.checked
    }).map(function(item) {
      return item.photo_name;
    })
    alert(selected);
  }




  $scope.items = [
     {name: 'Field one', checked:false},
     {name:'Field two', checked:true},
     {name:'Field three', checked: false},
     {name: 'Field four', checked: true}
      ];
     $scope.checkall = false;
      
      $scope.toggleAlls = function(checked){
       angular.forEach($scope.msg, function(item){
         item.checked = checked
       });
      }
      
      // listen to when the others were clicked or not
     $scope.checkboxClicked = function (item, value){
       if(value === false){
       $scope.checkall = false
      }else{
      $scope.checkall = true
        // check the others to see if you need to make check all true or not
        angular.forEach($scope.msg, function(x){
         if(x.checked !== true && x.photo_name !== item.photo_name){
          $scope.checkall = false
         }
       });
      }
     }




     $scope.aaa = function(){
        //var divToPrint = document.getElementById('example2');
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding;0.5em;' +
                '}' +
                '</style>';
            //htmlToPrint += divToPrint.outerHTML;



            newWin = window.open("");
            //newWin.document.write("<p style='margin-left:90%;'> FROM : " + "" + " <br> TO : " + "" + "</p>");
            newWin.document.write("<center><img src='http://192.168.88.75/rmniportal/scripts/rmn.png' style='width: 150; margin-top: -1px;'></center>");
            newWin.document.write("<center>");

            newWin.document.write("<table>");
            newWin.document.write("<tr>");
            newWin.document.write("<p style='margin-left:-10%;'>");
            newWin.document.write("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Client Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" + $scope.client_name);
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-10px; margin-left:-10%;'>");
            newWin.document.write("Number Of Units &nbsp&nbsp&nbsp&nbsp:" + $scope.no_of_units);
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-10px; margin-left:-10%;'>");
            newWin.document.write("No Of Approves &nbsp&nbsp&nbsp&nbsp&nbsp:" + $scope.no_of_success);
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-10px; margin-left:-10%;'>");
            newWin.document.write("No Of Pending &nbsp&nbsp&nbsp&nbsp&nbsp:" + "0");
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-10px; margin-left:-10%;'>");
            newWin.document.write("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Prepared By &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" + "Ivy Sanchez");
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-15px; margin-left:-10%;'>");
            newWin.document.write("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" + "<font color='red'>Accounting Officer</font>");
            newWin.document.write("</p>");
            newWin.document.write("<p style='margin-top:-10px; margin-left:-10%;'>");
            newWin.document.write("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Approved By &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" + $scope.client_name);
            newWin.document.write("</p>");
            newWin.document.write("</tr>");
            newWin.document.write("</table>");

            newWin.document.write("<table border='0' cellspacing='0'>");
            newWin.document.write("<th>");
            newWin.document.write("");
            newWin.document.write("</th>");
            newWin.document.write("<th>");
            newWin.document.write("Plate Number");
            newWin.document.write("</th>");
            newWin.document.write("<th>");
            newWin.document.write("Location Name");
            newWin.document.write("</th>");
           

            $num_count = 0;
            angular.forEach($scope.msg, function(value, key){
                            $count_incr = $num_count + 1;
                            $num_count = $count_incr;
                            $location_name_given = value.location_id;
                            newWin.document.write("<tr>");
                            newWin.document.write("<td><center>" + $count_incr);
                            newWin.document.write("</center></td>");
                            newWin.document.write("<td><center>" + value.item_number);
                            newWin.document.write("</center></td>");
                            angular.forEach($scope.loc, function(value_loc, key_loc){
                                        if(value_loc.location_id == $location_name_given)
                                            newWin.document.write("<td><center>" + value_loc.location_name);
                                            newWin.document.write("</center></td>"); 
                            });

                            newWin.document.write("</tr>");
                                        
            });
            newWin.document.write("<table>");
            newWin.document.write("<center>");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
                                    }
            });
            
///new no request




            app.controller('client_contract_model', function ($scope, $http, $location) {
                $http.get("<?php echo base_url(); ?>/index.php/admin/Home/client_contract_model")
                        .then(function (response) {
                            $scope.myWelcome = response.data.datas;
                            $scope.usertype = response.data.usertype;
                        });
                $scope.delete_client_contract = function (client_id) {
                    $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/delete_client_account/" + client_id)
                            .then(function (response) {
                                $location.path("/redirect_view_account_details");
                            });
                }
                $scope.view_client_contract_details_page = function (id) {
                    $location.path("/view_account_details/" + id);
                }
                
                
                
                
                $scope.add_new_contract_location = function(client_contract_id){
                    $location.path("/regester_contract_location/" + client_contract_id);
                }

                $scope.view_client_contract_locations = function(client_contract){
                    $location.path("/view_client_contract_locations/"+ client_contract);
                }
                
                $scope.view_monthly_billing = function($client_name, $no_unit, $contract_number, $date_from_billing_period, $date_to_billing_period, $contract_client_id){
                    $location.path("/view_monthly_billing/"+ $client_name + "/" + $no_unit + "/" + $contract_number + "/" + $date_from_billing_period + "/" + $date_to_billing_period + "/" + $contract_client_id);
                }
                
                $scope.create_monthly_billing = function($contract_number, $contract_client_id){
                    $location.path("/create_monthly_billing/"+$contract_number + "/" + $contract_client_id);
                }
                
                
                
                
                // for table to view a modal sample only
                $scope.get_name = function(client){
                    $scope.msg = client;
                }
                //end of table to view a modal sample only


            });
            app.controller('display_client_account_model', function ($scope, $http, $routeParams) {
                $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request_display_client_account_details_model/" + $routeParams.client_id)
                        .then(function (response) {
                            $scope.data = response.data;
                            $scope.client_name = response.data.client_name;
                            $scope.contract_number = response.data.contract_number;
                        });
                $scope.update_client_details = function (client_id) {
                    client_name_data = $scope.client_name;
                    contract_number_data = $scope.contract_number;
                    $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/update_client_account/" + client_id + "/" + client_name_data + "/" + contract_number_data)
                            .then(function (response) {

                                $scope.client_name = response.data.client_name;
                                $scope.contract_number = response.data.contract_number;
                                $scope.msg = response.data.contract_number;
                                ///
                                ///calling a jquery
                                load_message_notification();
                                ///end of calling a jquery
                                ///
                            });

                }

            });
            
            
            
            
            app.controller('clients_functionalities_cntrlr', function($scope, $http, $location){
                $scope.load_all_client_list = function(){
                    $location.path("/");
                }
                $scope.add_clients_account = function(){
                    $location.path("/regester_clients_account");
                }
            });
    
    
    
    
            app.controller('regester_client_account_cntrlr', function($scope, $http){
                $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/get_all_locations")
                            .then(function (response) {
                                $scope.locations = response.data.all_locations_list;
                            });

                $scope.regester_client_account = function(){



                    $client_name = $scope.client_name;
                    $contract_number = $scope.contract_number;
                    
                    





                    $scope.date_from_billing_period = new Date($scope.date_from_billing_period);
                    $from_date = $scope.date_from_billing_period;




                    $dfrom = new Date($from_date);
                    $dfromyear = $dfrom.getFullYear();
                    $dfromyear_to_string = $dfromyear.toString();

                    $dfrommonth = $dfrom.getMonth() + 1;
                    $dfrommonth_to_string = $dfrommonth.toString();

                    $dfromday = $dfrom.getDate();
                    $dfromday_to_string = $dfromday.toString();

                    $exact_year = $dfromyear_to_string;
                    $exact_month = $dfrommonth_to_string;
                    $exact_day = $dfromday_to_string;
                    $complete_from_date = $exact_year + "-" + $exact_month + "-" + $exact_day;
                    
                    

                    $scope.date_to_billing_period = new Date($scope.date_to_billing_period);
                    $to_date = $scope.date_to_billing_period;

                    $dto = new Date($to_date);
                    $dtoyear = $dto.getFullYear();
                    $dtoyear_to_string = $dtoyear.toString();

                    $dtomonth = $dto.getMonth() + 1;
                    $dtomonth_to_string = $dtomonth.toString();

                    $dtoday = $dto.getDate();
                    $dtoday_to_string = $dtoday.toString();

                    $exact_year_to = $dtoyear_to_string;
                    $exact_month_to = $dtomonth_to_string;
                    $exact_day_to = $dtoday_to_string;
                    $complete_to_date = $exact_year_to + "-" + $exact_month_to + "-" + $exact_day_to;

                    $soa = $scope.soa;
                    $no_units = $scope.no_units;
                    $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/regester_clients_account_model/" + 
                            $client_name + "/" + 
                            $contract_number + "/" + 
                            $complete_from_date + "/" + 
                            $complete_to_date + "/" + 
                            $soa + "/" + 
                                   $no_units 

                            )
                            .then(function (response) {

                                $scope.client_name = "";
                                $scope.contract_number = "";
                                $scope.soa = "";
                                $scope.no_units = "";
                                ///calling a jquery
                                //load_message_notification();



                                ///new
                                    $scope.albumNameArray = [];
                                                        angular.forEach($scope.locations, function(x){
                                                        if (x.selected) {
                                                                //var x = $scope.albumNameArray.push(x.client_name)
                                                                var location_id = x.location_id;
                                                                var client_contract_id_var = $contract_number;
                                                                $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/insert_new_client_account_location_model/" + 
                                                                location_id + "/" + client_contract_id_var
                                                                )
                                                                .then(function(response){
                                                                    var sta = response.data.insert_success;
                                                                    if(sta == 1){
                                                                        load_status_message_notification("get", "success", "The_Locations_Of_Clients_Contract_Was_Saved_Successfully");
                                                                    }else{
                                                                        //load_status_message_notification("get", "warning", "The_Locations_Of_Clients_Contract_Was_Already_Been_Saved");
                                                                    }
                                                                });
                                                            };
                                                        });
                                    ///new

                                load_status_message_notification_with_parameter("#notification", "success", "You_Have_Successfully_Added_New_Client_Contract")
                                ///end of calling a jquery
                                ///
                            });
                }
            });




            app.controller("regester_contract_location_cntrlr", function($scope, $http, $routeParams){
            ///
            $http.get("<?php echo base_url(); ?>/index.php/admin/Locations/Request/get_all_locations_model/" + $routeParams.client_contract_id)
                        .then(function (response) {
                            $scope.locations = response.data.all_locations_list;
                            $scope.client_name_display = response.data.client_name;
                        });
            ///

            $scope.client_contract_id = $routeParams.client_contract_id;

                $http.get("<?php echo base_url(); ?>index.php/admin/Locations/request/get_all_locations_list/")
                .then(function(response){
                    $scope.msg = response.data.check_all_ocations;
                });

                $scope.regester_location_details = function(){
                    var location_name = $scope.location_name;
                    $http.get("<?php echo base_url(); ?>index.php/admin/Locations/request/regester_location_model/" + 
                            location_name   
                            )
                            .then(function(response){
                                var sta = response.data.insert_success;
                                if(sta == 1){
                                    load_status_message_notification("get", "successx");
                                    $scope.location_name = "";
                                }else{
                                    $scope.msg = 0;
                                }
                            });
                }
                $scope.regester_contract_location_details = function(client_contract_id){
                    $scope.albumNameArray = [];
                    angular.forEach($scope.locations, function(x){
                    if (x.selected) {
                            //var x = $scope.albumNameArray.push(x.client_name)
                            var location_id = x.location_id;
                            var client_contract_id_var = client_contract_id;
                            $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/insert_client_account_location_model/" + 
                            location_id + "/" + client_contract_id_var
                            )
                            .then(function(response){
                                var sta = response.data.insert_success;
                                if(sta == 1){
                                    load_status_message_notification("get", "success", "The_Locations_Of_Clients_Contract_Was_Saved_Successfully");
                                }else{
                                    load_status_message_notification("get", "warning", "The_Locations_Of_Clients_Contract_Was_Already_Been_Saved");
                                }
                            });
                        };
                    });
                }
            });
            
            app.controller('view_client_contract_locations_cntrlr', function($scope, $http, $routeParams, $rootScope, $location){
            
            var get_location_name;
            
                $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/view_client_contract_locations_list/" + $routeParams.client_contract_id)
                .then(function(response){
                    $scope.client_contract_locations = response.data.client_contract_locations;
                    $rootScope.y = response.data.all_locations_list;
                    $scope.client_name_contract = response.data.client_name;
                    $scope.type_of_ads = response.data.type_of_add_list;
                });
                
                $scope.get_location_name = function(location_id){
                    angular.forEach($rootScope.y, function(value, key) {
                        var location_name = value.location_name;
                        var location_id_returned = value.location_id;
                        if(location_id_returned == location_id){
                            return get_location_name = location_name;
                        }
                    });
                    //$scope.msg = $rootScope.y;
                    return get_location_name;
                }
                $scope.delete_client_contract_location = function(client_contract_id, location_id){
                    $http.get("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/delete_clients_contract_location/" + client_contract_id + "/" + location_id)
                            .then(function(response){
                                var deleted_success = response.data.deleted_success;
                                if(deleted_success == 1){
                                    load_status_message_notification("get", "success", "The_Location_has_Been_Deleted_Successfully");
                                    $location.path("redirect_view_client_contract_locations/" + client_contract_id);
                                }
                            });
                }
                start_billing = $routeParams.start_billing;
                end_billing = $routeParams.end_billing;

                $scope.add_new_type_requested_ads = function(client_contract_id, location_id, type_of_ads){
                    $type_of_ads_id = type_of_ads;
                    if($type_of_ads_id == 1){
                        $location.path("add_new_transit/" + client_contract_id + "/" + location_id + "/" + type_of_ads);
                    }else if($type_of_ads_id == 2){
                        alert("digital");
                    }else if($type_of_ads_id == 3){
                        alert("lamppost");
                    }else if($type_of_ads_id == 4){
                        alert("billboard");
                    }else if($type_of_ads_id == 5){
                        alert("led");
                    }
                    
                }
                $scope.view_type_of_ads = function(contract_client_id, location_id, type_of_ads_id){
                    $type_of_ads_id = type_of_ads_id;
                    if($type_of_ads_id == 1){
                        $location.path("/view_requested_transits/" + contract_client_id + "/" + location_id + "/" + $type_of_ads_id + "/" + start_billing + "/" + end_billing);
                    }else if($type_of_ads_id == 2){
                        alert("digital");
                    }else if($type_of_ads_id == 3){
                        alert("lamppost");
                    }else if($type_of_ads_id == 4){
                        alert("billboard");
                    }else if($type_of_ads_id == 5){
                        alert("led");
                    }
                    
                }
            });
            
            
            
            
            app.controller("transit_cntrlr", function($scope, $routeParams, $http){
                $client_contract_id = $routeParams.client_contract_id;
                $location_id = $routeParams.location_id;
                $type_of_ads = $routeParams.type_of_ads;
                
                $scope.regester_transit = function(){
                    var plate_number = $scope.transit_plate_number;
                    var transit_type = $scope.transit_type;
                    $http.get("<?php echo base_url(); ?>index.php/admin/Type_Of_Ads/request/insert_new_transit/" + plate_number + "/" + transit_type + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads)
                            .then(function(response){
                                load_status_message_notification_with_parameter("#notification", "success", "The_Transit_Type_Was_Successfully_Saved");
                            });
                }
                
            });
            
            
            app.controller("view_transit_cntrlr", function($scope, $http, $routeParams, $location){
                $view_photo_detector = $routeParams.view_photo_detector;
                
                    if($routeParams.view_photo_detector == 1){
                        //$scope.view_photo($routeParams.transit_plate_number);
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = $routeParams.transit_plate_number + "_" + $start_billing + "_" + $end_billing;


                                
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/view_photo_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  
                               
                                
                    }
            $client_id = $routeParams.client_contract_id;
            $location_id = $routeParams.location_id;
            $type_of_ads_id = $routeParams.type_of_ads_id;
                $http.get("<?php echo base_url(); ?>index.php/admin/Type_Of_Ads/request/view_all_transits_requested/" + $client_id + "/" + $location_id + "/" + $type_of_ads_id)
                            .then(function(response){
                                //load_status_message_notification("get", "success", "The_Transit_Type_Was_Successfully_Saved");
                        $has_list = response.data.has_list;
                        if($has_list == 1){
                            $scope.view_transits_requested = response.data.get_all_requested_transits;
                            $scope.client_name = response.data.client_name;
                            $get_type_of_ads = response.data.get_all_requested_transits;
                            angular.forEach($get_type_of_ads, function(value, key){
                            if(value.type_of_ads == "1")
                               $scope.type_of_ads_number = value.type_of_ads;
                                if($scope.type_of_ads_number == 1)
                                    $scope.type_of_ads_number = "Plate Number";
                                    $scope.type_of_ads_requested = "Transit Type";
                                
                            });
                        }else{
                            load_status_message_notification_with_parameter("#no_data_available" , "warning", "Theres_No_Data_Available_In_This_Client")
                        }
                            });
                            
                            
                            $scope.save_photo = function($client_name, $type_of_transit, $item_number){
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;
                                $client_contract_id = $routeParams.client_contract_id;
                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;
                                load_save_photo($client_name, $type_of_transit, $item_number,$location_id,$type_of_ads_id, $client_contract_id, $start_billing, $end_billing);
                                //$scope.aaa = "";
                                $a = $item_number;
                                $b = "#";
                                $res = String($b+$a);
                                $($res).val("");
                            }
                            
                            
                            $view_button = '';


                            $scope.view_photos = function($transit_plate_number){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = $transit_plate_number + "_" + $start_billing + "_" + $end_billing;

                                $location.path("view_photos/" + $transit_plate_number + "/" + 1 + "/" + $client_contract_id + "/" +$location_id + "/" + $type_of_ads_id + "/" + $start_billing + "/" + $end_billing + "/" + $plate_number);
                            }
                            
                            $scope.view_photo = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/view_photo_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.view_photo_returned = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/view_photo_returned_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos_returned");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.view_photo_approved = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/view_photo_approve_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos_returned");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.blurry_photo = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/blurry_photo_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos_returned");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.no_news_paper = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/no_news_paper_model/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos_returned");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.others_function = function(item){
                                $client_contract_id = $routeParams.client_contract_id;
                                $location_id = $routeParams.location_id;
                                $type_of_ads_id = $routeParams.type_of_ads_id;


                                $start_billing = $routeParams.start_billing;
                                $end_billing = $routeParams.end_billing;

                                $plate_number = item + "_" + $start_billing + "_" + $end_billing;
                                if($view_button == ""){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/others_function/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $plate_number)
                                    .then(function(response){
                                        $scope.check_view_photo = response.data.view_all_photo;
                                        $scope.client_contract_name = response.data.client_contract_name;
                                        $scope.location_name = response.data.location_name;
                                        $scope.type_of_ads_given_name = response.data.type_of_ads_given_name;
                                    });
                                    
                                  $("#photo"+item).load("<?php echo base_url(); ?>index.php/admin/Photo/request/show_photos_returned");
                                  $("#photo"+item).show();
                                  $("#check_button").show();
                                  return $view_button = 1;
                                }
                                if($view_button == 1){
                                    $("#photo"+item).hide();
                                    $("#check_button").hide();
                                    $scope.check_view_photo = ""; return $view_button = 0;
                                }
                                
                                
                            }




                            $scope.others_function_model = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.check_view_photo, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $txt_area = $scope.txt_area;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/others_function_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id + "/" + $txt_area)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Approved Photos")
                                        load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Approved");
                                    });
                                    };
                                });
                                
                                
                            }





                            $scope.show = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.check_view_photo, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/update_checked_selected_photo_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Disapproved Photos")
                                        load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Disapproved");
                                    });
                                    };
                                });
                            }


                            $scope.approve = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.check_view_photo, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/approve_photo_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Approved Photos")
                                        load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Approved");
                                    });
                                    };
                                });
                            }




                            $scope.blurry_function = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.check_view_photo, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/blurry_function_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Approved Photos")
                                        load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Approved");
                                    });
                                    };
                                });
                            }




                            $scope.no_news_paper_function = function(){
                                $scope.albumNameArray = [];
                                angular.forEach($scope.check_view_photo, function(x){
                                if (x.selected) {
                                        //alert(x.photo_name);
                                        $saved_photo_id = x.saved_photo_id;
                                        $photo_name = x.photo_name;
                                        $client_contract_id = x.client_contract_id;
                                        $location_id = x.location_id;
                                        $type_of_ads_id = x.type_of_ads_id;
                                        $item_number = x.item_number;
                                        $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/no_news_paper_function_model/" + $photo_name + "/" + $client_contract_id + "/" + $location_id + "/" + $type_of_ads_id + "/" + $item_number + "/" + $saved_photo_id)
                                        .then(function(response){
                                        //alert("Photo Has Been Moved To Approved Photos")
                                        load_status_message_notification_with_parameter("#success_transfer_photo", "success", "The_Photos_Has_Been_Approved");
                                    });
                                    };
                                });
                            }




                            /*$scope.others_function = function(){
                                alert(1);
                            }*/



                            $scope.modal_open = function(){
                                $http.get("<?php echo base_url(); ?>index.php/admin/Photo/show_modal")
                                        .then(function(response){
                                        alert(1);
                                    });
                            }
                            




                            $scope.toggleAll = function() {
                            var toggleStatus = !$scope.isAllSelected;
                            angular.forEach($scope.check_view_photo, function(itm){ itm.selected = toggleStatus; });
                        
                            }
                        
                            $scope.optionToggled = function(){
                                $scope.isAllSelected = $scope.check_view_photo.every(function(itm){ return itm.selected; })
                            }


                            $scope.delete_photo_data = function($photo_name, $saved_photo_id, $transact_method){
                                $condition = $transact_method;
                                if($condition == 'blurry'){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/transfer_photo_to_view_photo_model/" + $photo_name + "/" + $saved_photo_id)
                                            .then(function(response){
                                            alert("The Photo Has Been Transfered To View Photos Page");
                                        });
                                    //$location.path("view_account");
                                }else if($condition == 'no_news_paper'){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/transfer_photo_to_view_photo_model/" + $photo_name + "/" + $saved_photo_id)
                                            .then(function(response){
                                            alert("The Photo Has Been Transfered To View Photos Page");
                                        });
                                    //$location.path("view_account");
                                }else if($condition == 'others'){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/transfer_photo_to_view_photo_model/" + $photo_name + "/" + $saved_photo_id)
                                            .then(function(response){
                                            alert("The Photo Has Been Transfered To View Photos Page");
                                        });
                                    //$location.path("view_account");
                                }else if($condition == 'disapproved'){
                                    $http.get("<?php echo base_url(); ?>index.php/admin/Photo/request/transfer_photo_to_view_photo_model/" + $photo_name + "/" + $saved_photo_id)
                                            .then(function(response){
                                            alert("The Photo Has Been Transfered To View Photos Page");
                                        });
                                    //$location.path("view_account");
                                }
                            }
                            
                            

            });
            
            
            
            
            app.controller("client_contract_billing_cntrlr", function($scope, $http, $routeParams, $location){
                $client_name = $routeParams.client_name;
                $no_unit = $routeParams.no_unit;
                $contract_number = $routeParams.contract_number;
                $date_from_billing_period = $routeParams.date_from_billing_period;
                $date_to_billing_period = $routeParams.date_to_billing_period;
                $contract_client_id = $routeParams.contract_client_id;
                
                $scope.client_name = $client_name;
                $scope.no_unit = $no_unit;
                $scope.contract_number = $contract_number;
                $scope.date_from_billing_period = $date_from_billing_period;
                $scope.date_to_billing_period = $date_to_billing_period;
                //$scope.contract_client_id = $contract_client_id;
                
                $http.get("<?php echo base_url(); ?>index.php/admin/Client_Contract_Billing/request/view_monthly_billing_model/" + $contract_client_id + "/" + $contract_number + "/" + $client_name)
                .then(function(response){
                    $scope.view_monthly_billing_model = response.data.get_client_contarct_monthly_billing;
            $scope.client_given_name = response.data.client_name;
            $scope.usertype = response.data.usertype;
                });
                $scope.view_client_contract_locations = function(client_contract, start_billing, end_billing){
                    $location.path("/view_client_contract_locations/"+ client_contract + "/" + start_billing + "/" + end_billing);
                }




///new
                $scope.view_all_transactions = function(client_contract, start_billing, end_billing){
                    $location.path("/view_all_transactions/"+ client_contract + "/" + start_billing + "/" + end_billing);
                }

///new


                $scope.add_new_contract_location = function(client_contract_id){
                    $location.path("/regester_contract_location/" + client_contract_id);
                }
                
                $scope.save_and_upload = function($pdf_file){
                    $contract_number = $routeParams.contract_number;
                    $contract_client_id = $routeParams.contract_client_id;
                    $soa = $scope.soa;
                    $start_billig = $scope.start_billing;
                    $end_billing = $scope.end_billing;
                    
                    
                    
                    $scope.date_from_billing_period = new Date($scope.start_billing);
                    $from_date = $scope.start_billing;

                    $dfrom = new Date($from_date);
                    $dfromyear = $dfrom.getFullYear();
                    $dfromyear_to_string = $dfromyear.toString();

                    $dfrommonth = $dfrom.getMonth() + 1;
                    $dfrommonth_to_string = $dfrommonth.toString();

                    $dfromday = $dfrom.getDate();
                    $dfromday_to_string = $dfromday.toString();

                    $exact_year = $dfromyear_to_string;
                    $exact_month = $dfrommonth_to_string;
                    $exact_day = $dfromday_to_string;
                    $complete_from_date = $exact_year + "-" + $exact_month + "-" + $exact_day;
                    
                    
                    
                    
                    $scope.date_to_billing_period = new Date($scope.end_billing);
                    $to_date = $scope.end_billing;

                    $dto = new Date($to_date);
                    $dtoyear = $dto.getFullYear();
                    $dtoyear_to_string = $dtoyear.toString();

                    $dtomonth = $dto.getMonth() + 1;
                    $dtomonth_to_string = $dtomonth.toString();

                    $dtoday = $dto.getDate();
                    $dtoday_to_string = $dtoday.toString();

                    $exact_year_to = $dtoyear_to_string;
                    $exact_month_to = $dtomonth_to_string;
                    $exact_day_to = $dtoday_to_string;
                    $complete_to_date = $exact_year_to + "-" + $exact_month_to + "-" + $exact_day_to;
                    
                    load_save_pdf($pdf_file, $soa, $complete_from_date, $complete_to_date, $contract_number, $contract_client_id);
                }
                
            });

                    var load_message_notification = function () {
                        var i = $("#add_on_panel").load("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/message_notification");
                        return i;
                    }
                    var load_status_message_notification = function (get, success, message) {
                        var i = $("#get").load("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/message_notification_with_data/" + success +"/" + message);
                        return i;
                    }
                    var load_status_message_notification_with_parameter = function (get, success, message) {
                        var i = $(get).load("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/message_notification_with_data/" + success +"/" + message);
                        return i;
                    }
                    var load_save_photo = function(client_name, type_of_transit, item_number, location_id, type_of_ads_id, client_contract_id, start_billing, end_billing){
                        var fileInputs = $('.'+item_number);
                                var formData = new FormData();
                                $.each(fileInputs, function(i,fileInput){
                                    if( fileInput.files.length > 0 ){
                                        $.each(fileInput.files, function(k,file){
                                            formData.append('images[]', file);
                                        });
                                    }
                                });
                                $.ajax({
                                    url: '<?php echo base_url(); ?>index.php/admin/Type_Of_Ads/multiple_files/' + client_name + "/" + type_of_transit + "/" + item_number + "/" + "/" + location_id + "/" + type_of_ads_id + "/" + client_contract_id + "/" + start_billing + "/" + end_billing, 
                                                dataType: 'json', 
                                                contentType: false,
                                                processData: false,
                                                data: formData,
                                                method: 'post',

                                    success: function(response){
                                        //console.log(response);
                                    },error: function(){
                                        alert('Images Has Been Inserted');
                                      }
  
  
  
                                });
                    }
                    var load_save_pdf = function(pdf_file, soa, start_billig, end_billing, contract_number, contract_client_id){
                        var fileInputs = $('#'+pdf_file);
                                var formData = new FormData();
                                $.each(fileInputs, function(i,fileInput){
                                    if( fileInput.files.length > 0 ){
                                        $.each(fileInput.files, function(k,file){
                                            formData.append('images[]', file);
                                        });
                                    }
                                });
                                $.ajax({
                                    url: '<?php echo base_url(); ?>index.php/admin/Type_Of_Ads/request/upload_pdf/' + soa + "/" + start_billig + "/" + end_billing + "/" + contract_number + "/" + contract_client_id, 
                                                dataType: 'json', 
                                                contentType: false,
                                                processData: false,
                                                data: formData,
                                                method: 'post',

                                    success: function(response){
                                        //console.log(response);
                                    },error: function(){
                                        alert('PDF Has Been Inserted');
                                      }
  
  
  
                                });
                    }
                    var hide_btn = function(btn_name){
                        $(btn_name).hide();
                    }




                    var show_check = function(saved_photo_id){
                    $("#show_check" + saved_photo_id).html("&#10004;");
                    }
                    var hide_check = function(saved_photo_id){
                        $("#hide_check" + saved_photo_id).hide(saved_photo_id);
                    }
                    
</script>