<?php 
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $brands = $db->getBrands();                  
    unset($db);
    echo json_encode(["content"=>$brands]);
?>