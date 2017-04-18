<?php
$host = 'localhost';
$user = 'root';
$pass = 'zetto';
$db = 'db_resep';

$connect = mysqli_connect($host,$user,$pass,$db);

if(!$connect) {
    echo '<h1>koneksi ke database gagal</h1>';
}
?>