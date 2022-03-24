<?php
    require_once('../models/post.php');

    // ADD FRIEND
    if (isset($_POST["Addfriend"])) {
        if (isset($_POST["friendID"])) {
            if (!empty($_POST["friendID"])) {
                $friendID = $_POST["friendID"];
                $userID = $_SESSION["userID"];
                addFriend($userID, $friendID);
            };
        };
    }
    // UNFRIEND
    if (isset($_POST["Unfriend"])) {
        if (isset($_POST["friendID"])) {
            if (!empty($_POST["friendID"])) {
                $friendID = $_POST["friendID"];
                $userID = $_SESSION["userID"];
                unfriend($userID, $friendID);
            };
        };
    }
?>