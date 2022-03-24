<?php
    require_once("../templates/header.php");
?>
<div class="w-100 p-1">
    <div class="card border-0 mt-2">
        <span class="text-danger">
            <?php 
            // CHECK WHEN USERS DO NOT INPUT DESCRIPTION OR IMAGE
                if (isset($_GET['error'])){
                    echo $_GET['error'];
                }
            ?>
        </span>
        <form action="<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once("../controllers/create_post_controller.php");
            };
        ?>" method="post"
            enctype="multipart/form-data">
            <div class="w-100">
                <textarea name="description" class=" w-100 border-0 add-text" id="" cols="auto"
                    placeholder="Your Caption Here" rows="auto"></textarea>
            </div>
            <label for="image" class="cursor bg-primary text-light py-1 px-3 mb-2">Upload image</label>
            <input class="h-100 w-100  upload-img ps-5" onchange="loadFile(event)" type="file" id="image" name="image" hidden>
            <div class="upload-img-contain">
                <img class="w-100" id="old-image"  src="../images/<?php echo $post['image'] ?>" alt="" >
                <img src="" class="w-100" id="img-post" alt="">
            </div>
            <div class="w-50 me-0 m-auto d-flex py-3">
                <button class="btn-cancel-edit btn me-2" type="cancel"><a class="btn-secondary text-light" href="home_view.php">Cancel</a></button>
                <button type="submit" class="w-100 p-2 save btn-primary">Post</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once("../templates/footer.php");
?>
<!-- SHOW IMAGE WHEN UERS ADD TO THEIR POST-->
<script>
 var loadFile = function(event) {
        var image = document.getElementById('img-post');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

</script>