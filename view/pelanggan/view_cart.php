<!-- Cart -->
<section>
    <div class=" modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="hapusdata" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <?php if ($cek > 0) {
                ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>
                            <i class="fa fa-shopping-cart"></i>
                            Keranjang belanja
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table" width="100%">
                            <thead>
                                <th width="10%">No Pemesanan</th>
                                <th width="30%">Nama Produk</th>
                                <th width="20%">Merk</th>
                                <th width="10%">Jumlah</th>
                                <th width="20%">Status</th>
                                <th width="20%">Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query_pemesanan as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id_pemesanan']; ?></td>
                                        <td><?= $row['nama_produk']; ?></td>
                                        <td><?= $row['nama_merk']; ?></td>
                                        <td><?= $row['jumlah']; ?></td>
                                        <td><?= $row['status']; ?></td>
                                        <td>
                                            <a href='controller/pelanggan/hapus_cart.php?id_pemesanan=<?= $row['id_pemesanan']; ?>' class='btn btn-danger'><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button href='#' class='btn btn-lg btn-info'> Bayar Sekarang</button>
                    </div>
                </div>
            <?php
            } else {
                ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>
                            <i class="fa fa-shopping-cart"></i>
                            Keranjang belanja
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center px-4 py-4">
                        <div class="row">
                            <div class="col-md-6"> -->
                                <img src="assets/img/cart.png" width="70%">
                            </div>
                            <div class="col-md-6 pt-5">
                                <h3>Whooops!</h3>
                                <h4>Keranjang belanja kamu kosong</h4>
                                <a class="btn btn-success text-white mt-4" href="index.php">Belanja Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
</section> <!-- Cart -->