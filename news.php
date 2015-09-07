<?php
include "include/db_connect.php";
session_start();
include("include/auth_cookie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
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
                <div class="cols col-12">
                    <div class="right-sidebar">
                        <h2 class="make-center">Shop News</h2>
                        <div class="all-news">
                        	<ul>
                           	<?php
							$result = $mysqli->query("SELECT * FROM events ORDER BY id DESC");
							if(mysqli_num_rows($result) > 0){
								$row = mysqli_fetch_assoc($result);
								do{
									echo '
									<li>
										<span>'.$row['date'].'</span>
										<a href="#">'.$row['title'].'</a>
										<p>'.$row['text'].'</p>
									</li>
									';
								}while(($row=mysqli_fetch_assoc($result))!=false);
							}
                           	?>
                           	</ul>
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