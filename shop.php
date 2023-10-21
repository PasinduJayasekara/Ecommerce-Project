<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a class="active" href="shop.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
        </div>
    </section>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product1" class="section-p1">
            <?php

            require "connection.php";

            $c_rs = Database::search("SELECT * FROM `category`");
            $c_num = $c_rs->num_rows;
            for ($y = 0; $y < $c_num; $y++) {

                $c_data = $c_rs->fetch_assoc();
            
            $product_rs = Database::search("SELECT * FROM `product` WHERE `category_cat_id`='" . $c_data['cat_id'] . "' AND `status_status_id`='1' ORDER BY 
                                        `datetime_added` DESC LIMIT 4 OFFSET 0");
            $product_num = $product_rs->num_rows;

            for ($x = 0; $x < $product_num; $x++) {
                $product_data = $product_rs->fetch_assoc();
            ?>

                <?php
                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data['id'] . "'");
                $img_data = $img_rs->fetch_assoc();
                ?>
                <div class="pro-container">
                    <div class="pro" onclick="window.location.href='sproduct.php';">
                        <img src="<?php echo $img_data["path_img"]; ?>" alt="">
                        <div class="des">
                            <span></span>
                            <h5><?php echo $product_data["title"]; ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo $product_data["price"]; ?> .00</h4>
                        </div>
                        <a href="#"><i class="fal fa-shopping-cart cart" onclick="addToCart(<?php echo $product_data['id'];?>);"></i></a>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        <?php
        }
        ?>
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up for newletter</h4>
            <p>get email updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p>Address:dfgdf dfgdfg dfgdfg dfgdf</p>
            <p>Address:dfgdf dfgdfg dfgdfg dfgdf</p>
            <p>Address:dfgdf dfgdfg dfgdfg dfgdf</p>
        </div>
        <div class="follow">
            <h4>follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privact Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>my account</h4>
            <a href="#">sign in</a>
            <a href="#">view cart</a>
            <a href="#">my wishlist</a>
            <a href="#">track my order</a>
            <a href="#">help</a>
        </div>
        <div class="col install">
            <h4>install app</h4>
            <p>from app store or google play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>secured payment gateways</p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>2021, tech2 etc - HTML CSS Ecommerece</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>