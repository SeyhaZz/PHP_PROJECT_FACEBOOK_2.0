<?php session_start();
require_once("../templates/header.php");
require_once("../templates/nav_bar.php");
if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) { 
require_once("btn_add_post_view.php"); 
?>

<?php
// CALL FUNCTION OF POST INFORMATION
require_once("../models/post.php");
if (isset($_SESSION["userID"]) and !empty($_SESSION["userID"])) {
    $currentUser = getUserById($_SESSION["userID"]);
    $posts = getPosts();
    if (!empty($posts)) {
        foreach ($posts as $index => $post) {
            $user = getUserById($post["user_ID"]);
?>
<div id="contain-posts">
    <div id="controll-post" class="card w-100 post border-0 mt-3">
        <div class="card-header px-0 py-2 post-header border-0 w-100 d-flex justify-content-between">
            <div class="post-owner d-flex w-100">
                <a class="profile-contain d-flex" href="profile_view.php?seykey=<?php echo $user["user_ID"]; ?>"><img
                        src="../images/<?php
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
                <div class="details">
                    <a class="user-name"
                        href="profile_view.php?seykey=<?php echo $user["user_ID"]; ?>"><?php echo $post["firstName"]  . " " . $post["lastName"] ?></a>
                    <p class="m-0">
                        <?php  
                        $dates = $post["postDate"]; 
                        $newDate = new DateTime($dates);
                        echo $newDate->format("l jS F Y h:i:s A");
                    
                    ?></p>
                </div>
            </div>
            <div class="btn-group" <?php if ($user["user_ID"] != $currentUser["user_ID"]) { echo "hidden"; } ?>>
                <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons post-menu">more_horiz</i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="../controllers/delete_post_controller.php?post_ID=<?php echo $post['post_ID']; ?>"
                            class="dropdown-item text-danger">Delete</a></li>
                    <li><a href="../views/edit_post_view.php?postId=<?php echo $post["post_ID"]; ?>"
                            class="dropdown-item text-primary">Edit</a></li>
                </ul>
            </div>
        </div>
        <div id="post-desc" class="card-body px-0 post-body w-100 border-0">
            <p id=""><?php echo $post["description"];  ?></p>
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
                <button type="submit"><i onclick="increaseLike(<?php echo $index; ?>)"
                        class="material-icons like like-icon" id="<?php echo $index; ?>">thumb_up</i></button>
                <span class="px-1"><small class="numberOfLikes"
                        id="<?php echo $index; ?>"><?php echo $post["numberOfLikes"]; ?></small> Likes</span>

            </form>
            <div class="d-flex comment reaction">
                <i class="material-icons comment">comment</i>
                <span class="px-1"><?php echo $post["numberOfComments"]?> Comments</span>
                </a>
            </div>
            <!-- SHOW COMMENTS -->
            <?php require_once("../controllers/post_comment_controller.php"); ?>
        </div>
        <div class="w-100 show-comment overflow-scroll mb-4">
            <div class="comment-controll w-100">
                <iframe name="comment" style="display:none;"></iframe>
                <form class="content-comment d-flex justify-content-end align-items-center"
                    action="../controllers/create_comment_controller.php?postID=<?php echo $post["post_ID"]?>"
                    method="post">
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
                    <button class="bg-light" type="submit"><img class="img-send" src="../images/send.png"
                            alt=""></button>
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
                    <a href="profile_view.php?seykey=<?php echo $comment["user_ID"]; ?>" class="me-1"><img
                            class="img-pro rounded-circle" src="../images/<?php
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
                    <span class="rounded pt-0 px-2 h-100 border-2 border-primary bg-primary text-light me-3">
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
                    if ($comment["user_ID"] != $_SESSION["userID"]  and $post["user_ID"] != $_SESSION["userID"]) {
                        echo "hidden";
                    } 
                ?> action="../controllers/delete_comment_controller.php" method="post">
                        <button type="button" class="bg-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons post-menu">more_vert</i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <input type="hidden" value="<?php echo $comment['comment_ID']  ?>" name="comment_ID" id="">
                            <button class="dropdown-item" type="submit"><i
                                    class="material-icons text-danger">delete_forever</i></button>
                            <a class="dropdown-item"
                                href="edit_comment_view.php?comment_ID=<?php echo $comment['comment_ID'] ?>"> <i
                                    class="text-primary material-icons">edit</i></a>
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
    <?php
        };
    };
};
?>
<!-- FOOTER -->
    <?php
} else {
    header("location: ../index.php");
}
require_once("../templates/footer.php");
?>
<!-- SCRIPT TO INCREASE LIKE AND CHANGE COLOR-->
<script>
    function increaseLike(number) {
        currentLike = document.querySelectorAll(".numberOfLikes")[number].textContent;
        document.querySelectorAll(".numberOfLikes")[number].textContent = parseInt(currentLike) + 1;
        document.querySelectorAll(".like-icon")[number].style.color = "blue";
    }
    var home = document.querySelector(".home-page");
    home.style.color = "red";
    home.style.borderBottom = "solid 3px red";
</script>

<script src="../js/search_and_like.js"></script>
