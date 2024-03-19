<?php
session_start();
if (!empty($_SESSION['auth'])){
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $userId = $_SESSION['id'];
    $isLiked = $_GET['is-liked'] ?? null;
    $carId = $_GET['car-id'] ?? null;

    if($isLiked != null and $carId !=null){
        if($isLiked == 'false')    
            $db->addLikedCar($carId, $userId);
        else
            $db->delLikedCar($carId, $userId);
    }
    echo json_encode("OK");
}
else
    echo json_encode("Auth required");
?>