<?php
    if (!empty($_POST)) {
        require_once("classes/DBClass.php");                                
        $db = new DBClass();

        $login = $_POST['phone'] ?? '';
        $userName = $_POST['user-name'] ?? '';
        $theme = $_POST['theme'] ?? '';

        if($db->addUserApp($login, $userName, $theme))
            echo json_encode('OK');
        else
            echo json_encode('Error');
    }         