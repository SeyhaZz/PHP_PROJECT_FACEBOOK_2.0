<?php session_start();
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {  
?>



    <!-- FRIENDS SHOW -->
    <div>
        <!-- MENU -->
        <div class="fri-menu-container d-flex mt-5 bg-light py-2">
            <form action="../views/friends_view.php" method="post">
                <input type="hidden" name="addFriends" value="addFriend">
                <button class="btn btn-primary me-3 text-ligh">Other Users</button>
            </form>
            <form action="../views/friends_view.php" method="post">
                <input type="hidden" name="seeFriends" value="seeFriend">
                <button class="btn btn-warning text-dark">My friends</button>
            </form>
        </div>

        <!-- SHOW ALL USERS & FRIENDS-->
        <div class="d-flex flex-column py-3 fr-show-height">

            <?php
            // CALL FUNCTION OF USERS INFORMATION
            require_once("../models/post.php");
            if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
                $usersID = getAllUsersNotFriend($_SESSION["userID"]);
                if (isset($_POST["seeFriends"]) and $_GET["friends"] = "seeFriend") {
                    $usersID = getAllUsersWhoFriend($_SESSION["userID"]);
                }
                if (isset($_POST["addFriends"]) and $_POST["friends"] = "addFriend") {
                    $usersID = getAllUsersNotFriend($_SESSION["userID"]);
                }
                if (!empty($usersID)) {
                    foreach ($usersID as $index => $userID) {
                        $user = getUserById($userID["user_ID"])
            ?>

            <!-- DISPLAY USERS OR FRIEND -->
            <div onclick="hideFriend(<?php echo $index; ?>)" style="visibility:visible;" class="d-flex post-footer justify-content-between AFriend" id="$index">
                <div class="d-flex post-footer ms-4 mt-4">
                    <a class="profile-contain" href="profile_view.php?seykey=<?php echo $user["user_ID"]; ?>"><img width="50" height="50" src="../images/<?php 
                        if (!empty($user["profile_image"])) {
                            echo $user["profile_image"];
                        } else {
                            if($user["gender"] == "M") { 
                                echo "man.png"; 
                            } else { 
                                echo "woman.png"; 
                            }; 
                        }
                    ?>" alt=""></a>
                    <a class="ms-3 user-name" href="profile_view.php?seykey=<?php echo $user["user_ID"]; ?>"><?php echo $user["firstName"]  . " " . $user["lastName"] ?></a>
                </div>
                <iframe name="friend" style="display:none;"></iframe>
                <form action="
                <?php
                    if ($_SERVER["REQUEST_METHOD"] = "POST") {
                        require_once("../controllers/addfriend_or_unfriend_controller.php");
                    }
                ?>" method="post" target="friend" class="d-flex post-footer me-3">
                    <input type="hidden" name="friendID" value="<?php echo $user["user_ID"]; ?>">
                    <input type="hidden" name="<?php
                        $role = "Addfriend";
                        if (isset($_POST["seeFriends"]) and $_POST["friends"] = "seeFriend") {
                            $role = "Unfriend";
                        }
                        if (isset($_POST["addFriends"]) and $_POST["friends"] = "addFriend") {
                            $role = "Addfriend";
                        }
                        echo $role;
                    ?>">
                    <button type="submit" class="btn btn-primary text-light py-1 m-0 mt-4 btn-add-fri" >
                        <?php
                            $role = "Add-friend";
                            if (isset($_POST["seeFriends"]) and $_POST["friends"] = "seeFriend") {
                                $role = "Unfriend";
                            }
                            echo $role;
                        ?>
                    </button>

                    <!-- SCRIPT TO HIDE USER -->
                    <script>
                        function hideFriend(number) {
                            document.querySelectorAll(".AFriend")[number].style.visibility = "hidden";
                        }
                    </script>
                </form>
            </div>

            <?php
                    };
                };
            };
            ?>

        </div>

    </div>



<script>

    var friend = document.querySelector(".friend-page");
    friend.style.color = "red";
    friend.style.borderBottom = "solid 3px red";

</script>



<?php
} else {
    header("location: ../index.php");
}
require_once("../templates/footer.php");
?>