<?php include("templates/header.php"); ?>

<!-- Konten -->
<div class="container mt-4 mb-4">
    <?php include("feedback/feedback.php"); ?>
    <h3 class="text-center">Tambah Produk</h3>
    <form action="../controller/produk.php" method="post">
        <div class="form-group">
            <label for="nama_produk">Nama produk</label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control" name="warna" id="warna">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" name="harga" id="harga">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" class="form-control" name="jumlah" id="jumlah">
        </div>
        <div class="form-group">
            <label for="merk">Merk</label>
            <select class="form-control" name="merk" id="merk">
                <option value="" disabled selected>--- Pilih Merk ---</option>
                <?php foreach ($query_merk as $key => $row) { ?>
                    <option value="<?php echo $row['id_merk'] ?>"><?php echo $row['nama_merk'] ?></option>
                <?php
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="merk">Kategori</label>
            <select class="form-control" name="kategori" id="kategori">
                <option value="" disabled selected>--- Pilih Kategori ---</option>
                <?php foreach ($query_kategori as $key => $row) { ?>
                    <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
                <?php
                } ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="submit" name="submit">
        <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
    </form>
</div>
<?php include("templates/footer.php"); ?>