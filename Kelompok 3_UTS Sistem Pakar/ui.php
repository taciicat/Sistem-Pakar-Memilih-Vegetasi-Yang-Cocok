<?php
include_once 'functions.php';
include_once 'fungsi.php';
?>

<div class="page-header">
    <h1>Sistem Pakar Pemilihan Vegetasi</h1>
</div>

<div class="container" style="width: 450px; margin: auto;">
    <form method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        <label for="tanah">Jenis Tanah:</label>
        <select name="jenis_tanah" id="tanah" style="padding: 5px;">
            <?php
            $rows = $db->query("SELECT kode_tanah, jenis_tanah FROM tb_tanah");
            while ($row = $rows->fetch_assoc()) {
                echo "<option value='{$row['kode_tanah']}'>{$row['jenis_tanah']}</option>";
            }
            ?>
        </select>

        <label for="ketinggian_tanah">Curah Hujan:</label>
        <select name="ketinggian_tanah" id="ketinggian_tanah" style="padding: 5px;">
            <?php
            $rows = $db->query("SELECT kode_ketinggian, ketinggian_tanah FROM tb_ketinggian");
            while ($row = $rows->fetch_assoc()) {
                echo "<option value='{$row['kode_ketinggian']}'>{$row['ketinggian_tanah']}</option>";
            }
            ?>
        </select>

        <label for="ph">pH Tanah:</label>
        <select name="ph" id="ph" style="padding: 5px;">
            <?php
            $rows = $db->query("SELECT kode_ph, rentang_ph FROM tb_ph");
            while ($row = $rows->fetch_assoc()) {
                echo "<option value='{$row['kode_ph']}'>{$row['rentang_ph']}</option>";
            }
            ?>
        </select>

        <label for="suhu">Kedalaman Tanah:</label>
        <select name="suhu" id="suhu" style="padding: 5px;">
            <?php
            $rows = $db->query("SELECT kode_suhu, jenis_suhu FROM tb_suhu");
            while ($row = $rows->fetch_assoc()) {
                echo "<option value='{$row['kode_suhu']}'>{$row['jenis_suhu']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="proses" style="padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
            Proses
        </button>
    </form>

</div>

    <div class="container" style="width: 1000px; margin: auto;">
    <div class="result" style="margin-top: 20px;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jenis_tanah = $_POST['jenis_tanah'];
            $ketinggian_tanah = $_POST['ketinggian_tanah'];
            $ph = $_POST['ph'];
            $suhu = $_POST['suhu'];

            $recommendations = getRecommendations($jenis_tanah, $ketinggian_tanah, $ph, $suhu, $db);

            if (empty($recommendations)) {
                echo "<p style='color: red;'>Tidak ada rekomendasi yang cocok.</p>";
            } else {
                echo "<h3>Rekomendasi Teratas:</h3>";
                echo "<table class='table table-bordered' style='width: 120%; border-collapse: collapse;'>
                        <thead>
                            <tr style='background-color: #f2f2f2;'>
                                <th>No</th>
                                <th>Nama Sayuran</th>
                                <th>Keterangan</th>
                                <th>CF</th>
                            </tr>
                        </thead>
                        <tbody>";
                $no = 1;
                foreach ($recommendations as $rec) {
                    $nama_sayuran = $rec['nama_sayuran'];
                    $query = "SELECT keterangan FROM tb_sayuran WHERE nama_sayuran = '$nama_sayuran'";
                    $result = $db->query($query);
                    $keterangan = $result->num_rows > 0 ? $result->fetch_assoc()['keterangan'] : "Tidak ada keterangan";

                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$rec['nama_sayuran']}</td>
                            <td>{$keterangan}</td>
                            <td>{$rec['cf']}</td>
                        </tr>";
                    $no++;
                }
                echo "</tbody></table>";
            }
        }
        ?>
    </div>
    </div>
