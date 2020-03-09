<?php $this->load->view('include/header/header'); ?>





<div ng-app="myApp">
    <div>







        <table class="table table-bordered text-center" style="margin-left: 19%;">
            <tbody>

                <tr ng-controller="clients_functionalities_cntrlr">


                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="load_all_client_list()">View Clients</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-primary btn-sm" ng-click="add_clients()">Add Clients</button>
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
            templateUrl: "clients/request/view_all_clients_empty_page",
            controller: "get_all_clients_model"
            })
            .when("/view_client_details/:client_id/:client_name/:contact_number", {
            templateUrl: "Clients/request/view_clients_detail_empty_page",
            controller: "client_details_list"
            })
            .when("/view_account_details/:client_id", {
            templateUrl: "Clients_Account/request/view_clients_account_details",
                        controller: "display_client_account_model"
            })
            .when("/regester_clients", {
            templateUrl: "Clients/request/regester_clients",
                        controller: "regester_client_cntrlr"
            })
            .when("/redirect_view_clients_details", {
                redirectTo: '/',
                controller: "get_all_clients_model"
            }).otherwise({
                redirectTo: '/'
            });
    });
    
    app.controller('get_all_clients_model', function ($scope, $http, $location) {
        $http.get("<?php echo base_url(); ?>/index.php/admin/Clients/request/view_client_model")
                .then(function (response) {
                    $scope.clients_details = response.data.data;
                });
        $scope.delete_client = function (client_id) {
            $http.get("<?php echo base_url(); ?>index.php/admin/Clients/delete_client_data/" + client_id)
                    .then(function (response) {
                        $location.path("/redirect_view_clients_details");
                    });
        }
        $scope.view_client_details_page = function (client_id, client_name, contact_number) {
            $location.path("/view_client_details/" + client_id + "/" + client_name + "/" + contact_number);
        }


    });
    
    app.controller('client_details_list', function ($scope, $http, $routeParams) {
        $scope.client_id = $routeParams.client_id;
        $scope.client_name = $routeParams.client_name;
        $scope.contact_number = $routeParams.contact_number;
        $scope.update_client_details = function (client_id) {
            client_name_data = $scope.client_name;
            contact_number_data = $scope.contact_number;
            $http.get("<?php echo base_url(); ?>index.php/admin/Clients/request/update_clients_data/" + client_id + "/" + client_name_data + "/" + contact_number_data)
                    .then(function (response) {

                        $scope.client_name = client_name_data;
                        $scope.contact_number = contact_number_data;
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
        $scope.add_clients = function(){
            $location.path("/regester_clients");
        }
    });
    
    app.controller('regester_client_cntrlr', function($scope, $http){
        $scope.regester_client_details = function(){
            var client_name = $scope.client_name;
            var contact_number = $scope.contact_number;
            $http.get("<?php echo base_url(); ?>index.php/admin/Clients/request/regester_clients_data_model/" + client_name + "/" + contact_number)
                    .then(function (response) {

                        $scope.client_name = "";
                        $scope.contact_number = "";
                        ///calling a jquery
                        load_message_notification();
                        ///end of calling a jquery
                        ///
                    });
        }
    });
    var load_message_notification = function () {
        var i = $("#add_on_panel").load("<?php echo base_url(); ?>index.php/admin/Clients_Account/request/message_notification");
        return i;
    }
</script>