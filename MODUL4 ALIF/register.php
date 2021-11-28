<?php
session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Register</title>
    </head>
    <body class="bg-warning bg-opacity-10">

        <!-- Navba -->
        <div class="container-fluid bg-primary bg-opacity-50 sticky-top">
            <div class="container p-2 navbar navbar-collapse" >
                <a class="link-dark" href="index.php" style="text-decoration: none;"><b>EAD Travel</b></a>
                <div>
                    <a class="link-dark me-3" href="register.php" style="text-decoration: none;">Register</a>
                    <a class="link-dark" href="login.php" style="text-decoration: none;">Login</a>
                </div>
            </div> 
        </div>

        <!-- Alert gagal regis -->
        <div class="alert alert-danger alert-dismissible fade show" id="alertgagal">
            Gagal registrasi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            var gagal = document.getElementById('alertgagal');
            gagal.style.display = 'none'
        </script>

        <!-- Form regis -->
        <div class="d-flex container mt-5 justify-content-center">
            <div class="card rounded-1 bg-white" style="width: 24rem;">
                <h3 class="text-center m-3">Register</h3>
                <hr class="ms-2 me-2 mt-0 mb-0">
                <div class="card-body">
                    <form action="" method="post">
                        <label class="mb-2" for="nama">Nama</label><br>
                        <input class="form-control mb-2" type="text" name="nama" id="nama" required placeholder="Masukkan nama lengkap">
                        <label class="mb-2" for="email">Email</label><br>
                        <input class="form-control mb-2" type="text" name="email" id="email" required placeholder="Masukkan alamat E-mail">
                        <label class="mb-2" for="nohp">Nomor Handphone</label><br>
                        <input class="form-control mb-2" type="text" name="nohp" id="nohp" required placeholder="Masukkan Nomor Handphone">
                        <label class="mb-2" for="pass">Kata Sandi</label><br>
                        <input class="form-control mb-2" type="Password" name="pass" id="pass" required placeholder="Kata Sandi Anda">
                        <label class="mb-2" for="repass">Konfirmasi Kata Sandi</label><br>
                        <input class="form-control mb-2" type="Password" name="repass" id="repass" required placeholder="Konfirmasi Kata Sandi Anda">
                        <div class="text-center pt-2 mb-2">
                            <button class="btn btn-primary" type="submit" name="submit" onclick="" style="width: 150px">Daftar</button>
                        </div>
                    </form>
                    <div class="text-center d-flex justify-content-center">
                        <p class="me-1">Anda sudah punya akun?</p>
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-primary bg-opacity-50 text-center fixed-bottom">
            <p class="m-2">
                2021 Copyright
                <a href="">ALIF_1202190187</a>
            </p>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </body>
</html>

<?php
$koneksql = mysqli_connect("localhost:3316", "root", "", "wad_modul4");

if (isset($_POST["submit"])){
    if (($_POST["pass"]) == ($_POST["repass"])){
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $nohp = $_POST["nohp"];
        $pass = mysqli_real_escape_string($koneksql, $_POST["pass"]);
        $query = "INSERT INTO user
        VALUES
        ('', '$nama', '$email', '$pass', '$nohp')
        ";
        mysqli_query($koneksql, $query);
        if (mysqli_affected_rows($koneksql) > 0) {
            $_SESSION["sukses"] = "berhasil";
            echo "
            <script>
                document.location.href = './login.php';
            </script>
            ";
        } else {
            echo "
            <script>
                gagal.style.display = 'block'
            </script>
            ";
        }
    } else {
        echo"
        <script>
                gagal.style.display = 'block'
        </script>
        ";
    }
}
?>
