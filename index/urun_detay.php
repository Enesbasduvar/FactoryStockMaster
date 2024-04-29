<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    
    .product-title {
      font-size: 24px;
      color: #2c3e50;
    }

    .back-btn {
      display: inline-block;
      padding: 12px 20px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .back-btn:hover {
      background-color: #2980b9;
    }

    .product-info {
      display: flex;
      flex-wrap: wrap;
    }

    .product-image {
      flex: 0 0 40%;
      margin-right: 30px;
      margin-bottom: 20px;
    }

    .product-image img {
      width: 70%;
      height: auto;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .product-details {
      flex: 1;
    }

    .product-details p {
      margin-bottom: 15px;
      color: #555;
      line-height: 1.5;
    }

    .product-details p span {
      font-weight: bold;
      margin-right: 10px;
    }

    .content-toggle {
      cursor: pointer;
      color: blue;
      text-decoration: underline;
    }

    .content-toggle:hover {
      color: darkblue;
    }

    .content-hidden {
      display: none;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <a href="siparis.php" class="back-btn">Geri Dön</a>
    <h1 class="product-title">Ürün Detayı</h1>
  </div>

  <div class="product-info">
    <div class="product-image">
      <?php
        require_once "baglan.php";

        $id = $_GET['id'];
        $sql = "SELECT * FROM urunler WHERE Urun_id = $id";
        $result = $baglan->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          echo "<img src='" . $row['Urun_Resim'] . "' alt='" . $row['Urun_Adi'] . "'>";
        } else {
          echo "Ürün bulunamadı.";
        }
      ?>
    </div>
    <div class="product-details">
      <?php
        if ($result->num_rows > 0) {
          echo "<h2>" . $row['Urun_Adi'] . "</h2>";
          echo "<p><span>Fiyat:</span> " . $row['Urun_Fiyat'] . " TL</p>";
          echo "<p><span>Stok Durumu:</span> " . $row['Urun_Stok'] . " adet</p>";
      
          echo "<div class='content-toggle'>İçerik Göster</div>";
          echo "<div class='content-hidden'>";
          echo "<p>"  .$row['Hammaddeler'] . "</p>";
          echo "<p>"  .$row['Yarimamuller'] . "</p>";
          echo "</div>";
        }
      ?>
    </div>
    </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const contentToggle = document.querySelector('.content-toggle');
    const contentHidden = document.querySelector('.content-hidden');

    contentToggle.addEventListener('click', function() {
      if (contentHidden.style.display === 'none') {
        contentHidden.style.display = 'block';
        contentToggle.textContent = 'İçerik Gizle';
      } else {
        contentHidden.style.display = 'none';
        contentToggle.textContent = 'İçerik Göster';
      }
    });
  });
</script>

</body>
</html>
