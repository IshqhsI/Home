<?php 
    session_start();
    require 'koneksi.php';
    require 'functions.php';

    if (isset($_SESSION["login"])){
        if($_SESSION["login"]){
            Header('Location: index.php ');
        }
    }

    if ( isset($_POST["submit"]) ){
        if (login($_POST) > 0){
            $_SESSION["user"] = $_POST["username"];
            header("Location: index.php");
            exit;
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
    <link rel="stylesheet" href="css/stylelog.css">
    <title> Login </title>
    <style>
        .form-control:-webkit-autofill,
        .form-control:-webkit-autofill:focus {
            transition: background-color 600000s 0s, color 600000s 0s;
        }
        .remme{
            margin-top: 12px;
        }

        .form-check-input {
            margin-left: 20px;
        }
    </style>

    <?php if (isset($_POST["submit"])) : ?>
        <?php if ($gagal) : ?>
            <script>
                alert("Login Gagal");
            </script>
        <?php endif; ?>
    <?php endif; ?>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="text-center">
            <h2 class="text-log"> Login </h2>
        </div>
        <form action="" method="post"> 

            <label for="username" class="form-label labeluser"> Username </label>
            <input type="text" name="username" id="username" class="form-control form-user"  autocomplete="off" required> 
            
            <label for="password" class="form-label labelpass"> Password </label>
            <input type="password" name="password" id="password" class="form-control" required>

            <input class="form-check-input mt-3" type="checkbox" name="remme" id="remme">
            <label for="remme" class="text-light remme">Remember Me</label>

            <br><br>
            <div class="text-center">
                <button class="btn btn-primary btn-log" type="submit" name="submit"> Sign-in</button>
            </div>
        </form>
        <div class="dont text-center mt-5 py-3">
            <p class=""> Don't Have an Account ? <span> <a href="register.php"> Register </a></span></p>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>