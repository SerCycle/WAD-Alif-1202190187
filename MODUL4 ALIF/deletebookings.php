<?php
session_start();
$koneksql = mysqli_connect("localhost", "root", "", "wad_modul4");
$id = $_GET["id"];

$query = "DELETE FROM booking WHERE id = '$id'";

mysqli_query($koneksql, $query);

if (mysqli_affected_rows($koneksql) > 0){
    $_SESSION["terhapus"] = true;
    header("Location: bookings.php");
}

?>