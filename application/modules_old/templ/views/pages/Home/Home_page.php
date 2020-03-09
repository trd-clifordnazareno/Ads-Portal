<?php $this->load->view('include/header/header'); ?>



<div id="get"></div>

<div ng-app="myApp">
    <div>
        <table class="table table-bordered text-center" style="margin-left: 17%; width: 70%;">
            <tbody>

                <tr ng-controller="clients_functionalities_cntrlr">


                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="load_all_client_list()">View Clients</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="add_clients_account()">Add Clients</button>
                    </td>




                </tr>





            </tbody></table>
        <div ng-view></div>
    </div>
</div>


<?php $this->load->view('include/footer/footer');
?>








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
                        .when("/view_client_contract_locations/:client_contract_id", {
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
                        .when("/view_requested_transits/:client_contract_id/:location_id/:type_of_ads_id", {
                        templateUrl: "Type_Of_Ads/request/view_requested_transits",
                        controller: "view_transit_cntrlr"
                        })
                        .when("/view_monthly_billing/:client_name/:no_unit/:contract_number/:date_from_billing_period/:date_to_billing_period/:contract_client_id", {
                        templateUrl: "client_contract_billing/request/view_monthly_billing",
                        controller: "client_contract_billing_cntrlr"
                        })
                        .otherwise({
                        redirectTo: '/'
                        });
            });






            app.controller('client_contract_model', function ($scope, $http, $location) {
                $http.get("<?php echo base_url(); ?>/index.php/admin/home/client_contract_model")
                        .then(function (response) {
                            $scope.myWelcome = response.data.datas;
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
                        $location.path("/view_requested_transits/" + contract_client_id + "/" + location_id + "/" + $type_of_ads_id);
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
            
            
            app.controller("view_transit_cntrlr", function($scope, $http, $routeParams){
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
                                load_save_photo($client_name, $type_of_transit, $item_number,$location_id,$type_of_ads_id, $client_contract_id);
                                //$scope.aaa = "";
                                $a = $item_number;
                                $b = "#";
                                $res = String($b+$a);
                                $($res).val("");
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
                
                $http.get("<?php echo base_url(); ?>index.php/admin/Client_Contract_Billing/request/view_monthly_billing_model/" + $contract_client_id + "/" + $contract_number)
                .then(function(response){
                    $scope.view_monthly_billing_model = response.data;
                });
                $scope.view_client_contract_locations = function(client_contract){
                    $location.path("/view_client_contract_locations/"+ client_contract);
                }
                $scope.add_new_contract_location = function(client_contract_id){
                    $location.path("/regester_contract_location/" + client_contract_id);
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
                    var load_save_photo = function(client_name, type_of_transit, item_number, location_id, type_of_ads_id, client_contract_id){
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
                                    url: '<?php echo base_url(); ?>index.php/admin/Type_Of_Ads/multiple_files/' + client_name + "/" + type_of_transit + "/" + item_number + "/" + "/" +location_id + "/" + type_of_ads_id + "/" + client_contract_id, 
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
                    
</script>