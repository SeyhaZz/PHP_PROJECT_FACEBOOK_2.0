<?php 
    session_start();
    if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
        session_destroy();
    }
?>

<?php
require_once("templates/header.php");
?>

<!-- WELCOME PAGE -->
<div class="mt-5 d-flex justify-content-between">
    <div class="bg-primary text-welcome d-flex justify-content-center flex-column">
        <p class="text-light m-0">WELCOME TO</p>
        <img src="images/logo.png" alt="">
        <p class="text-light m-0">FACEBOOK 2.0</p>
    </div>
    <div class="welcome-menu">
        <form class="m-3" action="" method="post">
            <div class="form-title d-flex justify-content-center"><p class="text-primary mt-3">LOG IN</p></div>
            <div class="w-100 m-auto">
                <label for="email">Email</label>
                <input class="w-100 fill" id="email" name="email" type="text" placeholder="Email address">
                <small></small>
            </div>
            <div class="w-100 mt-4 m-auto">
                <label for="password">Password</label>
                <input class="w-100 fill" id="password" name="password" type="password" placeholder="Password">
                <small></small>
            </div>
            <div class="w-100 mt-5 m-auto">
                <p class="failed-alert m-auto m-0 mb-2 text-danger"><?php
                    require_once("controllers/log_in_controller.php");
                ?></p>
                <button type="submit" class="w-100 p-1 btn-primary m-auto">LOG IN</button>
            </div>
        </form>

        <div class="w-75 d-flex justify-content-center m-auto">
            <a class="p-1 px-4 bg-warning m-auto mb-5" href="views/register_account_view.php">REGISTER AN ACCOUNT</a>
        </div>
    </div>
</div>

<?php
require_once("templates/footer.php");
?>