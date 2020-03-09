<?php
if($data == "success"){
    
    ?>
        
        <div class="alert alert-<?php echo $data;    ?> alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?php $message = (explode("_",$notification_message)); echo $message[0] . " " . $message[1]; ?>
                </div>
        
        <?php
    
    
    
}else if($data == "title_page"){
    ?>
<h1 style="margin-top: -39px;"><?php $message = (explode("_",$notification_message)); echo $message[0] . " " . $message[1]; ?></h1>
        
        <?php
} ?>



 

