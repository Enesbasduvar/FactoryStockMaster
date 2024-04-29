<?php

include("Baglan.php");

?>
<form method="post"  style=" width:50%;" class="form-check">
  <div class="form-group">
    <label for="musteriAdi">Müşteri Adı:</label>
    <input type="text" class="form-control" id="musteriAdi" name="musteriAdi" required>
  </div>
  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="sifre">Şifre:</label>
    <input type="password" class="form-control" id="sifre" name="sifre" required></div>
  <div class="form-group">
    <label for="vergiNo">Vergi No:</label>
    <input type="text" class="form-control" id="vergiNo" name="vergiNo" required>
  </div>
  <div class="form-group">
    <label for="internetAdresi">İnternet Adresi:</label>
    <input type="text" class="form-control" id="internetAdresi" name="internetAdresi" required>
  </div>
  <div class="form-group">
    <label for="telefon">Telefon:</label>
    <input type="text" class="form-control" id="telefon" name="telefon" required>
  </div>
  <div class="form-group">
    <label for="yetkiliTelefon">Yetkili Telefon:</label>
    <input type="text" class="form-control" id="yetkiliTelefon" name="yetkiliTelefon" required>
  </div>
  <div class="form-group">
    <label for="muhendisTelefon">Mühendis Telefon:</label>
    <input type="text" class="form-control" id="muhendisTelefon" name="muhendisTelefon" required>
  </div>
  <div class="form-group">
    <label for="iban">IBAN:</label>
    <input type="text" class="form-control" id="iban" name="iban" required>
  </div>
  <div class="form-group">
    <label for="projeAdi">Proje Adı:</label>
    <input type="text" class="form-control" id="projeAdi" name="projeAdi" required>
  </div>
  <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $musteriAdi = $_POST['musteriAdi'];
    $sifre = $_POST['sifre'];
    $email = $_POST['email'];
    $vergiNo = $_POST['vergiNo'];
    $internetAdresi = $_POST['internetAdresi'];
    $telefon = $_POST['telefon'];
    $yetkiliTelefon = $_POST['yetkiliTelefon'];
    $muhendisTelefon = $_POST['muhendisTelefon'];
    $iban = $_POST['iban'];
    $projeAdi = $_POST['projeAdi'];

    $hashedPassword = password_hash($sifre, PASSWORD_DEFAULT);
    $sql = "INSERT INTO musteriler (Musteri_Adi, Sifre, Email, Vergi_No, Internet_Adresi, Telefon, Yetkili_Telefon, Muhendis_Telefon, IBAN, Proje_Adi)
    VALUES ('$musteriAdi', '$sifre', '$email', '$vergiNo', '$internetAdresi', '$telefon', '$yetkiliTelefon', '$muhendisTelefon', '$iban', '$projeAdi')";
    if ($baglan->query($sql) === TRUE) {
        echo "Müşteri başarıyla kaydedildi.";
        header("Location: login.php"); // Redirect to login page
        exit(); // Stop further execution
    } else {
        echo "Hata: " . $sql . "<br>" . $baglan->error;
    }
}
?>