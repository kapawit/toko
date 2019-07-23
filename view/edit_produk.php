<?php
if (isset($_SESSION['status'])) {
    include("templates/header.php");
    include("templates/navbar_user.php");
    include("templates/navbar_index.php");
    include("feedback/feedback.php");
    $id_produk = $_GET['id_produk'];
    include("../database/koneksi.php");
    $query_produk = mysqli_query($koneksi, "SELECT id_produk, warna, jumlah, nama_produk, id_merk, id_kategori FROM produk where id_produk=$id_produk");
    $produk = mysqli_fetch_assoc($query_produk);
    $query_merk = mysqli_query($koneksi, "SELECT * from merk");
    $query_kategori = mysqli_query($koneksi, "SELECT * from kategori");
    ?>
    <!-- Konten -->
    <div class="container mt-4 mb-4">
        <h3 class="text-center">Edit Produk</h3>
        <form action="../controller/update_produk.php" method="post">
            <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">
            <div class="form-group">
                <label for="nama_produk">Nama produk</label>
                <input type="text" value="<?= $produk['nama_produk']; ?>" class="form-control" name="nama_produk" id="nama_produk">
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" value="<?= $produk['warna']; ?>" name="warna" id="warna">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" value="<?= $produk['jumlah']; ?>" name="jumlah" id="jumlah">
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <select class="form-control" name="merk" id="merk">
                    <?php foreach ($query_merk as $key => $row) { ?>
                        <option value="<?php echo $row['id_merk'] ?>" <?php
                                                                        if ($row['id_merk'] == $produk['id_merk']) {
                                                                            echo 'selected';
                                                                        } ?>><?php echo $row['nama_merk'] ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="merk">Kategori</label>
                <select class="form-control" name="kategori" id="kategori">
                    <?php foreach ($query_kategori as $key => $row) { ?>
                        <option value="<?php echo $row['id_kategori'] ?>" <?php if ($row['id_kategori'] == $produk['id_kategori']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $row['nama_kategori'] ?></option>

                    <?php
                    } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
            <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
        </form>
    </div>
    <?php include("templates/footer.php"); ?>
<?php
} else {
    header('location:../view/login.php?pesan=belum_login');
}
?>