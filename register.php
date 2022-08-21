<?php 
    require 'koneksi.php';
    require 'functions.php';

    if ( isset($_POST["submit"]) ){
        if (register($_POST) > 0){
            $sukses = true;
        } else {
            $gagal = true;
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylereg.css">
    <title> Register </title>
    <?php if (isset($_POST["submit"])) : ?>
        <?php if ($gagal) : ?>
            <script>
                alert("Registrasi Gagal");
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($_POST["submit"])) : ?>
        <?php if ($sukses) : ?>
            <script>
                alert("Registrasi Sukses");
                document.location.href = 'login.php';
            </script>
        <?php endif; ?>
    <?php endif; ?>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="text-center">
            <h2 class="text-log"> Register </h2>
        </div>
        <form action="" method="post"> 

            <label for="username" class="form-label text-dark labeluser"> <strong> Username </strong> </label>
            <input type="text" name="username" id="username" class="form-control form-user"  autocomplete="off" required> 
            
            <label for="password" class="form-label text-dark labelpass"> <strong> Password </strong> </label>
            <input type="password" name="password" id="password" class="form-control" required>

            <label for="password2" class="form-label text-dark labelpass2"> <strong> Konfirmasi Password </strong> </label>
            <input type="password" name="password2" id="password2" class="form-control" required>

            <br><br>
            <div class="text-center pb-5">
                <button class="btn btn-dark btn-log" type="submit" name="submit"> Sign-up </button>
            </div>
        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>