<?php
$logged = false;
$nama = "";

if(isset($_SESSION['login']) && $_SESSION['login'] != ''){
    $logged = true;
    
    $query = "SELECT * FROM tb_akun WHERE id_akun = " .$_SESSION['login'];
    $result = mysqli_query($connect,$query);
    
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $foto = $row['foto'];
}
?>