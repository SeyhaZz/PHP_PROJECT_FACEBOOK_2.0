<?php
require_once("../templates/header.php");
require_once('../models/comment.php');
$commentID= $_GET['comment_ID'];
$comment = getCommentById($commentID);
?>
<div class="d-flex justify-content-center w-100">
    <h2 class="text-primary">Edit Comment</h2>
</div>
<form action="../controllers/edit_comment_controller.php" class="m-3 p-2" method="post">
    <label for="exampleFormControlTextarea1" class="form-label">Edit your comment below</label>
    <textarea class="form-control add-text" name="content" placeholder="Type here..." id="exampleFormControlTextarea1" rows="8"><?php echo $comment['content'] ; ?></textarea>
    <div class="w-50 me-0 m-auto d-flex justify-content-end mt-2">
        <input type="hidden" name="comment_ID" value="<?php echo $commentID ?>">
        <button class="btn-cancel-edit btn me-2" type="cancel"><a class="btn-secondary text-light" href="home_view.php">Cancel</a></button> 
        <button type="submit" class="w-50 p-2 btn-primary">Update</button>
    </div>
</form>
<?php
require_once("../templates/footer.php");
?>