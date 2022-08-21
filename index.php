<?php
    require 'koneksi.php';
    require 'functions.php';


   session_start();
    //    var_dump($_SESSION["login"]);
   
    if ( !isset($_SESSION["login"]) ){
        $_SESSION["login"] = false;
    }

    if(isset($_POST["login"])){
        header("Location: login.php");
    }

    if(isset($_POST["logout"])){
        $_SESSION["login"] = false;
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/style.css">
    <title> Beranda </title>

</head>
<body class="">

    <div class="container first" id="">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid menu">
                <a class="navbar-brand" href="#">
                    Hello
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color: #130d0d;"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab"  href="#about"> Tentang </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contact" >
                                Kontak
                            </a>
                        </li>
                        <?php if ($_SESSION["login"]) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Project
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                    <li><a class="dropdown-item" href="project/">To Do List</a></li>
                                    <li><a class="dropdown-item" href="project2/"> Warung </a></li>
                                    <li><a class="dropdown-item" href="project3/"> CekHarga </a></li>
                                    <!-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                                </ul>
                            </li>
                        <?php } ?>
                            <?php if ($_SESSION["login"]) { ?>
                                <form action="" method="post">
                                    <li class="nav-item-last">
                                        <button class="btn btn-log" name="logout">
                                            Logout
                                        </button>
                                    </li>
                                </form>
                            <?php } else if (!$_SESSION["login"]){ ?>
                                <form action="" method="post">
                                    <li class="nav-item-last">
                                        <button class="btn btn-log" name="login">
                                            Login
                                        </button>
                                    </li>
                                </form>

                            <?php }?>
                        
                    </ul>
                    <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </nav>
        <div class="text-center content">
            <h1 class="welcome">
                مَنْ جَدَّ وَجَدَ
            </h1>
            <p class="quote">
                "Hatiku tenang karena mengetahui bahwa <br> apa yang melewatkanku tidak akan pernah menjadi takdirku, <br> dan apa yang ditakdirkan untukku tidak akan pernah melewatkanku"
            </p>
            <h5 class="umar"> - Umar bin Khattab </h5>
        </div>
        
    </div>

    <div class="container second tab-pane">
        <div class="row text-center" id="about">
            <div class="col-lg-12 col-md-5">
                <img src="img/2me.jpeg" alt="" class="myfoto img-thumbnail">
            </div>
            <div class="col-lg-12 col-md-6 text-light">
                <h2 class="myname"> Muhammad Ridhwan </h2>
                <h4 class="myjob"> Student | Back End Developer </h4>
                <p class="myadd"> Banjarmasin, Kalimantan Selatan </p>
                <p class="myquote"> "Sungguh, jangan habiskan waktumu untuk membuktikan indahnya purnama, <br> kepada mereka yang hanya mencintai senja." </p>
                <h6 class="who text-dark"> ~ Ishq </h6>
            </div>
            
            <!-- <div class="col-lg-6 col-md-7 col-sm-12 bg-warning justify-content-center">
                <div>
                    <div class="col-md-2">
                        <h3 class="myname"> Muhammad Ridhwan </h3>
                    </div>
                    <div class="col-md-2">
                        <h6> Student | Back-End Developer </h6>
                    </div>
                    <div class="col-md-3">
                        <p> Banjarmasin, Kalimantan Selatan</p>
                    </div>
                    
                </div>
            </div> -->
        </div>
    </div>

    <div class="container bg-white div-contact text-center" id="contact"> 
        <ul class="ul-contact">
            <li class="li-contact">
                <a href="https://wa.link/euq6dh" class="link-contact"> <img src="img/wa.png" alt="" class="foto-contact" style="background-color: black;"> </a>
            </li>
            <li class="li-contact">
                <a href="https://www.instagram.com/ridh_one18/" class="link-contact"> <img src="img/ig.jpg" alt="" class="foto-contact"> </a>
            </li>
            <li class="li-contact">
                <a href="https://web.facebook.com/ridhwan.ungung" class="link-contact"> <img src="img/fb.jpg" alt="" class="foto-contact"> </a>
            </li>
            <li class="li-contact">
                <a href="" class="link-contact"> <img src="img/gh.png" alt="" class="foto-contact" style="background-color: #000;"> </a>
            </li>
        </ul>
    </div>

    <div class="container text-white foot"> 
        <p class="cr"> <strong> Copyright © 2022 Muhammad Ridhwan. All Rights Reserved </strong> </p>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>    
</body>
</html>