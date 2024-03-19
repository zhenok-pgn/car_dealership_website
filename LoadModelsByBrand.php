<?php 
    require_once("classes/DBClass.php");       
    $brand = $_POST["Id"];                         
    $db = new DBClass();
    $models = $db->getModelsByBrand($brand);                  
    unset($db);
    echo json_encode(["content"=>$models]);
?>