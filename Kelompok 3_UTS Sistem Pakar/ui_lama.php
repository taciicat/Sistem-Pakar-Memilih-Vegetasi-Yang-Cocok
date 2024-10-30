<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Pemilihan Vegetasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sistem Pakar Pemilihan Vegetasi</h2>

    <form method="POST">
        <label for="tanah">Jenis Tanah:</label>
        <select name="tanah" id="tanah">
            <option value="berpasir">Berpasir</option>
            <option value="lempung">Lempung</option>
            <option value="gambut">Gambut</option>
        </select>

        <label for="curahHujan">Curah Hujan:</label>
        <select name="curahHujan" id="curahHujan">
            <option value="rendah">Rendah</option>
            <option value="tinggi">Tinggi</option>
        </select>

        <label for="kedalaman">Kedalaman Tanah:</label>
        <select name="kedalaman" id="kedalaman">
            <option value="dangkal">Dangkal</option>
            <option value="sedang">Sedang</option>
            <option value="dalam">Dalam</option>
        </select>

        <label for="ph">pH Tanah:</label>
        <select name="ph" id="ph">
            <option value="asam">Asam</option>
            <option value="netral">Netral</option>
            <option value="alkali">Alkali</option>
        </select>

        <button type="submit" name="proses">Proses</button>
    </form>

    <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tanah = $_POST['tanah'];
            $curahHujan = $_POST['curahHujan'];
            $kedalaman = $_POST['kedalaman'];
            $ph = $_POST['ph'];

            function inferensi($tanah, $curahHujan, $kedalaman, $ph) {
                // Logika inferensi sederhana
                if ($tanah == 'berpasir' && $curahHujan == 'rendah') {
                    return "Kaktus cocok untuk kondisi ini.";
                } elseif ($tanah == 'lempung' && $curahHujan == 'tinggi') {
                    return "Padi bisa tumbuh dengan baik.";
                } elseif ($tanah == 'gambut' && $ph == 'asam') {
                    return "Kelapa sawit cocok di area ini.";
                } else {
                    return "Tidak ada vegetasi yang direkomendasikan untuk kondisi ini.";
                }
            }

            $hasil = inferensi($tanah, $curahHujan, $kedalaman, $ph);
            echo "Hasil: " . $hasil;
        }
        ?>
    </div>
</div>

</body>
</html>
