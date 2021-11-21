<?php
$koneksql = mysqli_connect("localhost:3316", "root", "", "modul3");
$judul = $_GET["judul"];

$query = "DELETE FROM buku_table WHERE judul_buku = '$judul'";

mysqli_query($koneksql, $query);

echo "
    <script>
        alert('Data telah dihapus');
        document.location.href = './index.php';
    </script>";

?>