<?php
$query_pemesanan = mysqli_query($koneksi, "SELECT pemesanan.id_pemesanan, pemesanan.id_pelanggan, pemesanan.jumlah, pemesanan.id_produk, pemesanan.jumlah, pemesanan.status, produk.nama_produk, produk.id_produk, merk.id_merk, merk.nama_merk
FROM ((pemesanan
INNER JOIN produk ON pemesanan.id_produk = produk.id_produk)
INNER JOIN merk ON produk.id_merk = merk.id_merk) ORDER BY id_pemesanan asc;");

?>

<div class=" modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="hapusdata" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <i class="fas fa-exclamation-circle"></i>
                    Data Barang belanja
                </h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <th width="30%">No Pemesanan</th>
                        <th width="30%">Nama Produk</th>
                        <th width="20%">Merk</th>
                        <th width="10%">Jumlah</th>
                        <th width="20%">Status</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($pesan = mysqli_fetch_array($query_pemesanan)) {
                            echo "<tr>";
                            echo "<td>" . $pesan['id_pemesanan'] . "</td>";
                            echo "<td>" . $pesan['nama_produk'] . "</td>";
                            echo "<td>" . $pesan['nama_merk'] . "</td>";
                            echo "<td>" . $pesan['jumlah'] . "</td>";
                            echo "<td>" . $pesan['status'] . "</td>";
                            echo "<tr>";
                        }
                        ?>
                    </tbody>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a href='../../controller/karyawan/hapus_produk.php?id_produk=<?= $row['id_produk']; ?>' class='btn btn-danger'>Hapus</a>
            </div>
        </div>
    </div>
</div>