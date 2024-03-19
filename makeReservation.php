<?php
session_start();
if (!empty($_SESSION['auth'])){
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $userId = $_SESSION['id'];
    $isReserved = $_GET['is-reserved'] ?? null;
    $carId = $_GET['car-id'] ?? null;

    $res = null;
    if($isReserved != null and $carId !=null){
        if($isReserved == 'false')    
            $res = $db->addReservation($carId, $userId);
        else
            $res = $db->delReservation($carId, $userId);
    }
    if($res)
        echo json_encode("OK");
    else
        echo json_encode("Error");
}
else
    echo json_encode("Auth required");
?>