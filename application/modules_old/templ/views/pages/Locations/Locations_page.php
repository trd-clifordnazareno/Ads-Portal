<?php $this->load->view('include/header/header'); ?>




<div id="get"></div>

<div ng-app="myApps">
    <div>
        <table class="table table-bordered text-center" style="margin-left: 17%; width: 70%;">
            <tbody>

                <tr ng-controller="locations_functionalities_cntrlr">


                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="view_location_list()">View Locations</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="add_new_location()">Add Location</button>
                    </td>




                </tr>





            </tbody></table>
        <div ng-view></div>
    </div>
</div>

<?php $this->load->view('include/footer/footer'); ?>




<script>
            var app = angular.module("myApps", ["ngRoute"]);
            app.config(function ($routeProvider) {
                $routeProvider
                        .when("/", {
                            redirectTo: '/view_locations'
                        })
                        .when("/view_locations", {
                            templateUrl: "Locations/request/view_locations",
                            controller: "location_page_index_cntrlr"
                        })
                        .when("/add_new_location", {
                            templateUrl: "Locations/request/add_new_location",
                            controller: "location_page_index_cntrlr"
                        })
                        .otherwise({
                        redirectTo: '/'
                        });
            });






            app.controller('location_page_index_cntrlr', function ($scope, $http, $location) {
                
                load_status_message_notification_with_parameter("#get", "title_page", "Locations_Page");
                
                $http.get("<?php echo base_url(); ?>index.php/admin/Locations/request/view_locations_model/")
                        .then(function (response) {
                            $scope.location_data = response.data.view_locations;
                        });
                
                
                $scope.delete_location = function(location_id){
                    $http.get("<?php echo base_url(); ?>index.php/admin/Locations/request/delete_location_model/" + location_id)
                        .then(function (response) {
                            $location.path("/");
                        });
                }
                $scope.regester_location_details = function(){
                    $location_name = $scope.location_name;
                    $http.get("<?php echo base_url(); ?>index.php/admin/Locations/request/add_new_location_model/" + $location_name)
                        .then(function (response) {
                            //$location.path("/");
                    alert("You Have Successfully Saved New Location")
                        });
                }
                // for table to view a modal sample only
                $scope.get_name = function(client){
                    $scope.msg = client;
                }
                //end of table to view a modal sample only


            });
            
            
            
            app.controller("locations_functionalities_cntrlr", function($scope, $location){
                $scope.view_location_list = function(){
                    $location.path("/")
                }
                $scope.add_new_location = function(){
                    $location.path("/add_new_location");
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
                        var i = $(get).load("<?php echo base_url(); ?>index.php/admin/Notification_Messages/request/success/" + success +"/" + message +"/" + get);
                        return i;
                    }
</script>