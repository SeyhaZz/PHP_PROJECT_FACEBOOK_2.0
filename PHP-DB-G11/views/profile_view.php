<?php session_start();
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {    
    
?>

    <?php
    // GET USER INFORMATION
    if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {    
        require_once("../models/post.php");
        $user = getUserById($_SESSION["userID"]);
        if (isset($_GET["seykey"])) {
            $user = getUserById($_GET["seykey"]);
        }
    };
    ?>

    <!-- PROFILE AND DETAILS -->
    <div class="mt-4 profile-container">
        <div class="profile-image-parent">
            <div class="cover-image-container d-flex justify-content-center"><img class="cover-image" src="../images/<?php if (!empty($user["cover_image"])) { echo $user["cover_image"]; } ?>" /></div>
            <div class="profile-image-container d-flex">
                <div class="profile-image"><img class="img-circle" src="../images/<?php
                    if (!empty($user["profile_image"])) {
                        echo $user["profile_image"];
                    } else {
                        if($user["gender"] == "M") {
                            echo "man.png"; 
                        } else {
                            echo "woman.png"; 
                        } 
                    }
                ?>" alt="" width="100%" heigh="100%"></div>
                <span class="mb-4 px-4"><?php echo $user["firstName"] . " " . $user["lastName"] ?></span>
            </div>
        </div>
        <div class="profile-details d-flex flex-column mb-5">
            <p class="mb-0">Gender: <?php 
                if ($user["gender"] == "M") {
                    echo "Male";
                } else {
                    echo "Female";
                };
            ?></p>
            <p class="mb-0">Date of birth: <?php 
                if (!empty($user["dateOfBirth"]) and $user["dateOfBirth"] != "0000-00-00") {
                    $dates = $user["dateOfBirth"]; 
                    $newDate = new DateTime($dates);
                    echo $newDate->format("jS F Y");
                } else {
                    echo "Unknown";
                };
            ?></p>
            <p class="mb-0">Phone: <?php 
                if ($user["phone"] != null) {
                    echo $user["phone"];
                } else {
                    echo "Unknown";
                };
            ?></p>
            <button class="btn-edit-profile w-100 bg-primary mt-3" <?php
                if (isset($_GET["seykey"])) {
                    if ($_GET["seykey"] != $_SESSION["userID"]) {
                         echo "hidden"; 
                    } 
                }
            ?>>
                <a class="text-light" href="edit_profile_view.php">EDIT PROFILE</a>
            </button>
            <hr>
        </div>
        
        


        <?php
        // BUTTON CREATE POST
        require_once("btn_add_post_view.php");
        ?>


        <div class="user-won-posts">
        <?php
        // GET USER POSTS
        if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
            require_once("../models/post.php");
            $currentUser = getUserById($_SESSION["userID"]);
            $posts = getUserPostsByUserId($_SESSION["userID"]);
            if (isset($_GET["seykey"])) {
                if ($_GET["seykey"] != $_SESSION["userID"]) {
                    $currentUser = getUserById($_GET["seykey"]);
                    $posts = getUserPostsByUserId($_GET["seykey"]); 
                } 
            }
            if (!empty($posts)) {
                foreach ($posts as $index => $post) {
        ?>
            <div class="card w-100 post border-0 mt-3">
            
                <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
                    <div class="post-owner d-flex w-100">
                        <a class="profile-contain d-flex" href=""><img src="../images/<?php
                            if (!empty($currentUser["profile_image"])) {
                                echo $currentUser["profile_image"];
                            } else {
                                if($user["gender"] == "M") {
                                    echo "man.png"; 
                                } else {
                                    echo "woman.png"; 
                                } 
                            }
                        ?>" alt=""></a>
                        <div class="details">
                            <a class="user-name" href=""><?php echo $post["firstName"] . " " . $post["lastName"] ?></a>
                            <p class="m-0"><?php
                                $date = $post["postDate"]; 
                                $newDate = new DateTime($date);
                                echo $newDate->format("l jS F Y h:i:s A");
                            ?></p>
                        </div>
                    </div>
                    <div <?php
                        if (isset($_GET["seykey"])) {
                            if ($_GET["seykey"] != $_SESSION["userID"]) {
                                echo "hidden"; 
                            }
                        }
                    ?> class="btn-group">
                        <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons post-menu">more_horiz</i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href= "../controllers/delete_post_controller.php?post_ID=<?php echo $post['post_ID']; ?>" class="dropdown-item text-danger">Delete</a></li>
                            <li><a href="edit_post_view.php?postId=<?php echo $post["post_ID"]; ?>" class="dropdown-item text-primary">Edit</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card-body px-0 post-body w-100 border-0">
                    <p><?php echo $post["description"] ?></p>
                    <img class="w-100" src="../images/<?php echo $post['image'];?>" alt="">
                </div>

                <div class="card-footer px-0 w-100 py-0 mb-4 border-0 post-footer d-flex justify-content-between">
                    <iframe name="like" style="display:none;"></iframe>
                    <form action="<?php
                        if ($_SERVER["REQUEST_METHOD"] = "POST") {
                            require_once("../controllers/like_controller.php");
                        }
                    ?>" method="post" class="d-flex like reaction" target="like">
                        <input type="hidden" name="postID" value="<?php echo $post["post_ID"] ?>">
                        <button type="submit"><i onclick="increaseLike(<?php echo $index; ?>)" class="material-icons like like-icon" id="<?php echo $index; ?>">thumb_up</i></button>
                        <span class="px-1"><small class="numberOfLikes" id="<?php echo $index; ?>"><?php echo $post["numberOfLikes"]; ?></small> Likes</span>

                        <!-- SCRIPT TO INCREASE LIKE AND CHANGE COLOR-->
                        <script>
                            function increaseLike(number) {
                                currentLike = document.querySelectorAll(".numberOfLikes")[number].textContent;
                                document.querySelectorAll(".numberOfLikes")[number].textContent = parseInt(currentLike) + 1;
                                document.querySelectorAll(".like-icon")[number].style.color = "blue";
                            }
                        </script>
                    </form>
                    <div class="d-flex comment reaction">
                        <i class="material-icons">comment</i>
                        <span class="px-1"><?php echo $post["numberOfComments"]; ?> Comments</span>
                    </div>

                        <?php require_once("../controllers/post_comment_controller.php"); ?>
                    </div>
                    <div  class="w-100 show-comment overflow-scroll mb-4">
                        <div class="comment-controll w-100">
                            <iframe name="comment" style="display:none;"></iframe>
                            <form class="content-comment d-flex justify-content-end align-items-center" 
                                action="../controllers/create_comment_controller.php?postID=<?php echo $post["post_ID"]?>&userID=<?php echo $post['user_ID']?>" method="post" >
                                <a href="profile_view.php" class="me-1"><img class="img-pro rounded-circle" src="../images/<?php
                                    if (!empty($currentUser["profile_image"])) {
                                        echo $currentUser["profile_image"];
                                    } else {
                                        if($currentUser["gender"] == "M") {
                                            echo "man.png"; 
                                        } else {
                                            echo "woman.png"; 
                                        } 
                                    }
                                ?>" alt=""></a>
                                <input name="comment" class="w-100 rounded-pill ps-3 pt-1 pb-2 h-100" placeholder="Type here..."
                                    type="text">
                                <button class="bg-light" type="submit"><img class="img-send" src="../images/send.png" alt=""></button>
                            </form>
                            <hr>
                        </div>
                        <!-- GET COMMENTS -->
                        <div class="">
                            <?php
                                foreach($comments as $comment) :
                                    if($post['post_ID'] == $comment['post_ID']){
                                        $user = getUserById($comment["user_ID"]);
                            ?>
                            <div class="content-comment mt-3 d-flex justify-content-end">
                                <a href="profile_view.php?seykey=<?php echo $comment["user_ID"]; ?>" class="me-1"><img class="img-pro rounded-circle" src="../images/<?php
                                    if (!empty($user["profile_image"])) {
                                        echo $user["profile_image"];
                                    } else {
                                        if($user["gender"] == "M") {
                                            echo "man.png"; 
                                        } else {
                                            echo "woman.png"; 
                                        } 
                                    }
                                ?>" alt=""></a>
                                <span class="rounded pt-0 px-2 h-100 border-2 border-primary bg-primary">
                                    <div class="text-light"><?php 
                                        echo $comment['content'];
                                    ?></div>
                                    <div class="comment-date"><?php 
                                        $dates = $comment['commentDate'];
                                        $newDate = new DateTime($dates);
                                        echo $newDate->format("jS F Y");
                                    ?></div>
                                </span>
                                <form <?php 
                                    if ($comment["user_ID"] != $_SESSION["userID"] and $post["user_ID"] != $_SESSION["userID"]) {
                                        echo "hidden";
                                    } 
                                ?> action="../controllers/delete_comment_controller.php" method="post"> 
                                    <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons post-menu">more_vert</i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <input type="hidden" value="<?php echo $comment['comment_ID']  ?>" name="comment_ID" id="">
                                        <button type="submit"><i class="material-icons text-danger">delete_forever</i></button>
                                        <a href="edit_comment_view.php?comment_ID=<?php echo $comment['comment_ID'] ?>"> <i class="text-primary material-icons">edit</i></a>
                                    </div>
                                </form> 
                            </div>
                            <?php
                                };   
                                endforeach 
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
                };
            };
        };
        ?>

        </div>

    </div>


<script>

    var profile = document.querySelector(".profile-page");
    profile.style.color = "red";
    profile.style.borderBottom = "solid 3px red";

</script>

<?php
} else {
    header("location: ../index.php");
}
require_once("../templates/footer.php");
?>