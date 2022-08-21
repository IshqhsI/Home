<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title> Warung </title>
    <style>
        .mine{
            padding: 0;
            background-color: #fff;
        }
        .navbar{
            background-color: #404040;
            opacity: 1;
            color: #fff;
        }
        .navbar-brand{
            font-family: Verdana;
        }
        .nav-link{
            color: #fff;
            margin-right: 3rem;
            font-family: Helvetica;
        }
        .active{
            color: lightblue;
        }
        .content{
            margin-top: 8.5rem;
        }
        .welcome{
            margin-left: 1rem;
            font-size: 60px;
        }
        .img-store{
            width: 55%;
        }
        .btn-beli{
            border: 2px solid black;
        } /*
        .btn-beli:hover{
            
            background-color: #000;
            color: #fff; */
        /* } */
    </style>
</head>
<body class="bg-dark">
    <div class="container mine">
        <nav class="navbar navbar-expand-lg px-0">
            <a href="" class="navbar-brand text-light ms-5">
                Zaydun
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color: #130d0d;"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-dark">
                    <li class="nav-item">
                        <a href="" class="nav-link active">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="price.php" class="nav-link">
                            Produk
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <div class="container content">
            <div class="row">
                <div class="col-lg-7 mx-4">
                    <h2 class="mx-4 welcome"> Welcome </h2>
                    <p class="mx-4 mt-5" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt consequuntur laborum ut, doloribus, repellendus minus explicabo culpa nobis ab dicta odio sunt, et excepturi quo incidunt fugit vero laudantium reiciendis!</p>
                    <button class="btn btn-outline-dark btn-beli mx-4 mt-2" style="padding: 5px 50px"> Beli </button>
                </div>
                <div class="col-lg-4 text-center ms-auto mx-3">
                    <img src="storee.png" alt="" class="img-store">
                </div>
            </div>
        </div>
        <div class="container" style="padding: 0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding: 0; "><path fill="#000" fill-opacity="0.75" d="M0,32L48,74.7C96,117,192,203,288,213.3C384,224,480,160,576,122.7C672,85,768,75,864,85.3C960,96,1056,128,1152,160C1248,192,1344,224,1392,240L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>  
</body>
</html>