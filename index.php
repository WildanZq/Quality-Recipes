<!DOCTYPE html>
<html>
    <head>
        <title>Quality Recipes</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/query.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="icon" type="image/png" href="images/logoo.png"/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <?php
        require_once "php/connect.php";
        session_start();
        require_once "php/ceklogin.php";
        ?>
        <style>
            html, body {
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a href="#main"><img class="logo" src="images/logoo.png"></a>
            <a href="#main"><h1 class="logo-title">Quality Recipes</h1></a>
            <div class="search pointer" id="search">
                <input class="search-bar" id="search-bar" type="text" placeholder="Search">
                <div class="nav-item">
                    <a class="nav-item-a"><i class="fa">&#xf002;</i></a>
                </div>
                <div class="nav-item" id="nav-search" onclick="closenav()">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <a class="nav-item-a"><i class="fa">&#xf00d;</i></a>
                </div>
            </div>
            <div class="nav" id="nav">
                <div class="nav-item" id="nav-article"><a class="nav-item-a" href="#article">Artikel</a></div>
                <div class="nav-item" id="nav-recipes"><a class="nav-item-a" href="#recipes">Resep</a>
                    <div class="dropdown" id="dropdown-resep">
                        <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="Resep/">Makan</a>
                        <a class="dropdown-item" href="Resep/minum.php">Minum</a>
                        <a class="dropdown-item" href="Resep/snack.php">Snack</a>
                    </div>
                </div>
                <div class="nav-item" id="nav-forum"><a class="nav-item-a" href="#">Forum</a></div>
                <div class="nav-item" id="nav-login">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <?php if($logged == false) { ?>
                    <a class="nav-item-a" href="Login/">Login</a>
                    <?php } else { ?>
                    <div class="nav-item-profile">
                        <div class="pp img-parent">
                            <img class="img" src="<?php if($foto == "") { echo "images/pp.jpg"; } else { echo "upload/pp/".$foto; }?>">
                        </div>
                        <span style="margin-left: 5px">
                            <?php echo $nama; ?>
                        </span>
                    </div>
                    <div class="dropdown" id="dropdown-akun">
                    <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="Setting/">Setting</a>
                        <a class="dropdown-item" href="Login/?do=logout">Logout</a>
                    </div>
                    <?php } ?>
                </div>
                <div class="nav-item pointer" id="nav-search" onclick="search()">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <a class="nav-item-a"><i class="fa">&#xf002;</i></a>
                </div>
            </div>
        </div>
        <section class="main" id="main">
            <div class="bg parallax">
                <div class="bg-bg">
                    <div style="height: 45vh"></div>
                    <div class="main-title">
                        <h1 class="main-h1">Quality Recipes</h1>
                        <p class="main-p">Kumpulan resep berkualitas</p>
                    </div>
                    <div class="cont-down"><a class="down-a" href="#desc"><i class="fa main-down">&#xf107;</i></a></div>
                </div>
            </div>
        </section>
        <div class="container">
        <section class="desc" id="desc">
            <div class="desc-cont">
                <h1 class="desc-h1"></h1>
                <p class="desc-p"></p>
            </div>
        </section>
        <section class="article" id="article">
            <div class="art-cont">
                <a href="Artikel/"><h1 class="section-h1">Artikel &amp; Tips</h1>
                <svg class="h1-svg">
                    <polygon points="0,0 0,42 30,42" style="fill:black"/>
                </svg></a>
                <div class="art-list">
                    <?php
                    $sql = 'SELECT * FROM tb_artikel ORDER BY id_artikel DESC LIMIT 0, 1';
                    $result = mysqli_query($connect, $sql);
                    if($result) {
                        if(mysqli_num_rows($result)) {
                            if($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="main-art"><a href="Artikel/View/?art=<?php echo $row['id_artikel']; ?>">
                        <div class="art-pict img-parent">
                            <img class="img" src="upload/artikel/<?php echo $row['foto']; ?>">
                        </div>
                        <div class="art-desc">
                            <h1><?php echo $row['judul']; ?></h1>
                            <p><?php echo substr(substr($row['konten'],0,130),0,strrpos(substr($row['konten'],0,130)," "))."..."; ?></p>
                        </div></a>
                    </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <div class="sub-art-cont">
                        <?php
                        $sql = 'SELECT * FROM tb_artikel ORDER BY id_artikel DESC LIMIT 1, 3';
                        $result = mysqli_query($connect, $sql);
                        if($result) {
                            if(mysqli_num_rows($result)) {
                                while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="sub-art"><a href="Artikel/View/?art=<?php echo $row['id_artikel']; ?>">
                            <div class="art-pict art-sub-pict img-parent">
                                <img class="img" src="upload/artikel/<?php echo $row['foto']; ?>">
                            </div>
                            <div class="sub-art-desc">
                                <h1><?php echo $row['judul']; ?></h1>
                                <p><?php echo substr(substr($row['konten'],0,45),0,strrpos(substr($row['konten'],0,45)," "))."..."; ?></p>
                            </div></a>
                        </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="recipe" id="recipes">
            <div class="recipe-cont">
                <h1 class="section-h1">Kumpulan Resep</h1>
                <svg class="h1-svg">
                    <polygon points="0,0 0,42 30,42" style="fill:black"/>
                </svg>
                <a href="Resep/"><div class="recipe-box food">
<!--
                    <div class="direct next"><i class="fa direct-fa">&#xf0da;</i></div>
                    <div class="direct prev"><i class="fa direct-fa">&#xf0d9;</i></div>
-->
                    <div class="recipe-img img-parent">
                        <img class="img" src="images/food.jpg">
                    </div>
                    <div class="recipe-cover">
                        <h1 class="recipe-title">Resep Makanan</h1>
                    </div>
                </div></a>
                <a href="Resep/minum.php"><div class="recipe-box drink">
                    <div class="recipe-img img-parent">
                        <img class="img" src="images/drink.jpg">
                    </div>
                    <div class="recipe-cover">
                        <h1 class="recipe-title box-b">Resep Minuman</h1>
                    </div>
                </div></a>
                <a href="Resep/snack.php"><div class="recipe-box snack">
                    <div class="recipe-img img-parent">
                        <img class="img" src="images/snack.jpg">
                    </div>
                    <div class="recipe-cover">
                        <h1 class="recipe-title box-b">Resep Snack</h1>
                    </div>
                </div></a>
            </div>
        </section>
        <section class="forum" id="forum">
            <div class="forum-cont">
                <a href="Forum/"><h1 class="section-h1">Forum</h1>
                <svg class="h1-svg">
                    <polygon points="0,0 0,42 30,42" style="fill:black"/>
                </svg></a>
                <div class="forum-cover">
                    <a href="<?php if($logged == false) { ?>Login/<?php } else { ?>Forum/<?php } ?>"><div class="forum-box">
                        <h1 class="forum-h1">Gabung Sekarang</h1>
                    </div></a>
                </div>
                <a href="#"><div class="forum-list">
                    <div class="forum-pict">
                        <img style="height: 30px; border-radius: 100px" src="images/pp.jpg">
                    </div>
                    <div class="forum-list-h1">
                        <h1 style="font-size: 1.3em; margin-left: 15px">Cara agar tetap sehat melalui makanan anak kos</h1>
                    </div></a>
                    <hr>
                    <div class="auth-blue">
                        By <a class="author-a" href="#">Arek Kos</a>
                    </div>
                </div>
                <a href="#"><div class="forum-list">
                    <div class="forum-pict">
                        <img style="height: 30px; border-radius: 100px" src="images/pp.jpg">
                    </div>
                    <div class="forum-list-h1">
                        <h1 style="font-size: 1.3em; margin-left: 15px">Sulit menurunkan berat badan</h1>
                    </div></a>
                    <hr>
                    <div class="auth-blue">
                        By <a class="author-a" href="#">Guest</a>
                    </div>
                </div>
                <a href="#"><div class="forum-list">
                    <div class="forum-pict">
                        <img style="height: 30px; border-radius: 100px" src="images/pp.jpg">
                    </div>
                    <div class="forum-list-h1">
                        <h1 style="font-size: 1.3em; margin-left: 15px">Apa makanan yang dapat meningkatkan daya ingat</h1>
                    </div></a>
                    <hr>
                    <div class="auth-blue">
                        By <a class="author-a" href="#">Someone</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="about disable" id="about">
            <div class="about-cont">
                <div class="card">
                    <img class="card-pict" src="images/img_avatar.png">
                    <div class="card-line"></div>
                    <div class="h-cont">
                        <h1 class="card-h1">Wildan Ziaulhaq</h1>
                        <h2 class="card-h2">Jabatan</h2>
                    </div>
                </div>
                <div class="card">
                    <img class="card-pict" src="images/img_avatar2.png">
                    <div class="card-line"></div>
                    <div class="h-cont">
                        <h1 class="card-h1">Zafira Candrawulan D</h1>
                        <h2 class="card-h2">Jabatan</h2>
                    </div>
                </div>
                <div class="card">
                    <img class="card-pict" src="images/img_avatar.png">
                    <div class="card-line"></div>
                    <div class="h-cont">
                        <h1 class="card-h1">Ridwan Rofianto</h1>
                        <h2 class="card-h2">Jabatan</h2>
                    </div>
                </div>
                <form class="contact">
                    <h1 class="contact-title">Contact Us</h1>
                    <input class="contact-input" type="text" placeholder="SUBJECT">
                    <textarea onkeyup="textarea(this)" class="contact-comment" placeholder="Message"></textarea>
                    <input class="kirim" type="submit" value="Kirim">
                </form>
            </div>
        </section>
        </div>
        <section class="footer">
            <div class="footer-cont">
                <div class="footer-col footer-about">
                    <a href="#main"><img class="footer-logo" src="images/logos.png"></a>
                    <p class="footer-about-p">Di sini kami menyediakan resep hidangan berkualitas yang sehat, lezat, dan mudah dimasak di rumah.</p>
                    <a class="footer-about-a" href="About/">Read more<i class="fa footer-about-i">&#xf061;</i></a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">What is this</h1>
                    <a class="footer-a" href="About/">About Us</a>
                    <hr width="200px">
                    <a class="footer-a" href="#">Contact Us</a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">Information</h1>
                    <a class="footer-a" href="Resep/">Kumpulan Resep</a>
                    <hr width="200px">
                    <a class="footer-a" href="Artikel/">Artikel &amp; Tips</a>
                    <hr width="200px">
                    <a class="footer-a" href="Forum/">Forum</a>
                </div>
                <div class="footer-follow">
                    <h1 class="follow-h1">Follow Us</h1>  
                    <a href="#"><div class="icon-cont"><i class="fa icon-follow">&#xf09a;</i></div></a>
                    <a href="#"><div class="icon-cont"><i class="fa icon-follow">&#xf099;</i></div></a>
                    <a href="#"><div class="icon-cont"><i class="fa icon-follow">&#xf0d5;</i></div></a>
                    <a href="#"><div class="icon-cont"><i class="fa icon-follow">&#xf16d;</i></div></a>
                    <a href="#"><div class="icon-cont"><i class="fa icon-follow">&#xf16a;</i></div></a>
                </div>
            </div>
        </section>
    </body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/js.js"></script>
<script src="js/img.js"></script>
<script src="js/parallax.js"></script>