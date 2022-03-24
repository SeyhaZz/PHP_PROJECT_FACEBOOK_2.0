<?php  

require_once('../models/post.php');

    // UPDATE A POST
    $postId = $_POST["postId"];
    $photo = $_FILES['image'];
    $description = $_POST['description'];
    updatePost($postId, $description,$photo);
    $userID = $_GET["userID"];
    header("location: ../views/home_view.php");
    
?>