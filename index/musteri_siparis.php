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

$musteri_id = intval($_SESSION["Musteri_id"]);
$sql = "SELECT siparisler.siparis_id, siparisler.tarih, urunler.Urun_Adi, siparisler.miktar, siparisler.hazirlandi, siparisler.onaylandi,siparisler.siparis_notu
        FROM siparisler
        INNER JOIN urunler ON siparisler.Urun_id = urunler.Urun_id
        WHERE siparisler.Musteri_id = $musteri_id";
$result = $baglan->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .status {
            text-align: center;
        }

        .approved {
            color: green;
        }

        .not-approved {
            color: red;
        }

        .prepared {
            color: green;
        }

        .not-prepared {
            color: red;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                
                <th>Sipariş Tarihi</th>
                <th>Ürün Adı</th>
                <th>Miktar</th>
                <th>Onaylandı mı?</th>
                <th>Hazırlandı mı?</th>
                <th>Sipariş Notu</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    
                    <td><?php echo $row["tarih"]; ?></td>
                    <td><?php echo $row["Urun_Adi"]; ?></td>
                    <td><?php echo $row["miktar"]; ?></td>
                    <td class="status <?php echo $row["onaylandi"] == "1" ? "approved" : "not-approved"; ?>">
                        <?php echo $row["onaylandi"] == "1" ? "Onaylandı" : "Onaylanmadı"; ?>
                    </td>
                    <td class="status <?php echo $row["hazirlandi"] == "1" ? "prepared" : "not-prepared"; ?>">
                        <?php echo $row["hazirlandi"] == "1" ? "Hazırlandı" : "Hazırlanmadı"; ?>
                    </td>
                    <td><?php echo $row["siparis_notu"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>

