<table class="table table-hover table-bordered my-2">
    <h2 >List Mahasiswa</h2>
    <a class="btn btn-primary" href="index.php?page=mahasiswa-create" role="button">ISI DATA KAMU DISINI!</a>
    <thead>
        <tr class="table-primary text text-center">
            <th scope="col" >NO</th>
            <th scope="col" >NIM</th>
            <th scope="col" >NAMA LENGKAP</th>
            <th scope="col" >TANGGAL LAHIR</th>
            <th scope="col" >PROGRAM STUDI</th>
            <th scope="col" >ALAMAT</th>
            <th scope="col" >AKSI</th>
        </tr>
    </thead>
    <?php
        require "koneksi.php";
        $tampil = $koneksi->query("SELECT mahasiswa.*, prodi.nama_prodi, prodi.jenjang FROM mahasiswa JOIN prodi ON mahasiswa.prodi_id = prodi.id");
        $i =1;
        while ($data = mysqli_fetch_assoc($tampil)) {
        ?>
        <tr>
            <td class="text text-center"><?= $i++?></td>
            <td><?= $data['nim'];?></td>
            <td><?= $data['nama_mhs'];?></td>
            <td class="text text-center"><?= $data['tgl_lahir'];?></td>
            <td><?= $data['nama_prodi'];?>(<?= $data['jenjang']; ?>)</td>
            <td><?= $data['alamat'];?></td>
            <td class='text-center'>
                <a class='btn btn-warning' href='index.php?nim=<?= $data['nim']?>&page=mahasiswa-edit'>Edit</a>
                |
                <a class='btn btn-danger' href='proses.php?nim=<?php echo $data['nim']?>'>Hapus</a>
            </td>
        </tr>
        <?php
        }
    ?>
</table>