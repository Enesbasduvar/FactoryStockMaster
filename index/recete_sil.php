<?php
include("Baglan.php");
include("menu.php");

if (isset($_GET['Recete_id']) && !empty($_GET['Recete_id'])) {
    $receteID = $_GET['Recete_id'];
    
    // Önce recete_yan_urunler tablosundaki ilişkili verileri sil
    $sqlSilYanUrunler = "DELETE FROM recete_ham_madde WHERE recete_id = $receteID";
    if (!$baglan->query($sqlSilYanUrunler)) {
        echo "Hata: " . $sqlSilYanUrunler . "<br>" . $baglan->error;
    }
    
    // Sonrasında reçeteyi sil
    $sqlSilRecete = "DELETE FROM receteler WHERE Recete_id = $receteID";
    if ($baglan->query($sqlSilRecete) === TRUE) {
        echo "Reçete başarıyla silindi.";
        header("Location: recete_liste.php");
    } else {
        echo "Hata: " . $sqlSilRecete . "<br>" . $baglan->error;
    }
} else {
    echo "Geçersiz reçete ID.";
}

?>
<button onclick="location.reload();">Reçeteleri Listele</button>

<script>
    // Sayfa yenilensin
    location.reload();
</script>