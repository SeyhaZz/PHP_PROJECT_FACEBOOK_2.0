<?php 

require_once("database.php");

// CREATE COMMENT
function createComment($content, $postID,$userID)
    {
        global $db;
        $statement = $db->prepare("INSERT INTO comments(user_ID, post_ID, commentDate, content) values ( :userID,:postID, now(), :content );");
        $statement->execute([
            ':content' => $content,
            ":postID" => $postID,
            ":userID" => $userID
        ]);
        return $statement;
    }

// POST COMMENT
function postComment($postID)
    {
        global $db;
        $statement = $db->prepare("SELECT * FROM comments");
        $statement -> execute();
        $items = $statement -> fetchAll();
        return $items;
    }

// DELETE COMMENTS
function deleteComment($item_delete)
    {
        global $db;
        $statement = $db->prepare('DELETE  FROM comments where comment_ID = :item_delete;');
        $statement->execute([
            ':item_delete' => $item_delete
        ]);
        return $statement->rowCount() == 1;
    }

// EDIT COMMENTS

function editComment($content, $commentID){
    global $db;
    $statement = $db->prepare('UPDATE comments set content = :content, commentDate = now() where comment_ID = :comment_ID;');
    $statement -> execute([
        ':content' => $content,
        ":comment_ID" => $commentID
    ]);
    return $statement -> rowCount() ==1;
}

function getCommentById($commentID)
    {
        global $db;
        $statement = $db->prepare("SELECT * FROM comments WHERE comment_ID=:comment_ID;");
        $statement->execute([
            ':comment_ID' => $commentID
        ]);
        $comment = $statement->fetch();
        return $comment;
    }















?>