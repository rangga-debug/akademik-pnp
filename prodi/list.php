<table class="table table-hover table-bordered my-2">
    <h2 >List Prodi</h2>
    <a class="btn btn-primary" href="index.php?page=prodi-create" role="button">ISI DATA KAMU DISINI!</a>
    <thead>
        <tr class="table-primary text text-center">
            <th scope="col" >NO</th>
            <th scope="col" >KODE PRODI</th>
            <th scope="col" >NAMA PRODI</th>
            <th scope="col" >JENJANG</th>
            <th scope="col" >KETERANGAN</th>
            <th scope="col" >AKSI</th>
        </tr>
    </thead>
    <?php
        require "koneksi.php";
        $tampil = $koneksi->query("SELECT * FROM prodi");
        $i =1;
        while ($data = mysqli_fetch_assoc($tampil)) {
        ?>
        <tr>
            <td class="text text-center"><?= $i++?></td>
            <td><?= $data['id'];?></td>
            <td><?= $data['nama_prodi'];?></td>
            <td><?= $data['jenjang'];?></td>
            <td><?= $data['keterangan'];?></td>
            <td class='text-center'>
                <a class='btn btn-warning' href='index.php?id=<?= $data['id']?>&page=prodi-edit'>Edit</a>
                |
                <a class='btn btn-danger' href='proses.php?id=<?php echo $data['id']?>'>Hapus</a>
            </td>
        </tr>
        <?php
        }
    ?>
</table>