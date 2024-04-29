<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: index.php"); // Oturum açılmamışsa veya oturumda admin kimliği yoksa giriş sayfasına yönlendir.
    exit;
}
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Serkeft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex align-items-center">



                    

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge badge-danger badge-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-2.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                            <p class="font-size-12 mb-1">You have new follower on Instagram</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-cloud-download-outline"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Download Available !</h6>
                                            <p class="font-size-12 mb-1">Latest version of admin is now available.
                                                Please download here.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 4 hours ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-3.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                            <p class="font-size-12 mb-1">Just upgraded to premium account.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Jamie D.</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Inbox</span>
                                <span>
                                    <span class="badge badge-pill badge-info">3</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Profile</span>
                                <span>
                                    <span class="badge badge-pill badge-warning">1</span>
                                </span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Lock Account</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <i class="mdi mdi-alpha-x-circle"></i>
                        <span>
                            Xacton
                        </span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="index.php" class="waves-effect"><i class="feather-airplay"></i><span
                                    class="badge badge-pill badge-primary float-right">7</span><span>Anasayfa</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="feather-copy"></i><span>müşterliler</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="musteri_liste.php">Musteriler</a></li>
                                <li><a href="Musteri_ekle.php">musteri ekle</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="feather-copy"></i><span>mamüller</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="mamul_liste.php">Mamüller</a></li>
                                <li><a href="Urun_ekle.php">mamül ekle</a></li>
                                <li><a href="recete_liste.php">mamül üretim listesi</a></li>
                                <li><a href="Uretim.php">Mamül üretim girişi</a></li>
                                <li><a href="mamul_iade.php">mamül iade girişi</a></li>
                                <li><a href="m_transfer.php">mamül depo transferi</a></li>
                                <li><a href="satis_hareket.php">Mamül stok hareketleri</a></li>
                                <li><a href="Satis.php">Satış faturası girisi</a></li>
                                <li><a href="satis_ft.php">satış faturaları</a></li>
                                <li><a href="m_iade_liste.php">mamül iade liste</a></li>
                                <li><a href="m_transfer_liste.php">mamül Transfer liste</a></li>

                                

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="feather-copy"></i><span>ham maddeler</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="hm_liste.php">Ham maddeler</a></li>
                                <li><a href="hammadde_ekle.php">ham madde ekle</a></li>
                                <li><a href="alis_ft.php">alış faturaları</a></li>
                                <li><a href="hm_iade.php">ham madde iade girişi</a></li>
                                <li><a href="hm_iade_liste.php">hammadde iadeler</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="feather-copy"></i><span>yarı mamüller</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ym_liste.php">YarıMamüller</a></li>
                                <li><a href="yarimamul.php">yari mamül girişi</a></li>
                                <li><a href="ym_recete_liste.php">reçeteler</a></li>
                                <li><a href="yarimamul_uretim.php">yarı mamul üretim</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="siparisler.php" class=" waves-effect"><i
                                    class="feather-calendar"></i><span>siparişler</span></a>
                        </li>

                        
                        

                    </ul>
                    <li>
                        <form method="post" action="">
                        <input type="submit" name="logout" value="Çıkış Yap">
                        </form></li>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                     


                    <?php
include("Baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anaUrunID = $_POST["Urun"];
    $satilanMiktar = $_POST["satilan_miktar"];
    $firmaAdi = $_POST["firma_adi"];
    $urunKodu = $_POST["urun_kodu"];
    $urunBarkod = $_POST["urun_barkod"];
    $receteNo=$_POST["Recete_no"];
    $tarih = $_POST["tarih"];
    $iskontoOrani = $_POST["iskonto_orani"];
    $nakitOrani = $_POST["nakit_orani"];
    $bartirOrani = $_POST["bartir_oran"];

    // Ana ürünü sorgula
    $sqlAnaUrun = "SELECT urunler.Urun_Adi AS Urun_Adi, urunler.Urun_Stok AS Urun_Stok, stok_hareketleri.hareket_tipi, stok_hareketleri.hareket_Tarihi, stok_hareketleri.miktar, receteler.Recete_no
    FROM stok_hareketleri
    INNER JOIN urunler ON stok_hareketleri.Urun_id = urunler.Urun_id
    LEFT JOIN receteler ON stok_hareketleri.recete_id = receteler.Recete_id
    WHERE urunler.Urun_id = $anaUrunID";
    
    $resultAnaUrun = $baglan->query($sqlAnaUrun);

    if ($resultAnaUrun->num_rows > 0) {
        $rowAnaUrun = $resultAnaUrun->fetch_assoc();
        $anaUrunAdi = $rowAnaUrun["Urun_Adi"];
        $stokMiktar = $rowAnaUrun["Urun_Stok"];
        $firmaAdi = $_POST["firma_adi"];
        if ($stokMiktar >= $satilanMiktar) {
            // Stoktan düş
            $newStokMiktar = $stokMiktar - $satilanMiktar;
            $sqlUpdateStok = "UPDATE urunler SET Urun_Stok = $newStokMiktar WHERE Urun_id = $anaUrunID";
            $baglan->query($sqlUpdateStok);
    
            // Stok hareketi ekle
            
            $sqlStokHareket = "INSERT INTO stok_hareketleri (hareket_Tarihi, Urun_id, Musteri_id, hareket_tipi, Miktar,Recete_no) 
            VALUES ('$tarih', $anaUrunID, $firmaAdi, (SELECT Musteri_Adi FROM musteriler WHERE Musteri_id = $firmaAdi), -$satilanMiktar,$receteNo)";
            $baglan->query($sqlStokHareket);

            // Satış faturası ekle
            $sqlSatisFaturasi = "INSERT INTO satis_faturalari (urun_adi, urun_barkod, urun_kodu, miktar, musteri_adi, tarih, iskonto_orani, nakit_orani, bartir_orani, musteri_id, urun_id) 
            VALUES ('$anaUrunAdi', '$urunBarkod', '$urunKodu', $satilanMiktar, (SELECT Musteri_Adi FROM musteriler WHERE Musteri_id = $firmaAdi), '$tarih', $iskontoOrani, $nakitOrani, $bartirOrani, $firmaAdi, $anaUrunID)";
            $baglan->query($sqlSatisFaturasi);
    
            // Başarılı mesajı
            echo "Satış işlemi başarıyla tamamlandı.";
        } else {
            // Stok yetersiz mesajı
            echo "Stokta yetersiz miktar!";
            echo "<br><a href='Uretim.php'>Üretim sayfasına geri dön</a>";
        }

        
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Satış Faturası Oluştur</title>
    <style>

/* Genel stiller */

body {
  font-family: sans-serif;
  margin: 2rem;
  background-color: #f7f7f7;
}

h1, h2, h3, h4, h5, h6 {
  font-weight: bold;
  margin-top: 1rem;
  margin-bottom: 0.5rem;
}

p {
  margin-bottom: 1rem;
}

label {
  font-weight: normal;
  margin-bottom: 0.5rem;
}

input,
select,
textarea {
  border: 1px solid #ccc;
  padding: 0.5rem;
  border-radius: 4px;
  width: 100%;
}

input:focus,
select:focus,
textarea:focus {
  outline: none;
  border-color: #007bff;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0069d9;
}

/* Form stili */

form {
  width: 80%;
  margin: 0 auto;
  padding: 2rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 1rem;
}

.form-row {
  display: flex;
  flex-wrap: wrap;
}

.form-row .form-group {
  margin-right: 1rem;
}

.form-utility {
  display: flex;
  justify-content: space-between;
}

/* Özel element stilleri */

#Urun {
  width: 200px;
}

#satilan_miktar {
  width: 100px;
}

