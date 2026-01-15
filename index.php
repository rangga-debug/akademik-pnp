<?php
    //session | cookies
    session_start();
    //cek login sudah ada atau belum
    if(!isset($_SESSION['login'])){
     header("location: login.php");
    }

?>
<html>
<head>
    <title>SiAk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" data-page="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=mahasiswa" data-page="mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=prodi" data-page="prodi">Program Studi</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#"id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-circle"></i>
                            <?= $_SESSION['nama_lengkap']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="index.php?page=profile-edit">
                                    <i class="fa-solid fa-user-pen me-2"></i> Edit Profil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="login.php" onclick="return confirm('Yakin ingin keluar?')">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            switch ($page) {
                case 'home':
                    include "home.php";
                    break;

                // ===== MAHASISWA =====
                case 'mahasiswa':
                    include "mahasiswa/list.php";
                    break;

                case 'mahasiswa-create':
                    include "mahasiswa/create.php";
                    break;

                case 'mahasiswa-edit':
                    include "mahasiswa/edit.php";
                    break;

                // ===== PRODI =====
                case 'prodi':
                    include "prodi/list.php";
                    break;

                case 'prodi-create':
                    include "prodi/create.php";
                    break;

                case 'prodi-edit':
                    include "prodi/edit.php";
                    break;
                    
                // ===== PROFILE =====
                case 'profile-edit':
                    include "profile/edit.php";
                    break;

                default:
                    echo "<h4>Halaman tidak ditemukan</h4>";
                    break;
            }
        ?>
    </div>
</body>