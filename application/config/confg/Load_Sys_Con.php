<?php

error_reporting(0);
class Load_Sys_Con{
    public function make_folder_request(){
        $current_dir = getcwd();
        $check_date = date("Y");
       $check = is_dir($current_dir. "/Uploads/$check_date");
       if($check == FALSE){
           mkdir("$current_dir . /Uploads/$check_date", 7777);
           $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rmni_portal";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM client_contract where enabled = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $client_contract_name = $row["client_name"];
                    $client_contract_id = $row['contract_client_id'];
                    mkdir("$current_dir . /Uploads/$check_date/$client_contract_name", 7777);
                    $sql_locations = "SELECT * FROM contarct_and_locations where client_contract_id = '$client_contract_id' and enabled = 1";
                    $result_locations = $conn->query($sql_locations);
                    if($result_locations->num_rows > 0){
                        while($row_locations = $result_locations->fetch_assoc()){
                            $location_id = $row_locations['location_id'];
                            $sql_location_name = "SELECT * FROM locations where location_id = '$location_id' and enabled = 1";
                            $result_location_name = $conn->query($sql_location_name);
                            if($result_location_name->num_rows > 0){
                                while($row_locations_name = $result_location_name->fetch_assoc()){
                                    $location_name = $row_locations_name['location_name'];
                                    $check_location_dir = is_dir("C:/xampp/htdocs/rmniportal/Uploads/$check_date/$client_contract_name");
                                    if($check_location_dir == TRUE){
                                        mkdir("$current_dir . /Uploads/$check_date/$client_contract_name/$location_name", 7777);
                                        mkdir("$current_dir . /Uploads/$check_date/$client_contract_name/$location_name/transits", 7777);
                                    }else{
                                       echo 0;
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                    
                }
            } else {
                echo "0 results";
            }
            $conn->close();
           /*mkdir("$current_dir . /Uploads/$check_date/clients_contract", 7777);
           mkdir("$current_dir . /Uploads/$check_date/clients_contract/location", 7777);
           mkdir("$current_dir . /Uploads/$check_date/clients_contract/location/type_of_ads", 7777);
           mkdir("$current_dir . /Uploads/$check_date/clients_contract/location/type_of_ads/ads", 7777);*/
       }else{
           $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rmni_portal";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM client_contract where enabled = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $client_contract_name = $row["client_name"];
                    $client_contract_id = $row['contract_client_id'];
                    mkdir("$current_dir . /Uploads/$check_date/$client_contract_name", 7777);
                    //mkdir("$current_dir . /Uploads/$check_date/$client_contract_name/location", 7777);
                    $sql_location_name = "SELECT * FROM contarct_and_locations where client_contract_id = $client_contract_id and enabled = 1";
                    $result_location_name = $conn->query($sql_location_name);
                    if($result_location_name->num_rows > 0){
                        while($location_name_row = $result_location_name->fetch_assoc()){
                            $get_location_id = $location_name_row['location_id'];
                            $slq_location_output_true_name = "SELECT * FROM locations where location_id = $get_location_id and enabled = 1";
                            $result_location_output_true_name = $conn->query($slq_location_output_true_name);
                            if($result_location_output_true_name->num_rows > 0){
                                while($result_location_output_true_name_row = $result_location_output_true_name->fetch_assoc()){
                                    $get_location_data_given_name = $result_location_output_true_name_row['location_name'];
                                    mkdir("$current_dir . /Uploads/$check_date/$client_contract_name/$get_location_data_given_name", 7777);
                                    mkdir("$current_dir . /Uploads/$check_date/$client_contract_name/$get_location_data_given_name/transits", 7777);
                                }
                            }
                        }
                        
                    }
                }
            } else {
                echo "0 results";
            }
            $conn->close();
       }
    }
}


?>