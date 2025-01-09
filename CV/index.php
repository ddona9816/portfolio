<?php
// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "cvdwifajar"; // Nama database
// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);
// ?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Add this link to the CSS file or add the styles to the <style> tag -->
<style>
    /* Navbar Styling */
    /* .navbar {
        background-color: #333;
        padding: 15px 30px;
    }

    .navbar .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: #fff;
    }

    .navbar .navbar-nav .nav-link {
        color: #ddd;
        font-size: 1rem;
        padding: 10px 15px;
    }

    .navbar .navbar-nav .nav-link:hover {
        background-color: #555;
        color: #fff;
    }

    .navbar-toggler {
        border: none;
        background-color: #444;
    }

    .navbar-toggler-icon {
        background-color: #fff;
    }

    .hire-btn {
        background-color: #28a745;
        color: #fff;
        font-weight: bold;
        padding: 8px 15px;
        border-radius: 30px;
        border: none;
        transition: background-color 0.3s;
    }

    .hire-btn:hover {
        background-color: #218838;
    }

    footer {
        background-color: #f8f9fa;
        padding: 40px 0;
    }

    footer h1 {
        font-size: 2rem;
        color: #333;
        font-weight: bold;
    }

    .address {
        font-size: 1rem;
        color: #666;
    }

    .address span {
        display: block;
        margin: 5px 0;
    }

    footer .row span {
        color: #888;
        font-size: 0.9rem;
    }

    footer .row span:hover {
        color: #333;
        text-decoration: underline;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .navbar .navbar-brand {
            font-size: 1.2rem;
        }

        .navbar .navbar-nav .nav-link {
            font-size: 0.9rem;
        }

        footer h1 {
            font-size: 1.5rem;
        }

        footer .row span {
            font-size: 0.8rem;
        }
    } */
     /* Styling untuk keseluruhan halaman */
    body {
        font-family: 'Arial', sans-serif;
        /* background-color: #f4f4f4; */
        /* color: #333; */
    }

    .hover-overlay:hover {
        background-color: hsla(0, 0%, 98%, 0.35);
    }

    /* Section Edukasi */
    .education-section {
        background-color: #fff;
        padding: 40px 20px;
    }

    .education-section h1 {
        font-size: 36px;
        color: #333;
    }

    .education-section p {
        font-size: 18px;
        color: #555;
    }

    .education-section .table {
        border-collapse: collapse;
        width: 100%;
    }

    .education-section .table th, .education-section .table td {
        padding: 12px;
        text-align: left;
    }

    /* .education-section .table-dark {
        background-color: #2c3e50;
        color: #fff;
    } */

    /* .education-section .table th {
        background-color: #34495e;
    } */

    /* .education-section .table tr:nth-child(even) {
        background-color: #ecf0f1;
    }

    .education-section .table tr:hover {
        background-color: #bdc3c7;
    }

    .education-section .table td {
        color: #333;
    }

    .education-section .table td.text-light {
        color: #ccc;
    } */

    /* Section Projects */
    .project-section {
        background-color: #fff;
        padding: 40px 20px;
    }

    .project-section h1 {
        font-size: 36px;
        color: #333;
    }

    .project-section .card {
        margin-bottom: 30px;
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .project-section .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .project-section .card-body {
        padding: 15px;
        height: 50%;
        background-color: #f8f9fa;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .project-section .card-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .project-section .card-text {
        font-size: 14px;
        color: #777;
        height: 3rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .project-section .btn {
        background-color: #2980b9;
        color: #fff;
        border-radius: 5px;
        padding: 8px 15px;
        text-decoration: none;
    }

    .project-section .btn:hover {
        background-color: #3498db;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .project-section .row {
            flex-direction: column;
        }

        .project-section .col-md-4 {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .education-section h1 {
            font-size: 30px;
        }

        .education-section p {
            font-size: 16px;
        }

        .education-section .table th,
        .education-section .table td {
            padding: 8px;
        }
    }

    .contacts i {
        font-size: 24px;
        color:white;
        margin: 0 calc(1rem - 10px);
    }

</style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container">
            <a class="navbar-brand text-tertiary" href="">2203010083 DWI FAJAR SARI ROMA DONA C</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link hover-overlay" href=""><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link hover-overlay" href="#education-section"><b>EDUCATION</b></a></li>
                    <li class="nav-item"><a class="nav-link hover-overlay" href="#project-section"><b>PROJECT</b></a></li>
                    <li class="nav-item"><a class="nav-link hover-overlay" href="#contact"><b>CONTACT</b></a></li>
                    <li class="nav-item">
                        <button class="btn hire-btn"><b>Hire me</b></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Hero Text -->
                <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 hero-content">
                    <h1><span>I’m</span> <br>
                        <?= $row['nama'] ?>
                    </h1>
                    <!-- Tampilkan Deskripsi -->
                    <p class="my-3">
                        <?= $row['deskripsi'] ?>
                    </p>
                    <a href="https://drive.google.com/uc?export=download&id=1jPZ2PBT_nZ2X2xGsYW6FaPvpL02yTuCk" class="btn btn-custom">Download CV</a>
                </div>
                <!-- Hero Image -->
                <div class="col-md-6 text-center hero-image">
                    <img src="../backend/assets/users/images/<?= $row['foto'] ?>" alt="Foto" width="100">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </section>
    <section class="education-section mt-3 text-secondary" id="education-section">
        <h1 class="text-center">Education</h1>
        <!-- keterangan boleh diubah -->
        <p class="text-center">Daftar Pendidikan Saya</p>
        <div class="container-fluid">
            <table class="table table-light table-hover">
                <thead>
                    <tr class=" text-secondary"> 
                        <th class=" text-secondary">No</th>
                        <th class=" text-secondary">Pendidikan</th>
                        <th class=" text-secondary">Tahun</th>
                        <th class=" text-secondary">Nama Sekolah / Kampus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require 'functions.php'; ?>
                    <?php $educations = get_educations(); ?>
                    <?php $no=1; ?>
                    <?php if(count($educations)>0): ?>
                        <?php foreach($educations as $education): ?>
                            <tr class="">
                                <th class=" text-secondary"><?= $no++; ?></th>
                                <td class=" text-secondary"><?= $education["pendidikan"]; ?></td>
                                <td class=" text-secondary"><?= $education["tahun"]; ?></td>
                                <td class=" text-secondary"><?= $education["nama_kampus"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-secondary">Tidak ada data pendidikan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="project-section mt-3" id="project-section">
        <div class="container">
            <h1 class="text-center">Projects</h1>
            <div class="row mt-3">
                <?php $projects = get_projects(); ?>
                <?php foreach($projects as $project): ?>
                    
                    <div class="col-md-4">
                        <div class="card text-dark" style="width: 18rem; height: 350px; overflow: hidden;">
                            <img src="../backend/assets/projects/images/<?=$project['gambar_project']; ?>" class="card-img-top" alt="..." style="object-fit: cover; height: 50%;">
                            <div class="card-body" style="height: 50%; overflow: hidden;">
                                <h5 class="card-title"><?= $project["nama_project"]; ?></h5>
                                <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= $project["deskripsi_project"]; ?></p>
                                <a href="#" class="text-secondary"><?= $project["link_project"]; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <footer class="mt-5" id="contact">
        <div class="container-fluid bg-secondary text-tertiary pt-3">
            <div class="d-flex flex-row justify-content-center">
                <div class="col-md-4 text-center flex-wrap">
                    <h1>Contact</h1>
                    <div class="contacts">
                        <a href="https://www.instagram.com/dfsrdonna_?igsh=MXZtdzBnb3RpNTlicw%3D%3D&utm_source=qr"><i class="bi bi-instagram"></i></a>
                        <a href="mailto:dwifajarsari532@gmail.com"><i class="bi bi-envelope-fill"></i></a>
                        <a href="tel:085832134674"><i class="bi bi-telephone-inbound"></i></a>
                    </div>
                    <div class="address">
                        Address: Jl air tanjung, Tasikmalaya Jawa Barat, Indonesia
                    </div>
                </div>
            </div>
            <div class="row mt-5 pb-3">
                <div class="col-md-12 d-flex flex-row justify-content-evenly">
                    <span>&copy; 2025 muhamad_taufikakbar.ct.ws</span><span> </span> <span>All rights reserved</span><span> </span><span>Privacy Policy</span>
                </div>
            </div>

        </div>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

