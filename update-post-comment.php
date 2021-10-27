<?php

include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "portalove", "3308");

if(isset($_GET['comment-id'])) {
    $comment = $db->getComment($_GET['comment-id']);
}

if(isset($_POST['submit'])) {
    $update = $db->updatePostComment($_POST['comment-id'], $_POST['user_id'], $_POST['content']);

    if($update) {
        header("Location: post.php?id=".$_POST['post-id']);
    } else {
        echo "Chyba";
    }
} else {
    ?>
    <form action="" method="post">
        User ID: <br>
        <input type="number" name="user_id" value="<?php echo $comment['users_id']; ?>"><br>
        Comment:<br>
        <textarea name="content" rows="6"><?php echo $comment['content']; ?></textarea><br>
        <input type="hidden" name="comment-id" value="<?php echo $_GET['comment-id']; ?>">
        <input type="hidden" name="post-id" value="<?php echo $_GET['post-id']; ?>">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
}