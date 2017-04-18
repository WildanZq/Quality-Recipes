<!DOCTYPE html>
<html>
    <head>
        <title>Resep Makanan</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/query.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="icon" type="image/x-icon" href="../images/logoo.png"/>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <?php
        require_once "../php/connect.php";
        session_start();
        
        if(isset($_GET['do']) && $_GET['do'] == 'logout') {
            session_unset();
        }
        
        //cek user sudah login
        if(isset($_SESSION['login']) && $_SESSION['login'] != ''){
            header("Location: ../");
        }
        
        if(isset($_GET['do']) && $_GET['do'] == 'login') {
            if($_POST['username'] != "" && $_POST['password'] != "") {
                $username = mysqli_real_escape_string($connect, $_POST['username']);
                $password = mysqli_real_escape_string($connect, $_POST['password']);
                
                //cek login
                $query = "SELECT * FROM tb_akun WHERE username='$username' and password='$password'";
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result)) {
                    $row = mysqli_fetch_assoc($result);
                    $id_akun = $row['id_akun'];
                    
                    $_SESSION['login'] = "$id_akun";
                
                    header("Location: ../");
                } else {
                    echo '<script>alert("Username atau password anda salah")</script>';
                }
                
            } else {
                echo '<script>alert("Harus terisi semua!")</script>';
            }
        }
        
        if(isset($_GET['do']) && $_GET['do'] == 'signup') {
            if($_POST['nama'] != "" && $_POST['username'] != "" && $_POST['password'] != "") {
                $nama = $_POST['nama'];
                $username = mysqli_real_escape_string($connect, $_POST['username']);
                $password = $_POST['password'];
                
                //cek username
                $query = "SELECT * FROM tb_akun WHERE username='$username'";
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0) {
                    echo '<script>alert("Username telah dimiliki orang lain")</script>';
                } else {
                    //tambah akun
                    $query = "INSERT INTO tb_akun(nama, username, password) VALUES   ('".$nama."','".$username."','".$password."')";
                    $result = mysqli_query($connect,$query);
                    
                    if($result) {
                        echo '<script>alert("Akun anda berhasil dibuat")</script>';
                    } else {
                        echo '<script>alert("Gagal membuat akun")</script>';
                    }
                }
                
            } else {
                echo '<script>alert("Harus terisi semua!")</script>';
            }
        }
        ?>
    </head>
    <body>
        <section class="login">
            <div class="login-cont">
                <a href="../"><img class="logo-login" src="../images/logow.png"></a>
                
                <div class="tab-cont">
                    <div class="tab tab-active" onclick="tab(0)">Login</div>
                    <div class="tab" onclick="tab(1)">Signup</div>
                </div>
                
                <form action="./?do=login" method="post" class="login-form" id="login-form">
                    <label>Username</label>
                    <input class="login-input" type="text" name="username" id="username" required>
                    <label>Password</label>
                    <input class="login-input" type="password" name="password" id="password" required>
                    <input class="kirim" type="submit" value="Masuk">
                    <a href="javascript:void(0)" class="login-a" onclick="tab(1)">Buat akun</a>
                </form>
                
                <form action="./?do=signup" method="post" class="login-form disable" id="signup-form">
                    <label>Display Name</label>
                    <input class="login-input" type="text" name="nama" id="nama" required>
                    <label>Username</label>
                    <input class="login-input" type="text" name="username" id="username" required>
                    <label>Password</label>
                    <input class="login-input" type="password" name="password" id="password" required>
                    <input class="kirim" type="submit" value="Daftar">
                    <a href="javascript:void(0)" class="login-a" onclick="tab(0)">Login</a>
                </form>
            </div>
        </section>
    </body>
</html>
<script src="../js/login.js"></script>