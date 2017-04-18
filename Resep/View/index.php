<!DOCTYPE html>
<html>
    <head>
        <title>Quality Recipes</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/top.css">
        <link rel="stylesheet" href="../../css/recipe.css">
        <link rel="stylesheet" href="../../css/query.css">
        <link rel="stylesheet" href="../../css/font-awesome.css">
        <link rel="icon" type="image/png" href="../../images/logoo.png"/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <?php
        require_once "../../php/connect.php";
        session_start();
        require_once "../../php/ceklogin.php";
        
        //cek ada id resep
        if(isset($_GET['res']) && !empty($_GET['res'])) {
            $sql = 'SELECT * FROM tb_resep WHERE id_resep='.$_GET['res'];
            $result = mysqli_query($connect,$sql);
            if($result) {
                if(mysqli_num_rows($result)) {
                    $row = mysqli_fetch_assoc($result);
                    $judul = $row['judul'];
                    $bahan = $row['bahan'];
                    $cara = $row['cara'];
                    $foto_res = $row['foto'];
                    $id_akun = $row['id_akun'];
                } else { header("Location: ../"); }
            } else { header("Location: ../"); }
        } else { header("Location: ../"); }
        ?>
        <style>
            html, body {
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a href="../../"><img class="logo" src="../../images/logoo.png"></a>
            <a href="../../"><h1 class="logo-title">Quality Recipes</h1></a>
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
                <div class="nav-item" id="nav-article"><a class="nav-item-a" href="../">Artikel</a></div>
                <div class="nav-item" id="nav-recipes"><a class="nav-item-a" href="javascript:void(0)">Resep</a>
                    <div class="dropdown" id="dropdown-resep">
                        <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="../../Resep/">Makan</a>
                        <a class="dropdown-item" href="../../Resep/minum.php">Minum</a>
                        <a class="dropdown-item" href="../../Resep/snack.php">Snack</a>
                    </div>
                </div>
                <div class="nav-item" id="nav-forum"><a class="nav-item-a" href="../../Forum/">Forum</a></div>
                <div class="nav-item" id="nav-login">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <?php if($logged == false) { ?>
                    <a class="nav-item-a" href="../../Login/">Login</a>
                    <?php } else { ?>
                    <div class="nav-item-profile">
                        <div class="pp img-parent">
                            <img class="img" src="../../<?php if($foto == "") { echo "images/pp.jpg"; } else { echo "upload/pp/".$foto; }?>">
                        </div>
                        <span style="margin-left: 5px">
                            <?php echo $nama; ?>
                        </span>
                    </div>
                    <div class="dropdown" id="dropdown-akun">
                    <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="../../Setting/">Setting</a>
                        <a class="dropdown-item" href="../../Login/?do=logout">Logout</a>
                    </div>
                    <?php } ?>
                </div>
                <div class="nav-item pointer" id="nav-search" onclick="search()">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <a class="nav-item-a"><i class="fa">&#xf002;</i></a>
                </div>
            </div>
        </div>
        <section class="top">
            <div class="top-bg" style="background-image: url(../../upload/resep/<?php echo $foto_res; ?>)">
                <div class="bg-bg">
                    <h1 class="main-h1"><?php echo $judul;?></h1>
                    <p class="main-p">Kumpulan Resep</p>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="desc" id="desc" style="">
                <div class="desc-cont">
                    <h1 class="desc-h1"></h1>
                    <?php
                    $sql = 'SELECT * FROM tb_akun WHERE id_akun='.$id_akun;
                    $result = mysqli_query($connect,$sql);
                    if($result) {
                        if(mysqli_num_rows($result)) {
                            $row = mysqli_fetch_assoc($result);
                            $nama = $row['nama'];
                            $pp = $row['foto'];
                            
                            if(empty($pp)) {
                                $pp = "images/pp.jpg";
                            } else {
                                $pp = "upload/pp/".$pp;
                            }
                        } else { header("Location: ../"); }
                    } else { header("Location: ../"); }
                    ?>
                    <a href="../../Akun?id=<?php echo $id_akun; ?>"><div class="author">
                        <div class="img-parent auth-pp">
                            <img class="img" src="../../<?php echo $pp; ?>">
                        </div>
                        <span>
                            <?php echo $nama; ?>
                        </span>
                    </div></a>
                    <hr class="auth-hr">
                    <div class="resep-text">
                        <div class="resep-bahan">
                            <h1>Bahan</h1>
                            <?php echo "<ol><li>".str_replace("<br />","</li><li>",nl2br($bahan))."</li></ol>"; ?>
                        </div>
                        <div class="resep-cara">
                            <h1>Cara</h1>
                            <?php echo "<ol><li>".str_replace("<br />","</li><li>",nl2br($cara))."</li></ol>"; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="footer">
            <div class="footer-cont">
                <div class="footer-col footer-about">
                    <a href="../../"><img class="footer-logo" src="../../images/logos.png"></a>
                    <p class="footer-about-p">Di sini kami menyediakan resep hidangan berkualitas yang sehat, lezat, dan mudah dimasak di rumah.</p>
                    <a class="footer-about-a" href="../../About/">Read more<i class="fa footer-about-i">&#xf061;</i></a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">What is this</h1>
                    <a class="footer-a" href="../../About/">About Us</a>
                    <hr width="200px">
                    <a class="footer-a" href="#">Contact Us</a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">Information</h1>
                    <a class="footer-a" href="../../Resep/">Kumpulan Resep</a>
                    <hr width="200px">
                    <a class="footer-a" href="../../Artikel/">Artikel &amp; Tips</a>
                    <hr width="200px">
                    <a class="footer-a" href="../../Forum/">Forum</a>
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
<script src="../../js/jquery.min.js"></script>
<script src="../../js/js.js"></script>
<script src="../../js/img.js"></script>