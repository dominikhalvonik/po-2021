<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/header.php"; ?>
<body>
    <?php
    include_once "parts/nav.php";
    if(!isset($db)) {
        $db = new stdClass();
    }
    $id = $_GET['id'];
    $articleDetails = $db->getArticle($id);
    $comments = $db->getComments($id);
    ?>
    <div class="container-fluid">
        <main class="tm-main">
            <?php include_once "parts/search.php"; ?>
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <!-- Video player 1422x800 -->
                    <video width="954" height="535" controls class="tm-mb-40">
                        <source src="video/wheat-field.mp4" type="video/mp4">							  
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="row tm-row">
                <?php
                if($articleDetails) {
                ?>
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title"><?php echo $articleDetails['title']; ?></h2>
                            <p class="tm-mb-40"><?php echo date("d.m.Y", strtotime($articleDetails['created_at'])); ?> posted by <?php echo $articleDetails['username']; ?></p>
                            <p>
                                <?php echo $articleDetails['content']; ?>
                            </p>
                            <span class="d-block text-right tm-color-primary"><?php echo $articleDetails['category']; ?></span>
                        </div>
                        
                        <!-- Comments -->
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <hr class="tm-hr-primary tm-mb-45">
                            <?php
                            if(count($comments) > 0) {
                                foreach ($comments as $comment) {
                                    include "parts/comment.php";
                                }
                            } else {
                                echo "Ziadne komentare";
                            }
                            ?>
                            <form action="" class="mb-5 tm-comment-form">
                                <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                                <div class="mb-4">
                                    <input class="form-control" name="name" type="text">
                                </div>
                                <div class="mb-4">
                                    <input class="form-control" name="email" type="text">
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" name="message" rows="6"></textarea>
                                </div>
                                <div class="text-right">
                                    <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                                </div>                                
                            </form>                          
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            <li><a href="#" class="tm-color-primary">Visual Designs</a></li>
                            <li><a href="#" class="tm-color-primary">Travel Events</a></li>
                            <li><a href="#" class="tm-color-primary">Web Development</a></li>
                            <li><a href="#" class="tm-color-primary">Video and Audio</a></li>
                            <li><a href="#" class="tm-color-primary">Etiam auctor ac arcu</a></li>
                            <li><a href="#" class="tm-color-primary">Sed im justo diam</a></li>
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-02.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Duis mollis diam nec ex viverra scelerisque a sit</figcaption>
                            </figure>
                        </a>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-05.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Integer quis lectus eget justo ullamcorper ullamcorper</figcaption>
                            </figure>
                        </a>
                        <a href="#" class="d-block tm-mb-40">
                            <figure>
                                <img src="img/img-06.jpg" alt="Image" class="mb-3 img-fluid">
                                <figcaption class="tm-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                            </figure>
                        </a>
                    </div>                    
                </aside>
            </div>
            <?php
            } else {
               echo "Zadany clanok neexistuje";
            }
            include_once "parts/footer.php";
            ?>
        </main>
    </div>
</body>
</html>