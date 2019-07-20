<?php include("templates/header.php"); ?>
<?php
include("../database/koneksi.php");
$query_pelanggan = mysqli_query($koneksi, "SELECT pelanggan.id_pelanggan, pelanggan.nama_pelanggan from pelanggan");
$query_produk = mysqli_query($koneksi, "SELECT produk.id_produk, produk.jumlah, produk.nama_produk, merk.nama_merk, kategori.nama_kategori
    FROM ((produk
    INNER JOIN merk ON produk.id_merk = merk.id_merk)
    INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori) ORDER BY id_produk asc;");
?>
<!-- Konten -->
<div class="container mt-4 mb-4">
    <h1 class="text-center">Form Pembelian</h1>
    <form action="">
        <div class="form-group">
            <label for="pelanggan">Pelanggan</label>
            <select class="form-control" name="pelanggan" id="pelanggan">
                <?php foreach ($query_pelanggan as $key => $row) { ?>
                    <option value="<?php echo $row['id_pelanggan'] ?>"><?php echo $row['nama_pelanggan'] ?></option>
                <?php
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="produk">Produk</label>
            <select name="produk" class="form-control" id="produk">
                <?php
                while ($produk = mysqli_fetch_array($query_produk)) {
                    ?>
                    <option value="<?php echo $produk['id_produk']; ?>"><?php echo $produk['nama_produk']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_beli">Jumlah</label>
            <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli">
        </div>
        <input class="btn btn-lg btn-outline-success" type="submit" value="Beli" name="submit">
        <input class="btn btn-lg btn-secondary" type="reset" value="reset">
    </form>
</div>
<?php include("templates/footer.php"); ?>