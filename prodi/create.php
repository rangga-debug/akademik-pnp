<form method="POST" action="proses.php">
    <div class="container">
        <h3 class="mt-3"> Tambah Data Prodi</h3>
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenjang</label>
            <select class="form-control" name="jenjang" id="jenjang" required>
                <option value="">-- Pilih Jenjang --</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S2">S2</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
        </div>
        <button type="submit" class="btn btn-primary" value="submit_prodi" name="submit_prodi">Submit</button>
        <a  href="index.php" type="button" class="btn btn-outline-secondary">Kembali</a>
    </div>
</form>