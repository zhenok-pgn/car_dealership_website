<?php
        if (!empty($_POST)) {
            require_once("classes/DBClass.php");                                
            $db = new DBClass();

            $login = $_POST['login'] ?? '';
            $userName = $_POST['name'] ?? '';
            $location = $_COOKIE['request'] ?? "index.php";

            $db->updateUser($login, $userName);
        }
            header("Location: $location");
      ?>