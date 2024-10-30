<?php
session_start();

$config["server"] = 'localhost';
$config["username"] = 'root';
$config["password"] = '';
$config["database_name"] = 'cf_fc';

include_once 'includes/db.php'; // Gunakan include_once agar tidak ada duplikasi
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);

// Fungsi _post
if (!function_exists('_post')) {
    function _post($key, $val = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $val;
    }
}

// Fungsi _get
if (!function_exists('_get')) {
    function _get($key, $val = null) {
        return isset($_GET[$key]) ? $_GET[$key] : $val;
    }
}

// Fungsi _session
if (!function_exists('_session')) {
    function _session($key, $val = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $val;
    }
}

$mod = _get('m');
$act = _get('act');

// Ambil data jenis tanah
$rows = $db->get_results("SELECT kode_tanah, jenis_tanah FROM tb_tanah ORDER BY kode_tanah");
$TANAH = [];
foreach ($rows as $row) {
    $TANAH[$row->kode_tanah] = $row->jenis_tanah;
}

// Ambil data sayuran
$rows = $db->get_results("SELECT * FROM tb_sayuran ORDER BY kode_sayuran");
$SAYURAN = [];
foreach ($rows as $row) {
    $SAYURAN[$row->kode_sayuran] = $row;
}

// Fungsi untuk mendapatkan jawaban konsultasi
function get_terjawab() {
    global $db;
    $rows = $db->get_results("SELECT kode_tanah, jawaban FROM tb_konsultasi");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_tanah] = $row->jawaban;
    }
    return $arr;
}

// Fungsi untuk mendapatkan tanah berikutnya
function get_next_tanah($relasi) {
    eliminate_relasi($relasi);
    foreach ($relasi as $key => $val) {
        foreach ($val as $k => $v) {
            if ($v == '') {
                return $k;
            }
        }
    }
    return false;
}

// Fungsi untuk mendapatkan relasi berdasarkan jawaban
function get_relasi($terjawab) {
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, r.kode_sayuran
        FROM tb_relasi r
        ORDER BY kode_diagnosa, r.kode_sayuran");
    $arr = [];
    foreach ($rows as $row) {
        $arr[$row->kode_diagnosa][$row->kode_sayuran] = isset($terjawab[$row->kode_sayuran]) ? $terjawab[$row->kode_sayuran] : null;
    }
    return $arr;
}

// Fungsi untuk mendapatkan opsi diagnosa
function CF_get_diagnosa_option($selected = '') {
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosa ORDER BY kode_diagnosa");
    $a = '';
    foreach ($rows as $row) {
        $selected_attr = $row->kode_diagnosa == $selected ? 'selected' : '';
        $a .= "<option value='{$row->kode_diagnosa}' {$selected_attr}>[{$row->kode_diagnosa}] {$row->nama_diagnosa}</option>";
    }
    return $a;
}

// Fungsi untuk mendapatkan opsi level user
function get_level_option($selected = '') {
    $arr = ['admin' => 'Admin', 'user' => 'User'];
    $a = '';
    foreach ($arr as $key => $val) {
        $selected_attr = $selected == $key ? 'selected' : '';
        $a .= "<option value='{$key}' {$selected_attr}>{$val}</option>";
    }
    return $a;
}

// Fungsi untuk mendapatkan opsi sayuran
function CF_get_sayuran_option($selected = '') {
    global $db;
    $rows = $db->get_results("SELECT kode_sayuran, nama_sayuran FROM tb_sayuran ORDER BY kode_sayuran");
    $a = '';
    foreach ($rows as $row) {
        $selected_attr = $row->kode_sayuran == $selected ? 'selected' : '';
        $a .= "<option value='{$row->kode_sayuran}' {$selected_attr}>[{$row->kode_sayuran}] {$row->nama_sayuran}</option>";
    }
    return $a;
}

// Fungsi untuk mendapatkan nilai set dari POST atau GET
function set_value($key = null, $default = null) {
    return $_POST[$key] ?? $_GET[$key] ?? $default;
}

// Fungsi untuk membuat kode otomatis
function kode_oto($field, $table, $prefix, $length) {
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . ((int)substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

// Fungsi untuk escape field
function esc_field($str) {
    return $str ? addslashes($str) : '';
}

// Fungsi untuk redirect dengan JavaScript
function redirect_js($url) {
    echo "<script type='text/javascript'>window.location.replace('{$url}');</script>";
}

// Fungsi untuk alert dengan JavaScript
function alert($msg) {
    echo "<script type='text/javascript'>alert('{$msg}');</script>";
}

// Fungsi untuk menampilkan pesan
function print_msg($msg, $type = 'danger') {
    echo "<div class='alert alert-{$type} alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            {$msg}
          </div>";
}

// Fungsi untuk mengeliminasi relasi
function eliminate_relasi(&$relasi) {
    foreach ($relasi as $key => $val) {
        $tidak = 0;
        foreach ($val as $k => $v) {
            if ($v == 'Tidak') {
                $tidak++;
            }
        }
        if ($tidak >= 2 || $tidak >= count($val) / 2) {
            unset($relasi[$key]);
        }
    }
}