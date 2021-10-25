<?php
$credit = "Alif_1202190187";

$tempat = [
    [
        "gdg" => "Nusantara Hall",
        "yar" => 2000,
        "cap" => 5000,
        "img" => "img/foto0.jpg"
    ],
    [
        "gdg" => "Garuda Hall",
        "yar" => 1000,
        "cap" => 2000,
        "img" => "img/foto1.jpg"
    ],
    [
        "gdg" => "Gedung Serba Guna",
        "yar" => 500,
        "cap" => 500,
        "img" => "img/foto2.jpg"
    ],
]

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>ESD Venue</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
            
                <div class="collapse navbar-collapse justify-content-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">Booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div>
            <p class="m-2" style="text-align: center; font-size: 25px">WELCOME TO ESD VENUE RESERVATION</p>
        </div>

        <div class="container bg-dark">
            <p class="p-1" style="text-align: center; color: white">Find your best deal for your event, here!</p>
        </div>

        <div class="container">
            <div class="d-flex justify-content-around">
                <div class="col-3 m-1">
                    <div class="card shadow-sm rounded" >
                        <img src="<?php echo $tempat[0]["img"];?>" alt="">
                        <div class="m-3">
                            <p class="m-0" style="font-size: 20px"><?php echo $tempat[]["gdg"];?></p>
                            <p class="m-0" style="color: grey">$<?php echo $tempat[0]["yar"];?> / Hour</p>
                            <p class="m-0" style="color: grey"><?php echo $tempat[0]["cap"];?> Capacity</p>
                        </div>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Free Parking</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Full AC</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Cleaning Service</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Covid-19 Health Protocol</p>
                        <hr class="m-0">
                        <div class="text-center bg-light">
                            <button class="m-2 btn btn-primary" type="submit"><a href="booking.php?img=<?= $tempat[0]["img"];?>&gdg=<?= $tempat[0]["gdg"];?>" style="color: white; text-decoration: none;">Book Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-3 m-1 ms-2 me-2">
                    <div class="card shadow-sm rounded" >
                        <img src="<?php echo $tempat[1]["img"];?>" alt="">
                        <div class="m-3">
                            <p class="m-0" style="font-size: 20px"><?php echo $tempat[1]["gdg"];?></p>
                            <p class="m-0" style="color: grey">$<?php echo $tempat[1]["yar"];?> / Hour</p>
                            <p class="m-0" style="color: grey"><?php echo $tempat[1]["cap"];?> Capacity</p>
                        </div>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Free Parking</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Full AC</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: red;">Cleaning Service</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Covid-19 Health Protocol</p>
                        <hr class="m-0">
                        <div class="text-center bg-light">
                            <button class="m-2 btn btn-primary" type="submit"><a href="booking.php?img=<?= $tempat[1]["img"];?>&gdg=<?= $tempat[1]["gdg"];?>" style="color: white; text-decoration: none;">Book Now</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-3 m-1">
                    <div class="card shadow-sm rounded" >
                        <img src="<?php echo $tempat[2]["img"];?>" alt="">
                        <div class="m-3">
                        <p class="m-0" style="font-size: 20px"><?php echo $tempat[2]["gdg"];?></p>
                            <p class="m-0" style="color: grey">$<?php echo $tempat[2]["yar"];?> / Hour</p>
                            <p class="m-0" style="color: grey"><?php echo $tempat[2]["cap"];?> Capacity</p>
                        </div>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: red;">Free Parking</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: red;">Full AC</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: red;">Cleaning Service</p>
                        <hr class="m-0"><p class="m-2" style="text-align: center; color: green;">Covid-19 Health Protocol</p>
                        <hr class="m-0">
                        <div class="text-center bg-light">
                            <button class="m-2 btn btn-primary" type="submit"><a href="booking.php?img=<?= $tempat[2]["img"];?>&gdg=<?= $tempat[2]["gdg"];?>" style="color: white; text-decoration: none;">Book Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="fixed-bottom text-center pt-3 bg-light">
            <p style="text-align: center; color: lightslategray;">
                Created by: <?php echo $credit;?>
            </p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
