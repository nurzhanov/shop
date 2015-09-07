<header id="header"><!--header-->
    <div class="header-top">
        <img src="images/banner.jpg" alt="" />
        <!-- <p>Music Shop</p> -->
    </div>
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="cols col-2">
                    <div class="logo">
                        <a href="/shop/"><img src="images/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="cols col-4">
                    <div class="make-center">
                        <!-- <form method="get" action="search.php?q=" name="search-form"> -->
                        <form method="get"  name="search-form">
                            <!-- <input type="search" name="q" id="input-searh" placeholder="search"> -->
                            <input type="text" id="input-searh" placeholder="search">
                            <!-- <input type="submit" name="find" id="button-searh" value="Find"> -->
                            <input type="button" id="button-searh" value="Find">
                        </form>
                    </div>
                </div>
                <div class="cols col-3">
                    <div class="shop-info">
                        <ul>
                            <li> 0-800 10 20 30</li><br/>
                            <li> Work from 9:00 a.m. to 9:00 p.m.</li>
                        </ul>
                    </div>
                </div>
                <div class="cols col-3">
                    <div class="sub-menu">
                        <ul>
                            <li><a id="cart_status" href="/shop/cart.php?action=oneclick">Cart is empty</a></li>
                            <?php
                                if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'yes_auth'){
                                    echo '<li><a href="/shop/account.php">'.$_SESSION['auth_login'].'</a></li>';
                                    echo '<li><a id="logout">Log out</a></li>';
                                }else{
                                    echo '<li><a href="/shop/login.php">Log in / Sign up</a></li>';
                                }
                            ?>
                            <!-- <li><a href="/shop/login.php">Sign in</a></li> -->
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