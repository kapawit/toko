<?php
include("controller/pelanggan/cart.php");
?>
<!-- Cart -->
<section>
    <div class=" modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="hapusdata" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>
                        <i class="fa fa-exclamation-circle"></i>
                        Keranjang belanja
                    </h3>
                </div>
                <div class="modal-body">
                    <?php if ($cek > 0) {
                        ?>
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <th width="10%">No Pemesanan</th>
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
                        </table>
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-danger">Belum ada pesanan</div>
                    <?php
                    }
                    ?>
                </div>
                <?php if ($cek > 0) { ?>
                    <div class="modal-footer">
                        <button href='#' class='btn btn-lg btn-info'> Bayar Sekarang</button>
                    </div>
                <?php
                } ?>
            </div>
        </div>
</section> <!-- Cart -->