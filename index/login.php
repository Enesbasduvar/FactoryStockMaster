
<?php
session_start();

if(isset($_SESSION['admin_id'])){
    header("Location: index.php");
    exit;
} elseif(isset($_SESSION['Musteri_id'])){
    header("Location: index_musteri.php");
    exit;
}

require_once "Baglan.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminler WHERE Email = '$email' AND Sifre = '$password'";
    $result = $baglan->query($sql);

    if ($result->num_rows > 0) {
        // Admin kullanıcısı giriş yaptı
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['email'] = $email;
        $baglan->close();
        header("Location: index.php");
        exit;
    } else {
        // Admin kullanıcısı değil, müşteri kullanıcısı giriş yapmaya çalışıyor
        $sql = "SELECT * FROM musteriler WHERE Email = '$email' AND Sifre = '$password'";
        $result = $baglan->query($sql);

        if ($result->num_rows > 0) {
            // Müşteri kullanıcısı giriş yaptı
            $row = $result->fetch_assoc();
            $_SESSION['Musteri_id'] = $row['Musteri_id'];
            $_SESSION['email'] = $email;
            $baglan->close();
            header("Location: index_musteri.php");
            exit;
        } else {
            // Şifre yanlış
            echo "E-mail veya şifre yanlış!";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yapı Malzemeleri Giriş</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('img/yapi-malzemeleri.jpg'); /* Arkaplan resmini buraya ekleyin */
            background-size: cover;
            background-position: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Arkaplanın üzerine beyaz bir şeffaflık ekleyin */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-container h2 {
            color: #333333;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 8px;
            display: block;
            color: #666666;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <img src="img/logo.jpg" alt="Yapı Malzemeleri Logo">
        <h2>Giriş Yap</h2>
        <form class="login-form" method="post" action="">
        <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" name="submit" value="Giriş Yap">
  </form>
  <p><a href="#">Forgot password?</a></p>
  <p><a href="Musteri_kayıt.php">Register</a></p>
        
    </div>

</body>

</html>
