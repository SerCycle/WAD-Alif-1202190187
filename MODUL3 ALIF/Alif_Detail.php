<?php
$valuename = "Alif_1202190187";

$koneksql = mysqli_connect("localhost:3316", "root", "", "modul3");
$judul = $_GET["judul"];
$query = "SELECT * FROM buku_table WHERE judul_buku ='$judul'";

$conquery = mysqli_query($koneksql, $query);
$sort = mysqli_fetch_assoc($conquery);
$idbook = $sort['id_buku'];
$tag = $sort['tag'];
$valuetag = explode(',',$tag);

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Detail</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid justify-content-between">
                <a href="index.php"><img class="navbar-brand" src="img/logo-ead.png" alt="LogoEAD" style="height: 50px;"></a>
                <a href="Alif_Tambah.php" class="btn btn-primary">Tambah Buku</a>
            </div>
        </nav>

        <div class="mt-5 container rounded-1 shadow">
            <p class="pt-3 pb-3 text-center" style="font-size:30px"><b>Detail Buku</b></p>
            <div class="d-flex justify-content-around">
                <img class="shadow" src="asset/<?= $sort['gambar']?>" alt="foto buku" width="50%">
            </div>
            <div class="p-5">
                <p><b>Judul :</b></p>
                <p><?= $sort['judul_buku']?></p>
                <p><b>Penulis :</b></p>
                <p><?= $sort['penulis_buku']?></p>
                <p><b>Tahun Terbit :</b></p>
                <p><?= $sort['tahun_terbit']?></p>
                <p><b>Deskripsi :</b></p>
                <p><?= $sort['deskripsi']?></p>
                <p><b>Bahasa :</b></p>
                <p><?= $sort['bahasa']?></p>
                <p><b>Tag :</b></p>
                <p><?= $sort['tag']?></p>
                <div class="d-flex justify-content-around">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalubah" style="width: 300px">Sunting</button>
                    <a href="Alif_Delete.php?judul=<?= $sort['judul_buku']?>" class="btn btn-danger" style="width: 300px">Hapus</a>
                </div>
            </div>
        </div>
        
        <div class="text-center container-fluid bg-light justify-content-center">
            <img class="mt-2 mx-auto d-block" src="img/logo-ead.png" alt="logo ead" style="height: 50px">
            <p class="mt-1 mb-1" style="font-size: 20px"><b>Perpustakaan EAD</b></p>
            <p><?= $valuename?></p>
        </div>

        <!-- show modal -->
        <div class="modal fade" id="modalubah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="suntingtitle">Sunting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <ul type="none">
                                <div class="p-3">
                                    <li class="mb-2">
                                        <label class="mb-1" for="judul"><b>Judul Buku</b></label><br>
                                        <input class="form-control" type="text" name="judul" id="judul" placeholder="Contoh: Pemrograman Web Bersama EAD" value="<?= $sort['judul_buku']?>">
                                    </li>
                                    <li class="mb-2">
                                        <label class="mb-1" for="penulis"><b>Penulis</b></label>
                                        <input class="form-control" type="text" name="penulis" id="penulis" value="<?= $valuename?>" readonly>
                                    </li>
                                    <li class="mb-2">
                                        <label class="mb-1" for="tahun"><b>Tahun Terbit</b></label>
                                        <input class="form-control" type="text" name="tahun" id="tahun" placeholder="Contoh: 1990" value="<?= $sort['tahun_terbit']?>">
                                    </li>
                                    <li class="mb-2">
                                        <label class="mb-1" for="desc"><b>Deskripsi</b></label>
                                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="5" placeholder="Contoh: Buku ini menjelaskan tentang.."><?= $sort['deskripsi']?></textarea>
                                    </li>
                                    <li class="mb-2">
                                        <label class="mb-1 me-2" for="bahasa"><b>Bahasa</b></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa" value="Indonesia"
                                            <?php if ($sort['bahasa'] == 'Indonesia'){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Indonesia">Indonesia</label>
                                        </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bahasa[]" id="bahasa" value="Lainnya"
                                            <?php if ($sort['bahasa'] == 'Lainnya'){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Lainnya">Lainnya</label>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <label class="mb-1 me-2" for="tag"><b>Tag</b></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="Pemrograman" value="Pemrograman"
                                            <?php if (in_array('Pemrograman', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Pemrograman">Pemrograman</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="Website" value="Website"
                                            <?php if (in_array('Website', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Website">Website</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="Java" value="Java"
                                            <?php if (in_array('Java', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Java">Java</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="OOP" value="OOP"
                                            <?php if (in_array('OOP', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="OOP">OOP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="MVC" value="MVC"
                                            <?php if (in_array('MVC', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="MVC">MVC</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="Kalkulus" value="Kalkulus"
                                            <?php if (in_array('Kalkulus', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Kalkulus">Kalkulus</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="tag[]" id="Lainnya" value="Lainnya"
                                            <?php if (in_array('Lainnya', $valuetag)){echo "checked";}?>
                                            >
                                            <label class="form-check-label" for="Lainnya">Lainnya</label>
                                        </div>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

<?php

if (isset($_POST["submit"])){
    $newjudul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahun = $_POST["tahun"];
    $desc = $_POST["desc"];
    $bahasa = implode(",", $_POST["bahasa"]);
    $tag = implode(",", $_POST["tag"]);
    $query = "UPDATE buku_table SET
        judul_buku = '$newjudul',
        tahun_terbit = $tahun,
        deskripsi = '$desc',
        tag = '$tag',
        bahasa = '$bahasa'
        WHERE id_buku = $idbook
    ";
    mysqli_query($koneksql, $query);
    
    if (mysqli_affected_rows($koneksql) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = './index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data tidak ada yang diubah');
            document.location.href = './index.php';
        </script>";
    }
}
?>
