<?php
include_once 'functions.php'; // Mencegah duplikasi dengan include_once

// Ambil nilai parameter 'm' dari query string, jika tidak ada set ke 'home'.
$mod = isset($_GET['m']) ? $_GET['m'] : 'home';

// Redirect ke halaman home jika user belum login dan mencoba mengakses halaman tertentu.
if (!_session('login') && in_array($mod, ['sayuran', 'gejala', 'relasi', 'rule', 'password'])) {
    $mod = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/favicon.ico" />

    <title>Sistem Pakar Pemilihan Vegetasi</title>
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/general.css" rel="stylesheet" />
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("select:not(.default)").select2();
        });
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?">Beranda</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="?m=sayur">Sayuran</a></li>
                    <li><a href="?m=tanah">Jenis Tanah</a></li>
                    <li><a href="?m=ketinggian">Ketinggian</a></li>
                    <li><a href="?m=PH">pH</a></li>
                    <li><a href="?m=suhu">Suhu</a></li>
                    <li><a href="?m=ui">UI</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container">
        <?php
        // Cek apakah file modul ada, jika tidak, tampilkan home.php.
        if (file_exists("$mod.php")) {
            include "$mod.php";
        } else {
            include 'home.php';
        }
        ?>
    </div>
</body>

</html>
