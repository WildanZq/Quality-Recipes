<!DOCTYPE html>
<html>
    <head>
        <title>Quality Recipes</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/artikel.css">
        <link rel="stylesheet" href="../css/query.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="icon" type="image/png" href="../images/logoo.png"/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <?php
        require_once "../php/connect.php";
        session_start();
        require_once "../php/ceklogin.php";
        
        //cek user sudah login
        if(isset($_SESSION['login']) && $_SESSION['login'] != ''){} else {header("Location: ../");}
        
        if(isset($_GET['do']) && $_GET['do'] == 'tulis') {
            if(isset($_POST['judul']) && $_POST['judul'] != "") {
                if(isset($_POST['konten']) && $_POST['konten'] != "") {
                    if(isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
                        $judul = $_POST['judul'];
                        $konten = $_POST['konten'];
                        $format_foto = $_FILES['foto']['type'];
                        if($format_foto == 'image/jpeg' || $format_foto == 'image/jpg' || $format_foto == 'image/png' || $format_foto == 'image/gif') {
                            $temp_name  = $_FILES['foto']['tmp_name'];
                            $location = '../upload/artikel/';
                            if(move_uploaded_file($temp_name, $location.$_FILES['foto']['name'])){
                                $foto       = $_FILES['foto']['name'];
                                $query_art = 'INSERT INTO tb_temp_artikel(id_akun, temp_judul, temp_konten, temp_foto) VALUES ("'.$_SESSION['login'].'","'.$judul.'","'.$konten.'","'.$foto.'")';
                                $result = mysqli_query($connect, $query_art);
                                
                                if($result) {
                                    ?> <script> alert("Artikel berhasil dikirim"); </script> <?php
                                } else { ?> <script> alert("Artikel gagal dikirim"); </script> <?php }
                            }
                        } else { ?> <script> alert("Format file tidak diperbolehkan"); </script> <?php }
                    } else { ?> <script> alert("Foto tidak boleh kosong"); </script> <?php }
                } else { ?> <script> alert("Konten tidak boleh kosong"); </script> <?php }
            } else { ?> <script> alert("Judul tidak boleh kosong"); </script> <?php }
        }
        ?>
    </head>
    <body>
        <div class="header">
            <a href="../"><img class="logo" src="../images/logoo.png"></a>
            <a href="../"><h1 class="logo-title">Quality Recipes</h1></a>
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
                <div class="nav-item" id="nav-article"><a class="nav-item-a" href="../Artikel/">Artikel</a></div>
                <div class="nav-item" id="nav-recipes"><a class="nav-item-a" href="javascript:void(0)">Resep</a>
                    <div class="dropdown" id="dropdown-resep">
                        <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="../Resep/">Makan</a>
                        <a class="dropdown-item" href="../Resep/minum.php">Minum</a>
                        <a class="dropdown-item" href="../Resep/snack.php">Snack</a>
                    </div>
                </div>
                <div class="nav-item" id="nav-forum"><a class="nav-item-a" href="../Forum">Forum</a></div>
                <div class="nav-item" id="nav-login">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    
                    <?php if($logged == false) { ?>
                    
                    <a class="nav-item-a" href="../Login/">Login</a>
                    <?php } else { ?>
                    <div class="nav-item-profile">
                        <div class="pp img-parent">
                            <img class="img" src="../<?php if($foto == "") { echo "images/pp.jpg"; } else { echo "upload/pp/".$foto; }?>">
                        </div>
                        <span style="margin-left: 5px">
                            <?php echo $nama; ?>
                        </span>
                    </div>
                    <div class="dropdown" id="dropdown-akun">
                    <div style="width: 0; height: 2px; background: black"></div>
                        <a class="dropdown-item" href="../Setting/">Setting</a>
                        <a class="dropdown-item" href="../Login/?do=logout">Logout</a>
                    </div>
                    <?php } ?>
                </div>
                <div class="nav-item pointer" id="nav-search" onclick="search()">
                    <div style="width: 2px; height: 49%; background: black; float: left; position: absolute;"></div>
                    <a class="nav-item-a"><i class="fa">&#xf002;</i></a>
                </div>
            </div>
        </div>
        <div style="height: 75px" id="desc"></div>
        <div class="container">
            <section class="art-cont">
                <h1 style="font-size: 2em;">Tulis Artikel</h1>
                *Artikel tidak akan muncul sebelum dikonfirmasi oleh admin<hr>
                <form action="./create.php?do=tulis" method="post" enctype="multipart/form-data">
                    <div class="img-parent art-pict-up">
                        <img class="img" id="img" src="../images/artikel.jpg">
                    </div>
                    <input type="file" name="foto" id="foto" onchange="readURL(this)" required>
                    <div class="akun-desc">
                        <input type="text" name="judul" id="nama" placeholder="Judul" required><br>
                        <textarea name="konten" id="konten" placeholder="Konten" required></textarea><br>
                        <input type="submit" name="kirim" value="Kirim">
                    </div>
                </form>
            </section>
        </div>
        <section class="footer">
            <div class="footer-cont">
                <div class="footer-col footer-about">
                    <a href="../"><img class="footer-logo" src="../images/logos.png"></a>
                    <p class="footer-about-p">Di sini kami menyediakan resep hidangan berkualitas yang sehat, lezat, dan mudah dimasak di rumah.</p>
                    <a class="footer-about-a" href="about.php">Read more<i class="fa footer-about-i">&#xf061;</i></a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">What is this</h1>
                    <a class="footer-a" href="../About">About Us</a>
                    <hr width="200px">
                    <a class="footer-a" href="../About">Contact Us</a>
                </div>
                <div class="footer-col">
                    <h1 class="footer-h1">Information</h1>
                    <a class="footer-a" href="../Resep">Kumpulan Resep</a>
                    <hr width="200px">
                    <a class="footer-a" href="../Artikel">Artikel &amp; Tips</a>
                    <hr width="200px">
                    <a class="footer-a" href="../Forum">Forum</a>
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
<script src="../js/img.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/js.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>