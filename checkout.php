<?php
include 'db.php';

// Simpan pelanggan
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

mysqli_query($conn, "INSERT INTO pelanggan (Nama_Pelanggan, No_Telepon, Alamat)
VALUES ('$nama', '$telp', '$alamat')");

$id_pelanggan = mysqli_insert_id($conn);

// Simpan transaksi
$tanggal = date('Y-m-d');
mysqli_query($conn, "INSERT INTO transaksi_penjualan (Tanggal_Transaksi, ID_Pelanggan)
VALUES ('$tanggal', $id_pelanggan)");

$id_transaksi = mysqli_insert_id($conn);

// Ambil produk
$total = 0;
foreach ($_POST['produk_id'] as $id_produk) {
    $jumlah = $_POST['jumlah'][$id_produk];
    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE ID_Produk = $id_produk"));
    $harga = $produk['Harga_Jual'];
    $subtotal = $harga * $jumlah;
    $total += $subtotal;

    mysqli_query($conn, "INSERT INTO detail_transaksi
        (ID_Transaksi, ID_Produk, Jumlah, Harga_Satuan, Subtotal)
        VALUES ($id_transaksi, $id_produk, $jumlah, $harga, $subtotal)");

    // Update stok
    mysqli_query($conn, "UPDATE produk SET Stok = Stok - $jumlah WHERE ID_Produk = $id_produk");
}

// Update total transaksi
mysqli_query($conn, "UPDATE transaksi_penjualan SET Total_Harga = $total WHERE ID_Transaksi = $id_transaksi");

echo "Transaksi berhasil disimpan!";
?>
