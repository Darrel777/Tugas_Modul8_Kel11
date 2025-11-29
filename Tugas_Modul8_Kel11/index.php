<?php
// ======================================================
//  Program Kasir Sederhana - Kelompok 11 
//  Modul yang digunakan:
//  - Modul 1: Variabel, Tipe Data, Array
//  - Modul 2: Pengkondisian
//  - Modul 3: Perulangan
//  - Modul 4: Function
// ======================================================

// ================== MODUL 1: VARIABEL + ARRAY ==================
$menu = [
    "Nasi Goreng" => 15000,
    "Mie Ayam"    => 12000,
    "Soto Ayam"   => 18000
];

// ================== MODUL 4: FUNCTION ===========================
function hitungTotal($harga, $jumlah) {
    return $harga * $jumlah;
}

$hasil = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama   = $_POST["nama"];
    $pesan  = $_POST["menu"];
    $jumlah = $_POST["jumlah"];

    // ================== MODUL 2: PENGKONDISIAN ==================
    if (empty($nama)) {
        $hasil = "<span style='color:red;'>Nama tidak boleh kosong.</span>";
    } elseif (!isset($menu[$pesan])) {
        $hasil = "<span style='color:red;'>Menu tidak valid.</span>";
    } elseif ($jumlah <= 0) {
        $hasil = "<span style='color:red;'>Jumlah harus lebih dari 0.</span>";
    } else {
        $harga = $menu[$pesan];
        $total = hitungTotal($harga, $jumlah);

        // ================== CETAK STRUK =======================
        $hasil = "
        <h3>Struk Pembelian</h3>
        <b>Kelompok 11</b><br>
        Nama Pemesan: $nama <br>
        Menu: $pesan <br>
        Harga Satuan: Rp $harga <br>
        Jumlah: $jumlah <br>
        <b>Total Bayar: Rp $total</b>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Sederhana Kelompok 11</title>
</head>
<body>
    <h2>Program Kasir Sederhana - Kelompok 11</h2>

    <form method="POST">
        <label>Nama Pemesan:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Pilih Menu:</label><br>
        <select name="menu">
            <?php 
            // ================== MODUL 3: PERULANGAN (foreach) ==================
            foreach ($menu as $namaMenu => $harga) {
                echo "<option value='$namaMenu'>$namaMenu (Rp $harga)</option>";
            }
            ?>
        </select><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah"><br><br>

        <button type="submit">Hitung</button>
    </form>

    <hr>
    <?php echo $hasil; ?>

</body>
</html>
