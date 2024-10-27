<?php
define('BASEPATH', true);
 require_once 'connect.php';
if(isset($_POST['submit']) && isset($_FILES['my_video'])){
    //echo '<pre>';
    //print_r($_FILES['my_video']);

    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];

    if($error === 0){
         //video extension
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

        $video_ex_lc = strtolower($video_ex);

        $allowed_exs = array('mp4', 'webm', 'avi', 'flv');

        if (in_array($video_ex_lc, $allowed_exs)){
            
            $new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
            $video_upload_path = 'uploads/'.$new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);
            try{
                

                $sql = "INSERT INTO videos(video_url)
                VALUES('$new_video_name')";
                mysqli_query($conn, $sql);
                header("Location:view.php");
            } catch (Exception $e) {
                $error = "Error: " . $e->getMessage();
                echo '<script>alert("' . $error . '");</script>';
              }
           
        }
        else
        {
            $em = "<div class='h1'>You can't upload files of this type</div>";
            header("location: index.php?error=$em");
        }
    }
}
else
{
    header("location: index.php");
}

