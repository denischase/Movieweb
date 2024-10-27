<?php
define('BASEPATH', true);
require_once 'connect.php';
include("partials/header.php");
?>

<section class="">
<div class="contain list-container">
        <div class="">
        <a href="index.php" style="text-decoration: none; color:#5a5a5a; font-size: 1.5rem;padding-left: 20%;">UPLOAD</a>
        </div>
    
    
        
            <div class="alb list-container">
                
                <?php
                    $sql = "SELECT * FROM videos ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res) > 0){
                        while ($video = mysqli_fetch_assoc($res)) { 
                        ?>
                        <video class="" id="vd" src="uploads/<?=$video['video_url']?>"
                        controls>
                            
                    </video>
                    <?php }
                    }else{
                        echo "<h1>Empty</h1>";
                    }
                ?>
            </div>
        
    
</div>
</section>

               

<?php include("partials/footer.php"); ?>