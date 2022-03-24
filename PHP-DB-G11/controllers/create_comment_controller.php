<?php session_start();

    require_once("../models/comment.php");
    if (!empty($_POST['comment'])) {
        $content = $_POST['comment'];
        $userID = $_SESSION["userID"];
        $postID = $_GET["postID"];
        createComment($content, $postID,$userID);
    }
    header("location: ../views/home_view.php");
    
?>