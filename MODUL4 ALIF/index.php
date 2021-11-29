<?php
session_start();
if(isset($_COOKIE["id"])){ // jika login menggunakan cookie
    $_SESSION["login"] = true;
    $id = $_COOKIE["id"];
    $koneksql = mysqli_connect("localhost:3316", "root", "", "wad_modul4");
    $qakun = "SELECT * FROM user WHERE id ='$id'";
    $getakun = mysqli_query($koneksql, $qakun);
    $sort = mysqli_fetch_assoc($getakun);
    $nama = $sort["nama"];
}elseif(isset($_SESSION["sementara"])){ // jika login biasa
    $id = $_SESSION["sementara"];
    $koneksql = mysqli_connect("localhost:3316", "root", "", "wad_modul4");
    $qakun = "SELECT * FROM user WHERE id ='$id'";
    $getakun = mysqli_query($koneksql, $qakun);
    $sort = mysqli_fetch_assoc($getakun);
    $nama = $sort["nama"];
};
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>EAD Travel</title>
    </head>
    <body class="bg-warning bg-opacity-10">

        <!-- navbar -->
        <div class="container-fluid bg-primary bg-opacity-50 sticky-top">
            <div class="container p-2 navbar navbar-collapse" >
                <a class="link-dark" href="index.php" style="text-decoration: none;"><b>EAD Travel</b></a>
                
                <?php
                    // jika sudah login
                    if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                        <div class="d-flex align-items-center">
                            <a href="bookings.php"><img src="img/cart.png" alt="cart" height="20px"></a>
                            <div type="none" class="m-0">
                                <div class="nav-item dropdown">
                                    <a class="nav-link link-dark dropdown-toggle" href="#" id="datadrop" data-bs-toggle="dropdown" aria-expanded="false"><?= $nama?></a>
                                    <ul class="dropdown-menu" aria-labelledby="datadrop">
                                        <li><a class="dropdown-item" href="profile.php?id=<?= $id;?>">Pengaturan Profile</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    
                    // jika belum login
                    else { ?>
                        <div>
                            <a class="link-dark me-3" href="register.php" style="text-decoration: none;">Register</a>
                            <a class="link-dark" href="login.php" style="text-decoration: none;">Login</a>
                        </div>
                <?php }
                ?>

            </div> 
        </div>
        
        <!-- alert berhasil login -->
        <div class="alert alert-success alert-dismissible fade show" id="alertberhasil">
            Berhasil Login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert -->
        <script>
            var berhasil = document.getElementById('alertberhasil');
            berhasil.style.display = 'none'
        </script>
        
        <!-- php display alert -->
        <?php
        if ( isset($_SESSION["newlogin"])){
            echo "
            <script>
                berhasil.style.display = 'block'
            </script>
            ";
            unset($_SESSION["newlogin"]);
        } else{
            echo "
            <script>
                berhasil.style.display = 'none'
            </script>
            ";
        }
        ?>

        <!-- alert berhasil pesan tiket -->
        <div class="alert alert-success alert-dismissible fade show" id="alertpesantiket">
            Berhasil memesan tiket
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!-- script hide alert  tiket-->
        <script>
            var hasiltiket = document.getElementById('alertpesantiket');
            hasiltiket.style.display = 'none'
        </script>
        
        <!-- Banner -->
        <div class="container p-xl-4 mt-2 mb-2 text-center bg-success bg-opacity-25">
            <h1>
                <b>EAD Travel</b>
            </h1>
        </div>

        <!-- Card wisata -->
        <div class="container d-flex justify-content-around">
            <!-- Raja Ampat -->
            <div class="card" style="width: 22rem;">
                <img src="img/diving-in-raja-ampat-islands-papua-indonesia.jpg" class="card-img-top" alt="raja ampat">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Raja Ampat, Papua</h5>
                    <p class="card-text">Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.</p>
                    <h5 class="card-text">Rp. 7.000.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal1" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Malang -->
            <div class="card" style="width: 22rem;">
                <img src="img/Jig4Q0E.jpg" class="card-img-top" alt="bromo">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Gunung Bromo, Malang</h5>
                    <p class="card-text">Gunung Bromo atau dalam bahasa Tengger dieja "Brama", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.</p>
                    <h5 class="card-text">Rp. 2.000.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal2" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Bali -->
            <div class="card" style="width: 22rem;">
                <img src="img/312YAsd.jpg" class="card-img-top" alt="bali">
                <div class="card-body d-grid align-items-center">
                    <h5 class="card-title">Tanah Lot, Bali</h5>
                    <p class="card-text">Pura Tanah Lot adalah salah satu Pura yang sangat disucikan di Bali, Indonesia. Di sini ada dua pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini merupakan bagian dari pura Dang Kahyangan.</p>
                    <h5 class="card-text">Rp. 5.000.000</h5>
                    <div class="text-center">
                        <?php
                            // jika sudah login
                            if(isset($_SESSION["login"]) or isset($_SESSION["sementara"])){ ?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tarikjadwal3" style="width: 300px">Pesan Tiket</button>
                        <?php
                            }
                            
                            // jika belum login
                            else { ?>
                                <a href="login.php" class="btn btn-primary" style="width: 300px">Pesan Tiket</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Papua -->
        <div class="modal fade" id="tarikjadwal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal1" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Malang -->
        <div class="modal fade" id="tarikjadwal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal2" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Bali -->
        <div class="modal fade" id="tarikjadwal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggal Perjalanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <input class="form-control" type="date" name="tanggal" id="tanggal">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitjadwal3" class="btn btn-primary">tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <!-- php buat udah login atau belum -->
                <?php
                    if(isset($_COOKIE["id"]) or isset($_SESSION["sementara"])){ ?>
                    <a href="#createdby" data-bs-toggle="modal">ALIF_1202190187</a>
                <?php
                    }else{ ?>
                    <a href="#">ALIF_1202190187</a>
                <?php
                    }
                ?>
                
            </p>
        </div>

        <!-- modal Footer -->
        <div class="modal fade" id="createdby" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createdbysaha" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createdbysaha">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>NAMA</td>
                            <td>&nbsp:&nbsp</td>
                            <td>ALIF YANUAR ADITYA SUBAGYO</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>&nbsp:&nbsp</td>
                            <td>1202190187</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>

<?php
if (isset($_POST["submitjadwal1"])):
    $tanggal = $_POST["tanggal"];
    $harga = 7000000;
    $tempat = "Raja Ampat";
    $lokasi = "Papua";
elseif (isset($_POST["submitjadwal2"])):
    $tanggal = $_POST["tanggal"];
    $harga = 2000000;
    $tempat = "Gunung Bromo";
    $lokasi = "Malang";
elseif (isset($_POST["submitjadwal3"])):
    $tanggal = $_POST["tanggal"];
    $harga = 5000000;
    $tempat = "Tanah Lot";
    $lokasi = "Bali";
endif;

$bookingquery = "INSERT INTO booking VALUES ('', '$id', '$tempat', '$lokasi', $harga, '$tanggal')";
mysqli_query($koneksql, $bookingquery);

if (mysqli_affected_rows($koneksql) > 0){
    echo"
    <script>
            hasiltiket.style.display = 'block'
    </script>
    ";
}
?>