<?php
    require 'koneksi.php';

    // pastikan user login
    $email = $_SESSION['email'];

    // ambil data user
    $query = "SELECT * FROM pengguna WHERE email = '$email'";
    $result = $koneksi->query($query);
    $data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-3">Edit Profil</h4>
                    <?php if (isset($_SESSION['profile_success'])) { ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['profile_success']; ?>
                        </div>
                        <?php unset($_SESSION['profile_success']); ?>
                    <?php } ?>

                    <?php if (isset($_SESSION['profile_error'])) { ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['profile_error']; ?>
                        </div>
                        <?php unset($_SESSION['profile_error']); ?>
                    <?php } ?>

                    <form method="post" action="proses.php">
                        <!--email-->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?= $data['email']; ?>" readonly>
                        </div>

                        <!--nama-->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap']; ?>" required>
                        </div>

                        <!--password baru-->
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                        </div>

                        <button type="submit" name="update_profile" class="btn btn-primary"> Simpan Perubahan </button>

                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
