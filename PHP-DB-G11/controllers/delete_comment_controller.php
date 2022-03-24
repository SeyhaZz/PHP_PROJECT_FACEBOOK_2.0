<?php
    require_once("../models/comment.php");
    $comment_ID = $_POST['comment_ID'];
    deleteComment($comment_ID);
    header("location: ../views/home_view.php");

?>