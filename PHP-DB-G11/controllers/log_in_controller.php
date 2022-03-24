<?php 
    require_once('models/post.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = getUserByEmailAndPass($email, $password);
        if (!empty($user)) {
            $userEmail = $user["email"];
            $userPassword = $user["userPassword"];
            if (!empty($email) and !empty($password) and $email == $userEmail and "$password" == $userPassword) {
                $_SESSION['userID'] = $user["user_ID"];
                header('Location: ../views/home_view.php');

            } else {
                echo "Wrong email or password!";
            }
        } else {
            echo "Wrong email or password!";
        }
    }
?>