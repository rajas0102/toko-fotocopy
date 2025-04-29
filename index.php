<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Toko Fotocopy Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Produk</h2>
    <form method="POST" action="checkout.php">
        <table border="1">
            <tr>
                <th>Pilih</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM produk");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td><input type='checkbox' name='produk_id[]' value='{$row['ID_Produk']}'></td>
                        <td>{$row['Nama_Produk']}</td>
                        <td>{$row['Harga_Jual']}</td>
                        <td><input type='number' name='jumlah[{$row['ID_Produk']}]' min='1' max='{$row['Stok']}'></td>
                    </tr>";
            }
            ?>
        </table>
        <br>
        <h3>Data Pelanggan</h3>
        <h3>Data Pelanggan</h3>
<div class="form-pelanggan">
    <input type="text" name="nama" class="form-half" placeholder="Nama">
    <input type="text" name="telp" class="form-half" placeholder="No Telepon">
    <textarea name="alamat" class="form-textarea" placeholder="Alamat lengkap"></textarea>
</div>

<div class="form-button">
    <button type="submit">Checkout</button>
</div>

</body>
</html>
