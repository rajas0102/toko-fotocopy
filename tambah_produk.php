<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Toko Fotokopi</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="POST">
        Nama Produk: <input type="text" name="nama" required><br><br>
        Kategori: <input type="text" name="kategori"><br><br>
        Harga Jual: <input type="number" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        Satuan: 
        <select name="satuan">
            <option value="pcs">pcs</option>
            <option value="pak">pak</option>
            <option value="rim">rim</option>
            <option value="roll">roll</option>
            <option value="buku">buku</option>
        </select><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $nama     = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];
    $satuan   = $_POST['satuan'];

    $query = "INSERT INTO produk (Nama_Produk, Kategori, Harga_Jual, Stok, Satuan)
              VALUES ('$nama', '$kategori', $harga, $stok, '$satuan')";

    if (mysqli_query($conn, $query)) {
        echo "<p style='color: green;'>Produk berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color: red;'>Gagal menambahkan produk: " . mysqli_error($conn) . "</p>";
    }
}
?>
</body>
</html>
