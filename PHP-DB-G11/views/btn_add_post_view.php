
<!-- BUTTON TO CREATE POST -->
<div class='mt-3' <?php
    if (isset($_GET["seykey"])) {
        if ($_GET["seykey"] != $_SESSION["userID"]) {
            echo "hidden"; 
        } 
    }
?>><a href="create_post_view.php" class="btn-add-post d-flex border-0 bg-primary text-light"><i class="material-icons">image</i>+Add Post</a></div>