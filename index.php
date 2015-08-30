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

                                $query = "SELECT * FROM products";
                                $result = $mysqli->query($query);
                                // $row_cnt = $result->num_rows;

                                while(($row=mysqli_fetch_assoc($result))!=false){
                                // echo "<pre>";
                                // print_r($row);
                                // echo "</pre>";
                                ?>
                                <div class="product-wrapper">
                                    <img src="products_images/<?=$row['image']?>" alt="pict" />
                                    <h2>$<?=$row['price']?></h2>
                                    <p><?=$row['title']?></p>
                                    <input type="button" class="add-to-cart" value="Add to cart" />
                                </div>
                                <?php
                               
                                }

                                // if($row_cnt > 0){
                                //     $row = mysqli_fetch_assoc($result);
                                //     while($row != false){
                                //         print_r($row["title"]);
                                //     }
                                // }
                                // if($row_cnt > 0){
                                //     // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                //     $row = mysqli_fetch_assoc($result);
                                //     echo "<pre>";
                                //     print_r ($result["num_rows"]);
                                //     echo "</pre>";
                                //     // foreach ($row as $key => $value) {
                                //     //     echo "<pre>";
                                //     //     print_r ($row["title"]);
                                //     //     echo "</pre>";
                                //     // }
                                // }
                                // if($row_cnt > 0){
                                //     $row = $result->fetch_array(MYSQLI_ASSOC);
                                //     foreach ($row as $key => $value) {
                                //         echo "<pre>";
                                //         echo $value;
                                //         echo "</pre>";
                                //     }
                                // }

                                // if($row_cnt > 0){
                                //     $row = $result->fetch_array(MYSQLI_ASSOC);
                                //     do{
                                //         echo "<pre>";
                                //         print_r($row["title"]);
                                //         echo "</pre>";
                                //     }while($row_cnt > 0);
                                // }

                                // if(mysql_num_rows($result) > 0){
                                //     $row = $mysql_fetch_array($result);
                                //     // foreach ($row as $key => $value) {
                                //     //     echo "<pre>";
                                //     //     print_r($row);
                                //     //     echo "</pre>";
                                //     // }
                                //     die(mysql_error());
                                //     do{
                                //         echo "<pre>";
                                //         print_r($row["title"]);
                                //         echo "</pre>";
                                //     }while($row = $mysql_fetch_array($result));
                                // }
                            ?>
                            <!-- <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                           <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                            <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                            <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                            <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                           <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                           <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div>
                            <div class="product-wrapper">
                                <img src="images/guitar.jpg" alt="pict" />
                                <h2>$56</h2>
                                <p>VESTON FC10</p>
                                <input type="button" class="add-to-cart" value="Add to cart" />
                            </div> -->
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