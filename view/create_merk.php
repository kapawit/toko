<?php include("templates/header.php"); ?>
<!-- Konten -->
<div class="container mt-4 mb-4">
    <?php include("feedback/feedback.php"); ?>
    <h3 class="text-center">Tambah Merk</h3>
    <form action="../controller/merk.php" method="post">
        <div class="form-group">
            <label for="nama_merk">Merk</label>
            <input type="text" class="form-control" name="nama_merk" id="nama_merk">
        </div>
        <input type="submit" class="btn btn-primary" value="submit" name="submit">
        <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />

    </form>
</div>
<?php include("templates/footer.php"); ?>