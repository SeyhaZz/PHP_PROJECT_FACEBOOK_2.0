<?php
    require_once('../models/post.php');
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    registerAccount($email, $firstName, $lastName, $password, $gender);
    $userID = getUserByEmailAndPass($email, $password)["user_ID"];
    if (!empty($userID)) {
        $_SESSION["userID"] = $userID;
        header("location: ../views/home_view.php");
    }
?>