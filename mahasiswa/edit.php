<?php 
    require 'koneksi.php';
    $nim = $_GET['nim'];
    $tampil = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = $nim");
    $prodi = $koneksi->query("SELECT * FROM prodi");
    $data = mysqli_fetch_assoc($tampil);
?>
<form method="POST" action="proses.php">
    <input type="hidden" name="nim" value="<?= $data['nim']; ?>">
    <div class="container">
        <h3 class="mt-3">Edit Data Mahasiswa</h3>
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="<?php echo $data['nama_mhs'];?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data['tgl_lahir'];?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select name="prodi_id" class="form-control" required>
                <option value="">-- Pilih Program Studi --</option>
                <?php while ($row = mysqli_fetch_assoc($prodi)) { ?>
                    <option value="<?= $row['id']; ?>"
                        <?= ($row['id'] == $data['prodi_id']) ? 'selected' : ''; ?>>
                        <?= $row['nama_prodi']; ?> (<?= $row['jenjang']; ?>)
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="5"><?php echo $data['alamat'];?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" value="update_mahasiswa" name="update_mahasiswa">Simpan</button>
        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </div>
</form>