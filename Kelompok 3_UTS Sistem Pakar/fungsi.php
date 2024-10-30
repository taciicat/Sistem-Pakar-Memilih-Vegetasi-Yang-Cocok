<?php
function getRecommendations($jenis_tanah, $ketinggian_tanah, $rentang_ph, $jenis_suhu, $db) {
    $query = "SELECT kode_sayuran, nama_sayuran FROM tb_sayuran";
    $result = $db->query($query);
    
    $recommendations = [];

    while ($row = $result->fetch_assoc()) {
        $kode_sayuran = $row['kode_sayuran'];
        $nama_sayuran = $row['nama_sayuran'];
        
        $cf = getCertaintyFactor($kode_sayuran, $jenis_tanah, $ketinggian_tanah, $rentang_ph, $jenis_suhu, $db);
        
        if ($cf > 0) { // Hanya tambahkan sayuran yang memiliki nilai CF di atas 0
            $recommendations[] = [
                'nama_sayuran' => $nama_sayuran,
                'cf' => $cf
            ];
        }
    }
    
    // Urutkan hasil berdasarkan nilai CF dari tinggi ke rendah
    usort($recommendations, function($a, $b) {
        return $b['cf'] <=> $a['cf'];
    });
    
    // Ambil hanya 3 rekomendasi teratas
    $top_recommendations = array_slice($recommendations, 0, 3);

    return $top_recommendations;
}
?>
<?php
function getCertaintyFactor($kode_sayuran, $jenis_tanah, $ketinggian_tanah, $rentang_ph, $jenis_suhu, $db) {
    $cf_total = 0;

    // Query CF untuk Tanah
    $query_tanah = "SELECT cf FROM tb_relasi_tanah WHERE kode_sayuran = '$kode_sayuran' AND kode_tanah = '$jenis_tanah'";
    $result_tanah = $db->query($query_tanah);
    $cf_tanah = ($result_tanah->num_rows > 0) ? $result_tanah->fetch_assoc()['cf'] : 0;

    // Query CF untuk Ketinggian
    $query_ketinggian = "SELECT cf FROM tb_relasi_ketinggian WHERE kode_sayuran = '$kode_sayuran' AND kode_ketinggian = '$ketinggian_tanah'";
    $result_ketinggian = $db->query($query_ketinggian);
    $cf_ketinggian = ($result_ketinggian->num_rows > 0) ? $result_ketinggian->fetch_assoc()['cf'] : 0;

    // Query CF untuk pH
    $query_ph = "SELECT cf FROM tb_relasi_ph WHERE kode_sayuran = '$kode_sayuran' AND kode_ph = '$rentang_ph'";
    $result_ph = $db->query($query_ph);
    $cf_ph = ($result_ph->num_rows > 0) ? $result_ph->fetch_assoc()['cf'] : 0;

    // Query CF untuk Suhu
    $query_suhu = "SELECT cf FROM tb_relasi_suhu WHERE kode_sayuran = '$kode_sayuran' AND kode_suhu = '$jenis_suhu'";
    $result_suhu = $db->query($query_suhu);
    $cf_suhu = ($result_suhu->num_rows > 0) ? $result_suhu->fetch_assoc()['cf'] : 0;

    // Menghitung CF Total menggunakan formula CF kombinasi
    $cf_total = $cf_tanah + $cf_ketinggian * (1 - $cf_tanah);
    $cf_total = $cf_total + $cf_ph * (1 - $cf_total);
    $cf_total = $cf_total + $cf_suhu * (1 - $cf_total);

    return $cf_total;
}
?>
