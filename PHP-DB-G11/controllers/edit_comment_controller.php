
<?php
    require('../models/comment.php');
    $commentID= $_POST['comment_ID'];
    $content = $_POST['content'];
    editComment($content, $commentID);
    header('location: ../views/home_view.php')
?>