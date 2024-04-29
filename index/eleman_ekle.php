
<?php
include 'Baglan.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Eleman Ekle</title>
</head>
<body>
    <h2>Eleman Ekle</h2>
    <form method="post" action="">
        <label for="name">İsim:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" name="submit" value="Ekle">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        if (!empty($name)) {
            $sql = "INSERT INTO elemanlar (eleman_adi) VALUES ('$name')";
            if ($baglan->query($sql) === TRUE) {
                echo "Eleman başarıyla eklendi.";
            } else {
                echo "Hata: " . $baglan->error;
            }
        } else {
            echo "İsim alanı boş bırakılamaz.";
        }
    }
    ?>
</body>
</html>