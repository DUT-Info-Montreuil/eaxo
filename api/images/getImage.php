<?php
    header('Content-Type: application/json; charset=utf-8');
    function getImage($sth) {
        if(isset($_SESSION["newsession"])) {
            $imageID = isset($_GET["imageid"]) ? $_GET["imageid"] : false;
            if($imageID) {
                $sql = "SELECT img64 FROM gallery_images WHERE id = :imgId AND ownerId = :userid";
                $get = $sth->prepare($sql);
                $get->execute(array(":imgId" => $imageID, ":userid" => $_SESSION["newsession"]));
                
                $result = $get->fetch();
                if($result) {
                    echo json_encode(array("code"=> 1, "content" =>$result['img64']));
                } else {
                    echo json_encode(array("code"=> 0, "message"=>"Critical error"));
                }
            }
        }
    }
?>