<?php
    require_once('../models/post.php');
    $post_ID = $_GET['post_ID'];
    deleteItem($post_ID);
    
    header("location: ../views/home_view.php");
?>