#firma_adi {
  width: 300px;
}

#urun_kodu,
#urun_barkod,
#Recete_no,
#tarih,
#iskonto_orani,
#nakit_orani,
#bartir_oran {
  width: 200px;
}

/* Renk paleti */

body {
  background-color: #fff;
  color: #333;
}

h1, h2, h3, h4, h5, h6 {
  color: #007bff;
}

p {
  color: #666;
}

label {
  color: #999;
}

input,
select,
textarea {
  border-color: #ddd;
}

input:focus,
select:focus,
textarea:focus {
  border-color: #007bff;
}

button {
  background-color: #007bff;
}

button:hover {
  background-color: #0069d9;
}

/* Medya sorguları */

@media (max-width: 768px) {
  form {
    width: 100%;
  }

  .form-row {
    flex-direction: column;
  }

  .form-utility {
    flex-direction: column;
  }
}

    </style>
</head>
<body>
    
    <h2>Satış Faturası Oluştur</h2>
    <form method="post" action="">
        <label for="Urun">Mamül Seçiniz:</label>
        <select name="Urun" id="Urun">
            <!-- Ana ürünleri dropdown'dan seçebilirsiniz -->
            <?php
            $sqlUrunler = "SELECT Urun_id, Urun_Adi FROM urunler";
            $resultUrunler = $baglan->query($sqlUrunler);
            while ($rowUrun = $resultUrunler->fetch_assoc()) {
                echo "<option value='" . $rowUrun["Urun_id"] . "'>" . $rowUrun["Urun_Adi"] . "</option>";
            }
            ?>
        </select><br>

        <label for="satilan_miktar">Satılan Miktar:</label>
        <input type="number" name="satilan_miktar" id="satilan_miktar" required><br>

        <div class="form-group">
            <label for="firma_adi">Firma Adı:</label>
            <select class="form-control" id="firma_adi" name="firma_adi">
                <?php
                $sqlFirmalar = "SELECT * FROM musteriler";
                $resultFirmalar = $baglan->query($sqlFirmalar);

                if ($resultFirmalar->num_rows > 0) {
                    while ($rowFirmalar = $resultFirmalar->fetch_assoc()) {
                        echo "<option value='" . $rowFirmalar["Musteri_id"] . "'>" . $rowFirmalar["Musteri_Adi"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
          <label for="urun_kodu">Ürün Kodu:</label>
          <input type="text" class="form-control" id="urun_kodu" name="urun_kodu">
        </div>
        <div class="form-group">
          <label for="urun_barkod">Ürün Barkod:</label>
          <input type="text" class="form-control" id="urun_barkod" name="urun_barkod">
        </div>
        <div class="form-group">
          <label for="Recete_no">Reçete No:</label>
          <input type="text" class="form-control" id="Recete_no" name="Recete_no">
        <div class="form-group">
          <label for="tarih">Tarih:</label>
          <input type="date" class="form-control" id="tarih" name="tarih">
        </div>
        <div class="form-group">
          <label for="iskonto_orani">İskonto Oranı:</label>
          <input type="number" class="form-control" id="iskonto_orani" name="iskonto_orani">
        </div>
        <div class="form-group">
          <label for="nakit_orani">Nakit Oranı:</label>
          <input type="number" class="form-control" id="nakit_orani" name="nakit_orani">
        </div>
        <div class="form-group">
          <label for="bartir_oran">Bartır Oranı:</label>
          <input type="number" class="form-control" id="bartir_oran" name="bartir_oran">
        </div>

        <input type="submit" value="Fatura Oluştur">
    </form>


    
</body>
</html>



                    <!-- end page title -->



 

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © EVO
                        </div>

                    </div>
                </div>
            </footer>


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.flash.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="../plugins/datatables/dataTables.select.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets/pages/datatables-demo.js"></script>


    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>


