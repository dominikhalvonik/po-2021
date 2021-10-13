<?php
if(!isset($id)) {
    $id = 1;
}
if(!isset($db)) {
    $db = new stdClass();
}
if(!isset($comment)) {
    $comment = [];
}
?>

<div class="tm-comment tm-mb-45">
    <figure class="tm-comment-figure">
        <img src="<?php echo $comment['image']; ?>" alt="Image" class="mb-2 rounded-circle img-thumbnail">
        <figcaption class="tm-color-primary text-center"><?php echo $comment['username']; ?></figcaption>
    </figure>
    <div>
        <p>
            <?php echo $comment['content']; ?>
        </p>
        <div class="d-flex justify-content-between">
            <a href="#" class="tm-color-primary">REPLY</a>
            <span class="tm-color-primary"><?php echo date("d.m.Y", strtotime($comment['created_at'])); ?></span>
        </div>
    </div>
</div>