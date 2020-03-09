<?php

echo a();
function a(){
    $a = array(
        'name' => 'john',
        'age' =>30,
        'number' =>1234567890
    );
    $dec = json_encode($a);
    return $dec;
}



?>