<?php 
    require 'koneksi.php';
    $id = $_GET['id'];
    $tampil = $koneksi->query("SELECT * FROM prodi WHERE id = $id");
    $data = mysqli_fetch_assoc($tampil);
?>
<form method="POST" action="proses.php">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="container">
        <h3 class="mt-3">Edit Data Prodi</h3>
        <div class="mb-3">
            <label class="form-label">Kode Prodi</label>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo $data['id'];?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" value="<?php echo $data['nama_prodi'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenjang</label>
            <select class="form-control" name="jenjang" required>
                <option value="D2" <?= ($data['jenjang']=='D2')?'selected':''; ?>>D2</option>
                <option value="D3" <?= ($data['jenjang']=='D3')?'selected':''; ?>>D3</option>
                <option value="D4" <?= ($data['jenjang']=='D4')?'selected':''; ?>>D4</option>
                <option value="S2" <?= ($data['jenjang']=='S2')?'selected':''; ?>>S2</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['keterangan'];?>">
        </div>

        <button type="submit" class="btn btn-primary" value="update_prodi" name="update_prodi">Simpan</button>
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </div>
</form>