<div class="alert alert-<?php echo $data;    ?> alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?php $message = (explode("_",$notification_message)); echo $message[0] . " " . $message[1] . " " .  $message[2] . " " .  $message[3] . " " .  $message[4] . " " .  $message[5] . " " .  $message[6] . " " .  $message[7]; ?>.
                </div>