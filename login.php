<?php
session_start();
require 'koneksi.php';

// ambil error dari session (jika ada)
$error = null;
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $query = "SELECT * FROM pengguna WHERE email='$email' AND password='$pass'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // login berhasil   
        $data = $result->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

        header("Location: index.php");
        exit;
    } else {
        // login gagal → simpan ke session
        $_SESSION['login_error'] = "Email atau password salah!";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SiAk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger bg-gradient">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4 fw-semibold">Login SiAk</h3>
                        <!-- ALERT ERROR -->
                        <?php if ($error) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php } ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="••••••••" required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-lg w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
