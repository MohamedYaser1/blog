<?php

class Image {

    public $image_name;
    public $source_path;
    public $destination_path;

    public function addimage(){
        
        $sourcepath = $this->source_path;
        $destinationpath = $this->destination_path;

        $upload = move_uploaded_file($sourcepath, $destinationpath);
        if ($upload == false) {
            $_SESSION['upload'] = "<div class='error'>Failed To Uplode</div>";
            header("location".HOME."add-post.php");
            die();
        }
    }
}

class add_posts extends Image {

    public $title;
    public $content;
    public $date;

    public function addpost()  {
        
        $title = $this->title;
        $content = $this->content;
        $date = $this->date;
        $imagename = $this->image_name;

        include("./config/connect.php");
        $sql = "INSERT INTO post SET
                title = '$title',
                date = '$date',
                content = '$content',
                image_name = '$imagename'";

        $res = mysqli_query($conn, $sql);

        if ($res == true) {
                
            $_SESSION["add"] = "Post Add Successfully";

            header("location:".HOME."index.php");

        }else{

            $_SESSION["add"] = "Fuiled to Add Post";

            header("location:".HOME."index.php");
        }
            }

}




//date("Y-m-d h:i:sa");