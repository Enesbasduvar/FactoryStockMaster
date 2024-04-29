<?php
ob_start();
include("Baglan.php");
include("menu.php");

$tur = '';
if (isset($_GET['id']) && isset($_GET['tur'])) {
    $id = $_GET['id'];
    $tur = $_GET['tur'];

    $result = null;
    if ($tur == 'ana_urun') {
        $sql = "SELECT * FROM urunler WHERE Urun_id = $id";
        $result = $baglan->query($sql);
    }  else if ($tur == 'ham_madde') {
        $sql = "SELECT * FROM ham_madde WHERE HM_id = $id";
        $result = $baglan->query($sql);
    
    } else if ($tur == 'yarimamuller'){
        $sql = "SELECT * FROM yarimamuller WHERE YM_id = $id";
        $result = $baglan->query($sql);
    }




    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $urunAdi = $row['Urun_Adi'] ?? $row['YM_Adi'] ?? $row['HM_Adi'];
        $urunStok = $row['Urun_Stok'] ?? $row['YM_Stok'] ?? $row['HM_Stok'];
        $urunFiyat = isset($row['Urun_Fiyat']) ? $row['Urun_Fiyat'] : null;
        $urunHammaddeler = isset($row['Hammaddeler']) ? $row['Hammaddeler'] : null;
        $urunYariMamüller = isset($row['Yarimamuller']) ? $row['Yarimamuller'] : null;
    }
}

if (isset($_POST['guncelle'])) {
    $id = $_POST['id'];
    $urunAdi = $_POST['UrunAdi'];
    $urunStok = $_POST['UrunStok'];
    $urunFiyat = $_POST['UrunFiyat']?? '';
    $urunHammaddeler = $_POST['UrunHammaddeler']?? '';
    $urunYariMamüller = $_POST['UrunYariMamuller']?? '';

    if ($tur == 'ana_urun') {
       
        $sql = "UPDATE urunler SET Urun_Adi = '$urunAdi', Urun_Fiyat = '$urunFiyat', Urun_Stok = '$urunStok', Hammaddeler = '$urunHammaddeler', Yarimamuller = '$urunYariMamüller' WHERE Urun_id = $id";
    }  else if ($tur == 'ham_madde') {
        $sql = "UPDATE ham_madde SET HM_Adi = '$urunAdi', HM_Stok = '$urunStok' WHERE HM_id = $id";
    }
    else{
        $sql = "UPDATE yarimamuller SET YM_Adi = '$urunAdi', YM_Stok = '$urunStok' WHERE YM_id = $id";
    }
    $baglan->query($sql);

    
    ob_end_flush(); 
}
?>
<form method="post" action="">
    <?php if ($tur == "ana_urun") { ?>
        <input type="hidden" name="tur" value="ana_urun">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Ürün Adı: <input type="text" name="UrunAdi" value="<?php echo $urunAdi; ?>"><br>
        Fiyat: <input type="text" name="UrunFiyat" value="<?php echo $urunFiyat; ?>"><br>
        Stok Bilgisi: <input type="text" name="UrunStok" value="<?php echo $urunStok; ?>"><br>
        Hammaddeler: <textarea name="UrunHammaddeler" value="<?php echo $urunHammaddeler; ?>"></textarea><br>
        YarıMamüller:<textarea  name="UrunYariMamuller" value="<?php echo $urunYariMamüller; ?>"></textarea><br>
    <?php } else if ($tur == "ham_madde") { ?>
        <input type="hidden" name="tur" value="<?php echo $tur; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Ürün Adı: <input type="text" name="UrunAdi" value="<?php echo $urunAdi; ?>"><br>
        <?php if ($tur == "ham_madde") { ?>
            <!-- Ham Maddeler için fiyat alanı yok -->
        <?php } ?>
        Stok Miktarı: <input type="text" name="UrunStok" value="<?php echo $urunStok; ?>"><br>
    <?php } else if ($tur == "yarimamuller") { ?>
        <input type="hidden" name="tur" value="<?php echo $tur; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Ürün Adı: <input type="text" name="UrunAdi" value="<?php echo $urunAdi; ?>"><br>
        
        Stok Miktarı: <input type="text" name="UrunStok" value="<?php echo $urunStok; ?>"><br>
    <?php } ?>
    <input type="submit" name="guncelle" value="Kaydet">
</form>

