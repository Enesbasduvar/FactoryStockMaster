<?php

include("Baglan.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Paneli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Sayfa arkaplan rengi */
        }

        header {
            background-color: #333; /* Başlık arkaplan rengi */
            padding: 10px;
            color: white;
            text-align: center;
        }

        nav {
            background-color: #444; /* Menü arkaplan rengi */
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd; /* Hover rengi */
            color: black;
        }

        nav a.active {
            background-color: #4CAF50; /* Aktif sayfa rengi */
            color: white;
        }

        .logout-form {
            text-align: center;
            margin-top: 20px;
        }

        .logout-form input {
            background-color: #f44336; /* Çıkış yap buton rengi */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-form input:hover {
            background-color: #d32f2f; /* Hover rengi */
        }
    </style>
</head>

<body>

    <header>
        <h1>Kullanıcı Paneli</h1>
    </header>

    <nav>
        <a href="siparis.php">Sipariş Ver</a>
        <a href="musteri_siparis.php">Siparişlerim</a>
        <div class="logout-form">
            <form method="post" action="">
                <input type="submit" name="logout" value="Çıkış Yap">
            </form>
        </div>
    </nav>

</body>

</html>
