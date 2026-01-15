<?php 
    require 'koneksi.php';

    //insert mahasiswa
    if (isset($_POST['submit_mahasiswa'])) {

        $nim       = $_POST['nim'];
        $nama_mhs  = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat    = $_POST['alamat'];
        $prodi_id  = $_POST['id_prodi']; 

        $query = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id) VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', '$prodi_id')";

        $sql = $koneksi->query($query);

        if ($sql) {
            header('Location: index.php?page=mahasiswa');
            exit;
        } else {
            die("ERROR INSERT: " . $koneksi->error);
        }
    }

    //delete mahasiswa
    if (isset($_GET['nim'])) {
        $query = "DELETE FROM mahasiswa WHERE nim = $_GET[nim]";
        $sql = $koneksi->query($query);
        if ($sql) {
            header("Location: index.php?page=mahasiswa");
        } else {
            echo "Delete data gagal";
        }
    }
    
    //update mahasiswa
    if (isset($_POST['update_mahasiswa'])) {
        $nim       = $_POST['nim'];
        $nama_mhs  = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat    = $_POST['alamat'];
        $prodi_id  = $_POST['prodi_id'];

        $query = "UPDATE mahasiswa SET nama_mhs='$nama_mhs',tgl_lahir='$tgl_lahir',alamat='$alamat',prodi_id='$prodi_id' WHERE nim='$nim'";

        if ($koneksi->query($query)) {
            header('Location: index.php?page=mahasiswa');
            exit;
        } else {
            die("Gagal update: " . $koneksi->error);
        }
    }

    //insert prodi
    if (isset($_POST['submit_prodi'])) {
        $id = $_POST['id'];
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang = $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO prodi (id, nama_prodi, jenjang, keterangan) VALUES ('$id', '$nama_prodi', '$jenjang', '$keterangan')";
        $sql = $koneksi->query($query);

        if ($sql){
            header('Location: index.php?page=prodi');
        } else {
            echo "ID SUDAH ADA!!";
        }
    }

    //delete prodi
    if (isset($_GET['id'])) {
        $query = "DELETE FROM prodi WHERE id = $_GET[id]";
        $sql = $koneksi->query($query);
        if ($sql) {
            header("Location: index.php?page=prodi");
        } else {
            echo "Delete data gagal";
        }
    }
    
    //update prodi
    if (isset($_POST['update_prodi'])) {
        $id = $_POST['id'];
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang = $_POST['jenjang'];
        $keterangan = $_POST['keterangan'];
        $query = "UPDATE prodi SET id='$id', nama_prodi='$nama_prodi', jenjang='$jenjang', keterangan='$keterangan' WHERE id=$id";
        $sql = $koneksi->query($query);

        if($sql){
            header('Location: index.php?page=prodi');
        } else {
            echo "Gagal update data";
        }
    }

    //update profile
    if (isset($_POST['update_profile'])) {

        session_start();
        require 'koneksi.php';

        $email = $_SESSION['email'];
        $nama  = trim($_POST['nama_lengkap']);

        //jika password diisi
        if (!empty($_POST['password_baru'])) {
            $password = md5($_POST['password_baru']); 

            $query = "UPDATE pengguna SET nama_lengkap='$nama', password='$password' WHERE email='$email'";
        } else {
            //jika password tidak diubah
            $query = "UPDATE pengguna SET nama_lengkap='$nama' WHERE email='$email'";
        }

        if ($koneksi->query($query)) {
            $_SESSION['nama_lengkap'] = $nama;
            $_SESSION['profile_success'] = "Profil berhasil diperbarui";
        } else {
            $_SESSION['profile_error'] = "Gagal memperbarui profil";
        }

        header("Location: index.php?page=profile-edit");
        exit;
    }

?>