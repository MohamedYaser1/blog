<?php

class ViewPosts {
    public $title;
    public $content;
    public $date;
    public $image_name;

    public function view() {

        
        include("./config/connect.php");
        
        $sql = "SELECT * FROM post";
        $res = mysqli_query($conn, $sql);
        

        if ($res->num_rows > 0 ) {   
            return $res;
            
        }else
        {
            $_SESSION["view"] = "No Posts Added Yet";
            return false;
            
        }
    }
}


/* 

$this->title = $row['title'];
$this->content = $row['content'];
$this->date = $row['date'];
$this->image_name = $row['image_name'];

*/