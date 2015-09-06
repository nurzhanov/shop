<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");
$cat = $_GET["cat"];
// удаление всех ненужных тегов
$cat = strip_tags($cat);
// очистка спец символов
$cat = mysqli_real_escape_string($mysqli, $cat);
// удаление пробелов
$cat = trim($cat);

$type = $_GET["type"];
// удаление всех ненужных тегов
$type = strip_tags($type);
// очистка спец символов
$type = mysqli_real_escape_string($mysqli, $type);
// удаление пробелов
$type = trim($type);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "include/header.php";?>
    <section>
        <div class="container">
            <div class="row">
                <div class="cols col-3">
                    <div class="left-sidebar">
                        <h2 class="make-center">Category</h2>
                        <div id='sidebarmenu'>
                            <ul>
                                <li class='active has-sub'><a href='#'>GUITARS</a>
                                    <ul>
                                        <?php
                                            $query_guitar = "SELECT * FROM category WHERE type='guitar'";
                                            $result_guitar = $mysqli->query($query_guitar);
                                            while(($row_guitar=mysqli_fetch_assoc($result_guitar))!=false){
                                        ?>
                                        <li><a href="catalog.php?cat=<?=strtolower($row_guitar['brand']).'&type='.$row_guitar['type']?>"><?=$row_guitar['brand']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>     
                                <li class='active has-sub'><a href='#'>DRUMS</a>
                                    <ul>
                                        <?php
                                            $query_drum = "SELECT * FROM category WHERE type='drum'";
                                            $result_drum = $mysqli->query($query_drum);
                                            while(($row_drum=mysqli_fetch_assoc($result_drum))!=false){
                                        ?>
                                        <li><a href="catalog.php?cat=<?=strtolower($row_drum['brand']).'&type='.$row_drum['type']?>"><?=$row_drum['brand']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class='active has-sub'><a href='#'>HEADPHONES</a>
                                    <ul>
                                        <?php
                                            $query_headphone = "SELECT * FROM category WHERE type='headphone'";
                                            $result_headphone = $mysqli->query($query_headphone);
                                            while(($row_headphone=mysqli_fetch_assoc($result_headphone))!=false){
                                        ?>
                                        <li><a href="catalog.php?cat=<?=strtolower($row_headphone['brand']).'&type='.$row_headphone['type']?>"><?=$row_headphone['brand']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class='active has-sub'><a href='#'>MICROPHONES</a>
                                    <ul>
                                        <?php
                                            $query_microphone = "SELECT * FROM category WHERE type='microphone'";
                                            $result_microphone = $mysqli->query($query_microphone);
                                            while(($row_microphone=mysqli_fetch_assoc($result_microphone))!=false){
                                        ?>
                                        <li><a href="catalog.php?cat=<?=strtolower($row_microphone['brand']).'&type='.$row_microphone['type']?>"><?=$row_microphone['brand']?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cols col-9">
                    <div class="right-sidebar">
                        <h2 class="make-center">Products</h2>
                        <div class="special-products">
                            <?php
                                if(!empty($cat) && !empty($type)){
                                    $querycat = "AND brand='$cat' AND products_type='$type'";
                                }else{
                                    if(!empty($type)){
                                        $querycat = "AND products_type='$type'";
                                    }else{
                                        $querycat = "";
                                    }
                                }
                                $query = "SELECT * FROM products WHERE visible=1 $querycat";
                                $result = $mysqli->query($query);
                                if(mysqli_num_rows($result) > 0){
                                    while(($row=mysqli_fetch_assoc($result))!=false){
                                    // если имя картинки не пустое и файл существует
                                    if($row["image"] != "" && file_exists("./products_images/".$row["image"])){
                                        // задаем путь
                                        $img_path = "./products_images/".$row["image"];
                                        $max_width = 160;
                                        $max_height = 160;
                                        // преобразование в 
                                        list($width, $height) = getimagesize($img_path);
                                        $ratioh = $max_height/$height;
                                        $ratiow = $max_width/$width;
                                        $ratio = min($ratioh, $ratiow);
                                        $width = intval($ratio*$width);
                                        $height = intval($ratio*$height);
                                    }else{
                                        $img_path = "images/no-image.png";
                                        $width = 160;
                                        $height = 160;
                                    }
                            ?>
                            <div class="product-wrapper">
                                <img src="<?=$img_path?>" height="<?=$height?>" width="<?=$width?>" />
                                <h2>$<?=$row['price']?></h2>
                                <p><?=$row['title']?></p>
                                <a class="add-to-cart" tid="<?=$row['products_id']?>">Add to cart</a>
                            </div>
                            <?php
                                    }
                                }else{
                                    echo "<h2>Category not available!</h2>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "include/footer.php";?>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/myjquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>