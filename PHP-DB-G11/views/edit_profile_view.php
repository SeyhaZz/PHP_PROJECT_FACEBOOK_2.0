<?php session_start();
    require_once("../templates/header.php");
    require_once("../models/validation.php");
?>


<?php

$error_email = "";
$error_username = "";
$error_phone = "";


$isCanUpdate = FALSE;

// CHECK IF EMAIL IS VALID
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

// CHECK IF FIRSTNAME AND LASTNAME IS VALID
if (isset($_POST["firstName"]) and isset($_POST["lastName"])) {
    if (!empty($_POST["firstName"]) and !empty($_POST["lastName"])) {
        $valid_username = validate_username($_POST["firstName"], $_POST["lastName"]);
        if (!$valid_username) {
            $error_username = "Username must not containts special characters or space";
        }
    } else {
        $error_username = "Please input both firstname and lastname";
    }
}

// CHECK PHONE NUMBER
if (isset($_POST["phone"])) {
    if (!empty($_POST["phone"])) {
        $valid_phone = validate_phone($_POST["phone"]);
        if (!$valid_phone) {
            $error_phone = "Phone number must be 9-12 characters";
        }
    }
}

if (isset($valid_email) and isset($valid_username) and isset($valid_phone)) {
    if ($valid_email and $valid_username and $valid_phone) {
        $isCanUpdate = TRUE;
    }
} else if (isset($valid_email) and isset($valid_username) and !isset($valid_phone)) {
    if ($valid_email and $valid_username) {
        $isCanUpdate = TRUE;
    }
}


if ($isCanUpdate) {
    require_once("../controllers/edit_profile_controller.php");
}

?>





    <?php
    // GET USER INFORMATION
    require_once("../models/post.php");
    $userID = $_SESSION["userID"];
    $userInfo = getUserById($userID)

    ?>

    <form class="py-5 m-4" action="../views/edit_profile_view.php" method="post" enctype="multipart/form-data">
        <div class="w-100 m-auto form-title d-flex justify-content-center"><p class="text-primary">UPDATE PROFILE</p></div>
        <label for="email">Email address</label>
        <input class="w-100 fill" id="email" type="text" placeholder="Email address" name="email" value="<?php 
            if (isset($_POST["email"])) {
                if (!empty($_POST["email"])) {
                    echo $_POST["email"];
                }
            } else { 
                echo $userInfo["email"]; 
            }
        ?>">
        <small class="text-danger"><?php echo $error_email; ?></small>
        <div class="w-100 fill-block">
            <div>
                <label for="firstname">First name</label>
                <input class="w-100 fill"  id="firstname" name="firstName" type="text" placeholder="First name" value="<?php
                    if (isset($_POST["firstName"])) {
                        if (!empty($_POST["firstName"])) {
                            echo $_POST["firstName"];
                        }
                    } else { 
                        echo $userInfo["firstName"]; 
                    }
                ?>">
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input class="w-100 fill"  id="lastname" name="lastName" type="text" placeholder="Last name" value="<?php 
                    if (isset($_POST["email"])) {
                        if (!empty($_POST["lastName"])) {
                            echo $_POST["lastName"];
                        }
                    } else { 
                        echo $userInfo["lastName"]; 
                    } 
                ?>">
            </div>
            <small class="text-danger"><?php echo $error_username; ?></small>
        </div>
        <div class="w-100 fill-block">
            <div>
                <label for="dateofbirth">Date of birth</label>
                <input class="w-100 fill" name="dateOfBirth"   id="dateofbirth" type="date" value="<?php echo $userInfo["dateOfBirth"]; ?>">
            </div>
            <div>
                <label for="phone">Phone number</label>
                <input class="w-100 fill" name="phone"  id="phone" type="numbers" placeholder="Phone number" value="<?php 
                    if (isset($_POST["phone"])) {
                        if (!empty($_POST["phone"])) {
                            echo $_POST["phone"];
                        }
                    } else { 
                        echo $userInfo["phone"]; 
                    }
                ?>">
                <small class="text-danger"><?php echo $error_phone; ?></small>
            </div>
        </div>
        <div class="d-flex mt-4">
            <div class="d-flex gender">
                <input type="radio" name="gender" value="M" id="Man" <?php if ($userInfo["gender"] == "M") { echo "checked"; }; ?>>
                <label for="Man">Man</label>
            </div>
            <div class="d-flex px-3 gender">
                <input type="radio" name="gender" value="F" id="Woman" <?php if ($userInfo["gender"] == "F") { echo "checked"; }; ?>>
                <label for="Woman">Woman</label>
            </div>
        </div>
        <div class="w-100 m-auto d-flex justify-content-between mt-3">
            <div class="profile-upload d-flex flex-column">
                <label class="bg-primary text-light py-1 px-3 cursor" for="profile_image">Upload profile image</label>
                <input name="profile_image" onchange="showProfileUploaded(event)" class="upload-img" type="file" id="profile_image" hidden>
                <img class="mt-2 profile-show profile-image-show ucrsor" src="../images/<?php if (!empty($userInfo["profile_image"])) { print_r($userInfo["profile_image"]); } ?>" alt="">
            </div>
            <div class="profile-upload d-flex flex-column">
                <label class="bg-primary text-light py-1 px-3" for="cover_image">Upload cover image</label>
                <input name="cover_image" onchange="showCoverUploaded(event)" class="upload-img" type="file" id="cover_image" hidden>
                <img class="mt-2 img-show cover-image-show" src="../images/<?php if (!empty($userInfo["cover_image"])) { print_r($userInfo["cover_image"]); } ?>" alt="">
            </div>

            <script>
                function showProfileUploaded(event) {
                    var profileImage = document.querySelector(".profile-image-show");
                    profileImage.src = URL.createObjectURL(event.target.files[0]);
                }
                function showCoverUploaded(event) {
                    var coverImage = document.querySelector(".cover-image-show");
                    coverImage.src = URL.createObjectURL(event.target.files[0]);
                }
            </script>

        </div>
        <div class="d-flex justify-content-between">
            <a class="p-2 bg-warning db-button pointer" href="profile_view.php">Cancel</a>
            <button type="submit" class="p-2 save btn-primary db-button">SAVE</button>
        </div>
    </form>
<?php
require_once("../templates/footer.php");
?>