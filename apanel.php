<?php

    include("include/db_connect.php");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css\reset.css">
    <link rel="stylesheet" href="css\apanel.css">
    <link rel="stylesheet" href="css\aheader.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
</head>
<body>
    <?php
        include("include\header.php");
    ?>
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
                                    <input class="edit-but" type="button" value="Изменить">
                                </div>
                                    <div class="painter-text">
                                        <p class="p-text">'.$row["text"].'<input class="edit-but" type="button" value="Изменить"></p>
                                </div>
                            </div>
                            ';
                        
                    }
                    while($row = mysql_fetch_array($result));   
                }
            ?>
            </div> 
            
</body>
</html>