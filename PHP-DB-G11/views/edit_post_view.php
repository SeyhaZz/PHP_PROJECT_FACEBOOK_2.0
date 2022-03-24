<?php session_start();
    require_once("../templates/header.php");
?>

<?php
    // GET POST
    require_once("../models/post.php");
    $postId = $_GET["postId"];
    $post = getPostById($postId);
?>
    <!-- EDIT POST INTERFACE -->
    <div class="w-100 p-2 pb-3">
        <form action="<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once("../controllers/edit_post_controller.php");
            };
        ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value=<?php echo $post["post_ID"]; ?> name="postId">
            <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto" placeholder="Your Caption Here" rows="auto"><?php echo $post["description"]; ?></textarea>
            <label for="image" class="cursor bg-primary text-light py-1 px-3 mb-2">Upload image</label>
            <input hidden class=" upload-img" onchange="loadFile(event)" type="file" id="image" name="image" value="<?php echo $post['image']; ?>">
            <div class="upload-img-contain">
                <img class="w-100" id="old-image"  src="../images/<?php echo $post['image'] ?>" alt="" >
                <img src="" class="w-100" id="img-post" alt="">
            </div>
            <div class="w-50 me-0 m-auto d-flex mt-3">
                <button class="btn-cancel-edit btn me-2" type="cancel"><a class="btn-secondary text-light" href="home_view.php">Cancel</a></button>
                <button type="submit" class="w-100 p-2 btn-primary">Save</button>
            </div>
        </form>
    </div>

<?php
require_once("../templates/footer.php");
?>

<script>
 var loadFile = function(event) {
        old_image = document.getElementById('old-image');
        old_image.style.display='none';
        var new_image = document.getElementById('img-post');
        new_image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>