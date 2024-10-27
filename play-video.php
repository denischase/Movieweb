<?php
define('BASEPATH', true);
require_once 'connect.php';
// include("partials/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play-video</title>
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    
     <!-- header section starts -->
  <header class="header flex-div">
    <!-- <a href="#" class="logo">derftube</a> -->

    <nav class="flex-div">
      <div class="nav-left flex-div">
        <img src="assets/images/image/menu.png" class="menu-icon"> 
        <!--<div class="fas fa-bars" class="menu-icon"></div> -->
        <img src="assets/images/Logo.jpg" class="logo">
          </div>
      <div class="nav-middle"></div>
      
      </div>
      <div class="nav-right flex-div">
      <img src="assets/images/image/upload.png" class=""> 
      <img src="assets/images/image/more.png" class="">
      <img src="assets/images/image/notification.png" class="">
      <img src="assets/images/image/Jack.png" class="user-icon">
    
      <div class="fas fa-search" id="search-btn"></div>
      </div>
    </nav>

    <div class="searchform">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box" class="fas fa-search"></label>
      
    </div>

  </header>
  <!-- header section ends -->

  <div class="contain play-contain">
    <div class="row">
        <div class="play-video">
            <video controls autoplay>
                <source src="assets/images/image/video.mp4" type="video/mp4">
            </video>
            <div class="tags">
                <a href="">#Coding</a> <a href="">#HTML</a> <a href="">#CSS</a>
                <a href="">#JavaScript</a>
            </div>
            <h3>Best Derftube Channel To Learn</h3>
            <div class="play-video-info">
                <p>1225 Views &bull; 2days ago</p>
                <div>
                    <a href=""><img src="assets/images/image/like.png" >125</a>
                    <a href=""><img src="assets/images/image/dislike.png" >2</a>
                    <a href=""><img src="assets/images/image/share.png" >Share</a>
                    <a href=""><img src="assets/images/image/save.png" >Save</a>
                </div>
            </div>
            <hr>
            <div class="publisher">
                <img src="assets/images/image/Jack.png" alt="">
                <div>
                    <p>Easy Tutorials</p>
                    <span>500k Subscribers</span>
                </div>
                <a href=""><button type="button">Subscribe</button></a>
            </div>
               

        </div>
        <div class="right-sidebar">
            
        <div class="alb list-container">
            <!-- <div class="side-video-list"> -->
                
                <?php
                    $sql = "SELECT * FROM videos ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res) > 0){
                        while ($video = mysqli_fetch_assoc($res)) { 
                        ?>
                        <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail8.png"><video class="" id="vd" src="uploads/<?=$video['video_url']?>"
                        controls>
                            
                    </video></a>
                    <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                     </div>
                    <?php }
                    }else{
                        echo "<h1>Empty</h1>";
                    }
                ?>
                
                 </div>
            <!-- </div> -->
            <!-- 
             <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail1.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>
          <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail8.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>
             
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail7.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail5.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail4.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail2.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div> 
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="assets/images/image/thumbnail3.png"></a>
                <div class="vid-info">
                    <a href="">Best Channnel that help you to be a web developer</a>
                    <p>Easy Tutorials</p>
                    <p>15k Views</p>
                </div>
            </div>-->
        </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>
</html>