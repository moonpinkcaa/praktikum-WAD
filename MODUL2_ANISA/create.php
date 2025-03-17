<?php
include 'connect.php';

// ==================1==================
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel-variabel untuk menyimpan data yang dikirim dari POST
if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    
    
    // ==================2==================
    // Definisikan $query untuk melakukan koneksi ke database
    $query = "INSERT INTO tb_buku (judul, penulis, tahun_terbit) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $judul, $penulis, $tahun_terbit);
    // ==================3==================
    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: katalog_buku.php");
        exit;
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }

 
    mysqli_stmt_close($stmt);
}


mysqli_close($conn);
?>


