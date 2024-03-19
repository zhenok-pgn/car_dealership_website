<?php 
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $sells = $db->getSells();                  
    unset($db);
    echo json_encode(["content"=>$sells]);
?>