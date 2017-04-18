<!DOCTYPE html>
<html>
    <head>
        <title>Resep Makanan</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="../css/query.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="icon" type="image/x-icon" href="../images/logoo.png"/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <?php
        require_once "../php/connect.php";
        session_start();
        
        //cek admin sudah login
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){} else {header("Location: ../");}
        
        if(isset($_GET['tolak_art'])) {
            $sql = 'DELETE FROM tb_temp_artikel WHERE id_temp_artikel='.$_GET['tolak_art'];
            $result = mysqli_query($connect, $sql);
            if($result) { ?> <script>alert("Penghapusan Berhasil");</script> <?php }
            else { ?> <script>alert("Penghapusan Gagal");</script> <?php }
        }
        
        if(isset($_GET['tolak_res'])) {
            $sql = 'DELETE FROM tb_temp_resep WHERE id_temp_resep='.$_GET['tolak_res'];
            $result = mysqli_query($connect, $sql);
            if($result) { ?> <script>alert("Penghapusan Berhasil");</script> <?php }
            else { ?> <script>alert("Penghapusan Gagal");</script> <?php }
        }
        
        if(isset($_GET['terima_art'])) {
            $sql = 'SELECT * FROM tb_temp_artikel WHERE id_temp_artikel='.$_GET['terima_art'];
            $result = mysqli_query($connect, $sql);
            if($result) {
                if(mysqli_num_rows($result)) {
                    $row = mysqli_fetch_assoc($result);
                    $id_akun = $row['id_akun'];
                    $judul = $row['temp_judul'];
                    $konten = $row['temp_konten'];
                    $foto = $row['temp_foto'];
                }
            }
            
            $query = 'INSERT INTO tb_artikel(id_akun, judul, konten, foto) VALUES("'.$id_akun.'","'.$judul.'","'.$konten.'","'.$foto.'")';
            $result = mysqli_query($connect, $query);
            if($result) { ?> <script>alert("Penambahan Berhasil");</script> <?php
                $sql = 'DELETE FROM tb_temp_artikel WHERE id_temp_artikel='.$_GET['terima_art'];
                $result = mysqli_query($connect, $sql);
                if($result) { ?> <script>alert("Penghapusan Berhasil");</script> <?php }
                else { ?> <script>alert("Penghapusan Gagal");</script> <?php }
            } else { ?> <script>alert("Penambahan Gagal");</script> <?php }
        }
        
        if(isset($_GET['terima_res'])) {
            $sql = 'SELECT * FROM tb_temp_resep WHERE id_temp_resep='.$_GET['terima_res'];
            $result = mysqli_query($connect, $sql);
            if($result) {
                if(mysqli_num_rows($result)) {
                    $row = mysqli_fetch_assoc($result);
                    $id_akun = $row['id_akun'];
                    $judul = $row['temp_judul'];
                    $bahan = $row['temp_bahan'];
                    $cara = $row['temp_cara'];
                    $foto = $row['temp_foto'];
                    $jenis = $row['temp_jenis'];
                }
            }
            
            $query = 'INSERT INTO tb_resep(id_akun, judul, bahan, cara, foto, jenis) VALUES("'.$id_akun.'","'.$judul.'","'.$bahan.'","'.$cara.'","'.$foto.'","'.$jenis.'")';
            $result = mysqli_query($connect, $query);
            if($result) { ?> <script>alert("Penambahan Berhasil");</script> <?php
                $sql = 'DELETE FROM tb_temp_resep WHERE id_temp_resep='.$_GET['terima_res'];
                $result = mysqli_query($connect, $sql);
                if($result) { ?> <script>alert("Penghapusan Berhasil");</script> <?php }
                else { ?> <script>alert("Penghapusan Gagal");</script> <?php }
            } else { ?> <script>alert("Penambahan Gagal");</script> <?php }
        }
        ?>
    </head>
    <body>
        <div style="margin: auto; display: table"><a href="../"><img src="../images/logow.png"></a></div><hr>
        <a href="./?do=logout"><span class="logout">Logout</span></a>
        <div class="container">
            <section class="artikel">
                <h1>Artikel</h1>
                <?php
                $sql = 'SELECT * FROM tb_temp_artikel';
                $result = mysqli_query($connect, $sql);
                if($result) {
                    if(mysqli_num_rows($result)) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="list">
                    <div class="img-parent">
                        <img class="img" src="../upload/artikel/<?php echo $row['temp_foto']; ?>">
                    </div>
                    <div class="content">
                        <h1><?php echo $row['temp_judul']; ?></h1>
                        <hr>
                        <div class="auth-blue">
                            By <a class="author-a" href="../Akun/?id=<?php echo $row['id_akun']; ?>">
                            <?php
                            $sql_akun = 'SELECT * FROM tb_akun WHERE id_akun='.$row['id_akun'];
                            $result_akun = mysqli_query($connect, $sql_akun);
                            if($result_akun) {
                                if(mysqli_num_rows($result_akun)) {
                                    if($row_akun = mysqli_fetch_assoc($result_akun)) {
                                        echo $row_akun['nama'];
                                    }
                                }
                            }
                            ?>
                            </a>
                        </div>
                        <p><?php echo "&emsp;".str_replace("<br />","<br><br>&emsp;",nl2br($row['temp_konten'])); ?></p>
                    </div>
                    <div class="button">
                        <a href="admin.php?terima_art=<?php echo $row['id_temp_artikel']; ?>"><span style="color: green">Terima</span></a>
                        ||
                        <a href="admin.php?tolak_art=<?php echo $row['id_temp_artikel']; ?>"><span style="color: red">Tolak</span></a>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>
            </section>
            <section class="resep">
                <h1>Resep</h1>
                <?php
                $sql = 'SELECT * FROM tb_temp_resep';
                $result = mysqli_query($connect, $sql);
                if($result) {
                    if(mysqli_num_rows($result)) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="list">
                    <div class="img-parent">
                        <img class="img" src="../upload/resep/<?php echo $row['temp_foto']; ?>">
                    </div>
                    <div class="content">
                        <h1><?php echo $row['temp_judul']; ?></h1>
                        <hr>
                        <div class="auth-blue">
                            By <a class="author-a" href="../Akun/?id=<?php echo $row['id_akun']; ?>">
                            <?php
                            $sql_akun = 'SELECT * FROM tb_akun WHERE id_akun='.$row['id_akun'];
                            $result_akun = mysqli_query($connect, $sql_akun);
                            if($result_akun) {
                                if(mysqli_num_rows($result_akun)) {
                                    if($row_akun = mysqli_fetch_assoc($result_akun)) {
                                        echo $row_akun['nama'];
                                    }
                                }
                            }
                            ?>
                            </a>
                        </div>
                        <h1>Bahan</h1>
                        <?php echo "<ol><li>".str_replace("<br />","</li><li>",nl2br($row['temp_bahan']))."</li></ol>"; ?>
                        <h1>Cara</h1>
                        <?php echo "<ol><li>".str_replace("<br />","</li><li>",nl2br($row['temp_cara']))."</li></ol>"; ?>
                        <h1>Jenis</h1>
                        &emsp;&emsp;<?php echo $row['temp_jenis']; ?>
                    </div>
                    <div class="button">
                        <a href="admin.php?terima_res=<?php echo $row['id_temp_resep']; ?>"><span style="color: green">Terima</span></a>
                        ||
                        <a href="admin.php?tolak_res=<?php echo $row['id_temp_resep']; ?>"><span style="color: red">Tolak</span></a>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>
            </section>
        </div>
    </body>
</html>
<script src="../js/img.js"></script>