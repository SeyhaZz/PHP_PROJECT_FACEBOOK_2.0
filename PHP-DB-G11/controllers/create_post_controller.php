<?php session_start();
    require_once('../models/post.php');

    // ADD POST
    $description = $_POST['description'];
    $photo = $_FILES['image'];
    $userID = $_SESSION["userID"];
    if (!empty($description) or ($photo['name'] != null)){
        createPost($description, $photo,$userID);
        header("location: ../views/home_view.php");
    }else{
        $massage = "You must add your description or image";
        header("location: ../views/create_post_view.php?error=$massage");
    }
?>