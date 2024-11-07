<?php 
include("./parts/navbar.php");
require('./class/add.class.php');
include("./config/connect.php");

include('./class/access.authentic.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add Post</title>
</head>

<body>
    <div class="add">
        <h1 class="text-center">Add post</h1><br>
        <?php 
if (isset($_SESSION['upload'])) 
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}


?>
        <!-- start form -->
        <form action="" method="POST" class="text-center" enctype="multipart/form-data">
            <p>Post Title</p>
            <input type="text" name="title">
            <p>Select Image</p>
            <input type="file" name="image-name">
            <p>Content</p>
            <textarea name="content" id="" cols="90" rows="15"></textarea>
            <br><br>
            <input type="submit" name="submit" class="btn-primary" value="Add">
        </form>
        <!-- end form -->
        <p class="text-center">Created By <a href="#">Mohamed Yaser</a></p>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    
    if (isset($_FILES['image-name']['name'])) {
        
        $image_name = $_FILES['image-name']['name'];
        
        $image = new Image;

        
        $image->source_path = $_FILES['image-name']['tmp_name'];
        $image->destination_path = "./images/".$image_name;

        $image->addimage();

    }

    $addpost = new add_posts;

    $addpost->image_name = $_FILES['image-name']['name'];
    $addpost->title = $_POST['title'];
    $addpost->content = $_POST['content'];
    $addpost->date = date("Y-m-m h:i:sa");
    $addpost->addpost();


}

include('./parts/footer.php');