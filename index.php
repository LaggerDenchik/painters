<?php

    include("include/db_connect.php");

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="trackbar/trackbar.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Художники</title>
    <script src="trackbar/trackbar.js"></script>
</head>

<body>

    <?php
        include("include/header.php");
    ?>
    <main>
            <div class="content-painters">
            <?php
                $result = mysql_query("SELECT * FROM articles ",$link);
                if(mysql_num_rows($result) > 0){
                    $row = mysql_fetch_array($result);
                    do{
                         if($row["image"] != "" && file_exists("./painters/".$row["image"])){
                            
                            $img_path = './painters/'.$row["image"];
                            $max_width = 800;
                            $max_height = 800;
                            list($width, $height) = getimagesize($img_path);
                            $ratioh = $max_height/$height;
                            $ratiow = $max_width/$width;
                            $ratio = min($ratioh, $ratiow);
                            $width = intval($ratio*$width);
                            $height = intval($ratio*$height);

                        }else{
                            $img_path = "/pictures/no-image.png";
                            $width = 800;
                            $height = 800;
                        }
        
                        echo'<div class="painter" id="'.$row["id"].'">
                            <div class="painter-photo">
                                <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'">
                            </div>
                            <div class="painter-text">
                                <p class="style-title-grid">'.$row["text"].'</p>
                            </div>
                        </div>
                        ';
                    }
                    while($row = mysql_fetch_array($result));   
                }
            ?>
            </div>
    </main>
    <?php
        include("include/footer.php");
    ?>
</body>
</html>