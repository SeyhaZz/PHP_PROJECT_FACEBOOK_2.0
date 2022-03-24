<?php
    require_once("../models/comment.php");
    $postID = $post['post_ID'];
    $comments = postComment($postID);
?>