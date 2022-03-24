<?php session_start();
require_once("../templates/header.php");
require_once("../models/validation.php");
?>


<?php

$error_email = "";
$error_username = "";
$error_password = "";


$isCanRegister = FALSE;


if (isset($_POST["email"])) {
    if (!empty($_POST["email"])) {
        $valid_email = validate_email($_POST["email"]);
        if (!$valid_email) {
            $error_email = "Wrong email, email must contains @";
        }
    } else {
        $error_email = "Please input email";
    }
}

if (isset($_POST["firstName"]) and isset($_POST["lastName"])) {
    if (!empty($_POST["firstName"]) and !empty($_POST["lastName"])) {
        $valid_username = validate_username($_POST["firstName"], $_POST["lastName"]);
        if (!$valid_username) {
            $error_username = "Username must not containts special characters";
        }
    } else {
        $error_username = "Please input both firstname and lastname";
    }
}

if (isset($_POST["password"]) and isset($_POST["cfpassword"])) {
    if (!empty($_POST["password"]) and !empty($_POST["cfpassword"])) {
        $valid_password = validate_password($_POST["password"], $_POST["cfpassword"]);
        if (!$valid_password) {
            $error_password = "Both must be the same and 8-12 characters";
        }
    } else {
        $error_password = "Please input both password password and confirm password";
    }
}


if (isset($valid_email) and isset($valid_username) and isset($valid_password)) {
    if ($valid_email and $valid_username and $valid_password) {
        $isCanRegister = TRUE;
    }
}

if ($isCanRegister) {
    require_once("../controllers/register_account_controller.php");
}

?>

    <!-- FROM TO REGISTER ACCOUNT -->
    <form class="py-5 m-4" action="../views/register_account_view.php" method="post">
        <a href="../index.php"><i class="material-icons">arrow_back</i></a>
        <div class="form-title d-flex justify-content-center"><p class="text-primary">REGISTER ACCOUNT</p></div>
        <input class="w-100 fill" type="text" placeholder="Email address" name="email" value="<?php if (isset($_POST["email"])) { echo $_POST["email"]; }; ?>">
        <small class="text-danger"><?php echo $error_email; ?></small>
        <div class="w-100 fill-block">
            <div>
                <input class="w-100 fill" name="firstName" type="text" placeholder="First name" value="<?php if (isset($_POST["firstName"])) { echo $_POST["firstName"]; }; ?>">
            </div>
            <div>
                <input class="w-100 fill" name="lastName" type="text" placeholder="Last name" value="<?php if (isset($_POST["lastName"])) { echo $_POST["lastName"]; }; ?>">
            </div>
            <small class="text-danger"><?php echo $error_username; ?></small>
        </div>
        <div class="w-100 fill-block">
            <div>
                <input class="w-100 fill" name="password" type="password" placeholder="Create password">
            </div>
            <div>
                <input class="w-100 fill" name="cfpassword" type="password" placeholder="Confirm password">
            </div>
            <small class="text-danger"><?php echo $error_password; ?></small>
        </div>
        <div class="d-flex mt-4">
            <div class="me-3">Gender:</div>
            <div class="d-flex gender">
                <input type="radio" name="gender" value="M" id="Man" <?php if (isset($_POST["gender"]) and $_POST["gender"] == "M") { echo "checked"; } else { echo "checked"; }; ?>>
                <label for="Man">Man</label>
            </div>
            <div class="d-flex px-3 gender">
                <input type="radio" name="gender" value="F" id="Woman" <?php if (isset($_POST["gender"]) and $_POST["gender"] == "F") { echo "checked"; }; ?>>
                <label for="Woman">Woman</label>
            </div>
        </div>
        <button type="submit" class="w-100 p-2 save btn-primary btn-register">REGISTER ACCOUNT</button>
    </form>

    <?php
require_once("../templates/footer.php");
?>