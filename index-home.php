<?php include 'header.php' ?>
<div class='section' id='home-ad-top' name='Home Ads Top'>

    <!--<div class='widget-content'>
        <a href="#"><img
                src="https://4.bp.blogspot.com/-b3N8Xz8TzlE/WzHHducCTtI/AAAAAAAACLQ/t0Qb1XiaYbgqGLde7fU9VoEzn38tUtseACK4BGAYYCw/s728/ad728.gif"
                alt="Ads 728x90" /></a>
    </div> -->
</div>
</div>
<div class='clearfix'></div>
<!-- Content Wrapper -->
<div class='row' id='content-wrapper'>
    <div class='container'>
        <!-- Main Wrapper -->
        <div id='main-wrapper'>
            <div class='main section' id='main' name='Main Posts'>
                <div class='widget Blog' data-version='2' id='Blog1'>
                    <div class='blog-posts hfeed index-post-wrap'>
                        
                <?php
                    $conn = new mysqli("localhost", "root", "", "ab");
                    $sql = "SELECT * FROM image";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $title = $row["author_img"];
                            $img = "upload-img/".$row["path_img"];
                            $snippet = $row["content_img"];
                            $time = $row["date_time"];
                            
                    echo"
                    <div class='blog-post hentry index-post'>
                            <div class='post-content'>
                                <div class='post-image-wrap'>
                                    <a class='post-image-link'>
                                        <img alt='' class='post-thumb'
                                            src='$img' />
                                        <div class='post-info'>
                                            <div class='post-info-inner'>
                                                <h2 class='post-title'>
                                                $title
                                                </h2>
                                                <span class='post-date published'>$time</span>
                                                <p class='post-snippet'>  $snippet  </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    </div>";
                        }
                    }
                         
              ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='clearfix'></div>
<!-- <div class='section' id='home-ad-footer' name='Home Ads Footer'>
    <div class='widget HTML' data-version='2' id='HTML3'>
        <h3 class='title'>
            Ad Code
        </h3>
        <div class='widget-content'>
            <a href="#"><img
                    src="https://4.bp.blogspot.com/-b3N8Xz8TzlE/WzHHducCTtI/AAAAAAAACLQ/t0Qb1XiaYbgqGLde7fU9VoEzn38tUtseACK4BGAYYCw/s728/ad728.gif"
                    alt="Ads 728x90" /></a>
        </div>
    </div>
</div> -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js' type='text/javascript'></script>
<script type="text/javascript" src="static/js/3754116945-widgets.js"></script>
<?php include"end.php" ?>