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
            $_SESSION['admin'] = false;
        }
        
        //cek admin sudah login
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
            header("Location: ./admin.php");
        }
        
        if(isset($_GET['do']) && $_GET['do'] == 'login') {
            if($_POST['username'] != "" && $_POST['password'] != "") {
                $username = mysqli_real_escape_string($connect, $_POST['username']);
                $password = mysqli_real_escape_string($connect, $_POST['password']);
                
                //cek login
                $query = "SELECT * FROM tb_admin WHERE username='$username' and password='$password'";
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result)) {
                    $row = mysqli_fetch_assoc($result);
                    
                    $_SESSION['admin'] = true;
                    
                    header("Location: ./admin.php");
                } else {
                    echo '<script>alert("Username atau password anda salah")</script>';
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
                <form action="./?do=login" method="post" class="login-form" id="login-form">
                    <span style="float: right; margin-top: -20px; margin-right: 16px;">ADMIN</span><br>
                    <label>Username</label>
                    <input class="login-input" type="text" name="username" id="username" required>
                    <label>Password</label>
                    <input class="login-input" type="password" name="password" id="password" required>
                    <input class="kirim" type="submit" value="Masuk">
                </form>
            </div>
        </section>
    </body>
</html>