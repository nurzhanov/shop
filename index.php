<?php
include "C:/wamp/www/shop/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "header.php";?>
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
                                        <li><a href='#'>Veston</a></li>
                                        <li><a href='#'>Martinez</a></li>
                                        <li><a href='#'>Cruzer</a></li>
                                        <li><a href='#'>Cort</a></li>
                                        <li><a href='#'>Maxwood</a></li>
                                        <li><a href='#'>Fender</a></li>
                                        <li><a href='#'>Jet</a></li>
                                        <li><a href='#'>LTD</a></li>
                                    </ul>
                                </li>
                                <li class='active has-sub'><a href='#'>DRUMS</a>
                                    <ul>
                                        <li><a href='#'>TAMA</a></li>
                                        <li><a href='#'>YAMAHA</a></li>
                                        <li><a href='#'>Sonor</a></li>
                                        <li><a href='#'>Pearl</a></li>
                                    </ul>
                                </li>
                                <li class='active has-sub'><a href='#'>HEADPHONES</a>
                                    <ul>
                                        <li><a href='#'>AKG</a></li>
                                        <li><a href='#'>Roland</a></li>
                                    </ul>
                                </li>
                                <li class='active has-sub'><a href='#'>MICROPHONES</a>
                                    <ul>
                                        <li><a href='#'>AKG</a></li>
                                        <li><a href='#'>Roland</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>CASES</a></li>
                                <li><a href='#'>STRINGS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cols col-9">
                    <div class="right-sidebar">
                        <h2 class="make-center">Special products</h2>
                        <div class="special-products">
                            <?php
                                $query = "SELECT * FROM products WHERE top=1";
                                $result = $mysqli->query($query);
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
                                    <input type="button" class="add-to-cart" value="Add to cart" />
                                </div>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <?php include "footer.php";?>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/script.js"></script>
</body>
</html>