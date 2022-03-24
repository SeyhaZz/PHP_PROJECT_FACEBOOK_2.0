<?php 
require_once('../models/post.php');
if (!empty($_POST["postID"])) {
    $userID = $_SESSION["userID"];
    $postID = $_POST["postID"];
    likePost($userID, $postID);
}

?>