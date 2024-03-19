<?php 
    $brand = $_GET["brand"];
    $model = $_GET["model"];
    $priceLow = $_GET["price-low"];
    $priceHigh = $_GET["price-high"];
    $condition = $_GET["condition"];

    $brand = isset($brand) && !empty($brand) ? $brand : NULL;
    $model = isset($model) && !empty($model) ? $model : NULL;
    $priceLow = isset($priceLow) && !empty($priceLow) ? $priceLow : NULL;
    $priceHigh = isset($priceHigh) && !empty($priceHigh) ? $priceHigh : NULL;
    $condition = isset($condition) && !empty($condition) ? $condition : NULL;

    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $cars = $db->getCars($brand, $model, $priceLow, $priceHigh, $condition);                  
    unset($db);
    echo json_encode(["content"=>$cars]);
?>