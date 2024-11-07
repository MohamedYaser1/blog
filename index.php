<?php 
include("./parts/navbar.php"); 
include("./class/viewposts.class.php");
?>

<title>Blog Website</title>


<section class="food-menu">
    <div class="container">
        <h2 class="text-center">All Posts</h2>

        <?php 
        if (isset($_SESSION["view"])) {
            echo $_SESSION["view"];
            unset($_SESSION["view"]);
        }
        
        $view = new ViewPosts;
        $post = $view->view();
        echo $view->title;

        if ($post) {
            foreach ($post as $row) {
                ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/<?= $row['image_name'];?>" alt="" class="img-responsive img-curve" />
            </div>

            <div class="food-menu-desc">
                <h3><?= $row['title'];?></h3>
                <p class="food-price"><?= $row['date'];?></p>
                <p class="food-detail">
                    <?= $row['content'];?>
                </p>
                <br />


            </div>
        </div>
        <?php
            }
        }

        ?>








        <div class="clearfix"></div>
    </div>


</section>




<?php include('./parts/footer.php')?>