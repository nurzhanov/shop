<header id="header"><!--header-->
    <div class="header-top">
        <img src="images/banner.jpg" alt="" />
        <!-- <p>Music Shop</p> -->
    </div>
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="cols col-12">
                     <div class="sub-menu">
                        <ul>
                            <?php
                                if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'yes_auth'){
                                    echo '<li><a id="username" href="/shop/account.php">'.$_SESSION['auth_login'].'</a></li>';
                                    echo '<li><a id="logout" href="#">Log out</a></li>';
                                }else{
                                    echo '<li><a class="log" href="/shop/login.php">Log in / Sign up</a></li>';
                                }
                            ?>
                            <li><a id="cart_status" href="/shop/cart.php?action=oneclick">Cart is empty</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="cols col-2">
                    <div class="logo">
                        <a href="/shop/"><img src="images/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="cols col-4">
                    <div class="make-center form-align">
                        <!-- <form method="get" action="search.php?q=" name="search-form"> -->
                        <form method="get"  name="search-form">
                            <!-- <input type="search" name="q" id="input-searh" placeholder="search"> -->
                            <input type="text" id="input-searh" placeholder="search">
                            <!-- <input type="submit" name="find" id="button-searh" value="Find"> -->
                            <input type="button" id="button-searh" value="Find">
                        </form>
                        <span class="exmp">For example:<a href="/shop/search.php?q=cort">Cort</a></span>
                    </div>
                </div>
                <div class="cols col-6">
                    <div class="shop-info">
                        <ul>
                            <li> 0-800 10 20 30</li><br/>
                            <li> info@music-shop.com</li><br/>
                            <li> Work from 9:00 a.m. to 9:00 p.m.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="cols col-12">
                    <nav class="clearfix">
                        <a href="#" id="pull">MENU</a>
                        <ul class="clearfix">
                            <li><a href="/shop/">HOME</a></li>
                            <li><a href="/shop/news.php">NEWS</a></li>
                            <li><a href="/shop/about_us.php">ABOUT US</a></li>
                            <li><a href="/shop/contact_us.php">CONTACT US</a></li>
                        </ul>
                    </nav>   
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header>