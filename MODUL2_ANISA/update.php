<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
include 'connect.php'; 
if (isset($_POST['update'])) {
    $id = $_GET['id']; 
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $query = "UPDATE tb_buku SET 
                judul = '$judul', 
                penulis = '$penulis', 
                tahun_terbit = '$tahun_terbit' 
              WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: katalog_buku.php");
        exit();
    } else {
        echo "<script>
                alert('Data gagal diperbarui!');
                window.location.href = 'edit_buku.php?id=$id';
              </script>";
    }
}
?>


