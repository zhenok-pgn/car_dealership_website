<?php 
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $themes = $db->getThemes();                  
    unset($db);
    echo json_encode(["content"=>$themes]);
?>