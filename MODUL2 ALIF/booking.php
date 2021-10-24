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
];

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
        
        <div class="mt-2 mb-2 container bg-dark">
            <p class="p-1" style="text-align: center; color: white">Reserve your venue now!</p>
        </div>

        <div class="container card shadow-sm">
            <div class="d-flex justify-content-around">
                <div class="col-6 ps-5 pe-5 d-flex align-items-center">
                    <?php
                        if(isset($_GET["img"])){
                            ?><img class="" width="100%" src="<?= $_GET["img"];?>" alt="">
                    <?php
                        }else{
                            ?><img width="100%" src="img/foto0.jpg" alt="">
                    <?php }?>
                </div>
                <div class="col-6 ps-5 pe-5">
                    <ul type="none">
                        <form action="mybooking.php" method="post">
                            <li class="m-1">
                                <label for="nama">Name</label><br>
                                <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $credit?>" readonly>
                            </li>
                            <li class="m-1">
                                <label for="event">Event Date</label><br>
                                <input class="form-control" type="date" name="event" id="event">
                            </li>
                            <li class="m-1">
                                <label for="time">Start Time</label><br>
                                <input class="form-control" type="time" name="time" id="time">
                            </li>
                            <li class="m-1">
                                <label for="jam">Duration (Hours)</label><br>
                                <input class="form-control" type="number" name="jam" id="jam" min="1" value="1">
                            </li>
                            <li class="m-1">
                                <label for="gedung">Building Type</label>
                                    <select class="form-select" name="gedung" id="gedung">
                                        <option selected>Choose...</option>
                                        <?php foreach ($tempat as $tmp):?>
                                            <?php
                                                if($tmp["gdg"]==$_GET["gdg"]){
                                                    ?><option selected="selected" value="<?= $tmp["gdg"];?>"><?= $tmp["gdg"];?></option>
                                            <?php
                                                }else{
                                                    ?><option value="<?= $tmp["gdg"];?>"><?=$tmp["gdg"];?></option>
                                            <?php }?>
                                        <?php endforeach; ?>
                                    </select>
                            </li>
                            <li class="m-1">
                                <label for="pone">Phone Number</label><br>
                                <input class="form-control" type="number" name="pone" id="pone" min="0">
                            </li>
                            <li class="m-1">
                                <label for="service">Add Service</label><br>
                                <input class="form-check-input m-1" type="checkbox" name="ser[]" value="Catering" id="catering"><label class="form-check-label" for="catering">Catering / $700</label><br>
                                <input class="form-check-input m-1" type="checkbox" name="ser[]" value="Decoration" id="decor"><label class="form-check-label" for="decor">Decoration / $450</label><br>
                                <input class="form-check-input m-1" type="checkbox" name="ser[]" value="Sound System" id="sound"><label class="form-check-label" for="sound">Sound System / $250</label><br>
                            </li>
                            <li class="text-center">
                                <button class="btn btn-primary justify-content-around" type="submit">Book</button>
                            </li>
                        </form>
                    </ul>
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
