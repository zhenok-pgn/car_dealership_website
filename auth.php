<?php

function checkReg(string $login, string $password, string $userName)
{
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $users = $db->getUsers();

    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return null;
        }
    }

    $res = $db->addUser($login, $password, $userName);
    
    return $res;
}

function getUserByLoginIfExist(string $login)
{
    require_once("classes/DBClass.php");                                
    $db = new DBClass();
    $user = $db->getUserByLogin($login);
    unset($db);
    return $user;
}
