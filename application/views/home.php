<form action="<?php echo base_url(); ?>index.php/Upload/do_upload" method="post" enctype="multipart/form-data">
	<input type="file" name="userFile"/>
	<input type="submit"/>
</form>



<?php

uploadFTP("127.0.0.1", "admin", "mydog123", "C:\\report.txt", "meeting/tuesday/report.txt");

function uploadFTP($server, $username, $password, $local_file, $remote_file){
    // connect to server
    $connection = ftp_connect($server);

    // login
    if (@ftp_login($connection, $username, $password)){
        // successfully connected
    }else{
        return false;
    }

    ftp_put($connection, $remote_file, $local_file, FTP_BINARY);
    ftp_close($connection);
    return true;
}

?>