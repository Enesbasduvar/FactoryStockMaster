<?php
session_start();
include("Baglan.php");
include("index_musteri.php");


if(!isset($_SESSION['Musteri_id'])){
    header("Location:login.php");
    exit;
}

if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
    exit;
}
?>




        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
 
                    <?php
if (isset($_POST['submit'])) {
    // Sipariş bilgilerini al
    $siparisler = array();
    foreach ($_POST as $key => $value) {
        if (strpos($key, "miktar_") !== false) {
            $urun_id = str_replace("miktar_", "", $key);
            $miktar = intval($value);
            if ($miktar > 0) {
                $siparisler[$urun_id] = $miktar;
            }
        }
    }
    
    // Sipariş notunu al
    $siparis_notu = isset($_POST['siparis_notu']) ? $_POST['siparis_notu'] : '';

    // Siparişleri veritabanına kaydet
    if (count($siparisler) > 0) {
        $musteri_id = intval($_SESSION["Musteri_id"]);
        $tarih = date("Y-m-d");
        $sql = "INSERT INTO siparisler (Musteri_id, Urun_id, miktar, tarih, siparis_notu) VALUES ";
        $values = array();
        foreach ($siparisler as $urun_id => $miktar) {
            $values[] = "('" . $musteri_id . "', '" . $urun_id . "', '" . $miktar . "', '" . $tarih . "', '" . $siparis_notu . "')";
        }
        $sql .= implode(",", $values);
        if ($baglan->query($sql) === true) {
            echo "Siparişiniz alındı.";
        } else {
            echo "Sipariş verirken bir hata oluştu: " . $baglan->error;
        }
    } else {
        echo "Sipariş vermediniz.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Sayfası</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        header h1 {
            margin: 0;
        }

        header p {
            margin: 5px 0 0;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product {
            background-color: #ecf0f1;
            border: 1px solid #bdc3c7;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        input[type="number"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 10px;
            border-radius: 4px;
            width: 10%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .detail-link {
            display: block;
            text-decoration: none;
            color: #3498db;
            margin-top: 10px;
        }

        .detail-link i {
            margin-right: 5px;
        }

        .siparis-notu {
            margin-top: 20px;
        }

        .siparis-notu textarea {
            width: 30%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            resize: vertical;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sipariş Sayfası</h1>
        <p>Hoş geldiniz, <?php echo $_SESSION['email']; ?>!</p>
    </header>

    <div class="container">
        <h2>Ürünler</h2>
        <form method="post" action="" class="siparis-notu">
        <div class="product-container">
            <?php
            $sql = "SELECT * FROM urunler";
            $result = $baglan->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row['Urun_Resim'] . "' alt='" . $row['Urun_Adi'] . "'>";
                    echo "<h3>" . $row['Urun_Adi'] . "</h3>";
                    echo "<p>Fiyat: " . $row['Urun_Fiyat'] . " TL</p>";
                    echo "<input type='number' name='miktar_" . $row['Urun_id'] . "' id='miktar_" . $row['Urun_id'] . "' min='0' placeholder='Adet'>";
                    echo "<a href='urun_detay.php?id=" . $row['Urun_id'] . "' class='detail-link'><i class='fas fa-info-circle'></i>Detaylar</a>";
                    echo "</div>";
                }
            } else {
                echo "Ürün bulunamadı.";
            }
            ?>
        </div>

        
            <h2>Sipariş Notu</h2>
            <textarea name="siparis_notu" rows="4" placeholder="Sipariş notunuzu buraya yazabilirsiniz..."></textarea>
            
        </form>
        <input type="submit" name="submit" value="Sipariş Ver">
    </div>
</body>
</html>


