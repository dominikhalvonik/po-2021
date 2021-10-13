<?php
if(!isset($article)) {
    $article = [];
}
if(!isset($i)) {
    $i = 0;
}
if(!isset($db)) {
    $db = new stdClass();
}
?>
<article class="col-12 col-md-6 tm-post">
    <hr class="tm-hr-primary">
    <a href="post.php?id=<?php echo $article['id']; ?>" class="effect-lily tm-post-link tm-pt-60">
        <div class="tm-post-link-inner">
            <img src="<?php echo $article['image']; ?>" alt="Image" class="img-fluid">
        </div>
        <?php
        if($i === 0) {
            ?>
            <span class="position-absolute tm-new-badge">New</span>
            <?php
        }
        ?>
        <h2 class="tm-pt-30 tm-color-primary tm-post-title"><?php echo $article['title']; ?></h2>
    </a>
    <p class="tm-pt-30">
        <?php echo $article['perex']; ?>
    </p>
    <div class="d-flex justify-content-between tm-pt-45">
        <span class="tm-color-primary"><?php echo $article['category']; ?></span>
        <span class="tm-color-primary"><?php echo date("d.m.Y", strtotime($article['created_at'])); ?></span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <span><?php echo $db->countArticleComments($article['id']); ?> comments</span>
        <span>by <?php echo $article['username']; ?></span>
    </div>
</article>