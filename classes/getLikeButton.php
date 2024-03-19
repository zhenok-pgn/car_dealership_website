<?php
    require_once('LikeButtons.php');
    if(!empty($_GET)){
        $isLiked = $_GET['isLiked'];
        if($isLiked == 'true')
            echo json_encode(getLikedButt());
        else
            echo json_encode(getUnlikedButt());
    }
