<?php 
    require '../koneksi.php';
    require '../functions.php';


   session_start();
    
    // Cek Cookie dan ambil id untuk mendapat username
    if( isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        $username = getUser($id);

        if ($key === hash('sha256', $username) && $_COOKIE["id"] === $id){
            $_SESSION["user"] = $username;
            $username = $_SESSION["user"];
        } else {
            $_SESSION["login"] = false;
        }
    } else {
        $username = $_SESSION["user"];
    }

    // Insert dari form untuk menambahkan list
    if (isset ($_POST["submit"])){
        insert($_POST["do"], $username);
    }

    $result = mysqli_query($conn, "SELECT * FROM `$username`");

    // Jika belum Login _SESSION = false
    if ( !isset($_SESSION["login"]) ){
        $_SESSION["login"] = false;
    }

    // Jika False login dulu
    if (!$_SESSION["login"]){
        header("Location: ../");
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
    <title> Project </title>
    <style>
        body{
            background-color: #000;
        }
        .mycontainer{
            width: 30%;
            margin: auto;
        }
        .container{
            border-radius: 14px;
            
            height: 100%;
            /* max-height: 500px; */
        }
        .form-control{
            width: 80%;
            display: inline;
            margin: auto;
            margin-bottom: 10px;
            overflow: auto;
        }
        .form-control:focus{     
            outline:0;
            box-shadow:0 0 0 .18rem darkblue;
        }
        .form-do{
            width: 90%;
            /* display: inline; */
            display: block;
            margin: auto;
            overflow: auto;
        }
        .btn-submit{
            border: 2px solid blue;
            color: #fff;
            background-color: blue;
            padding: 4px 0;
            margin-left: 5%;
            display: block;
            width: 25%;
            border-radius: 8px;
            margin-bottom: 3rem;
        }
        .btn-submit:hover{
            border: 2px solid darkblue;
            color: #fff;
            background-color: darkblue;
            display: block;
            width: 25%;
            border-radius: 8px;
        }
        .btn-del{
            padding: 5px;
            background-color: white;
            margin-bottom: 5px;
            border-radius: 8px;
            border: 0;
        }
        .btn-del:hover{
            padding: 4.6px;
            background-color: white;
            margin-bottom: 4.6px;
            border-radius: 8px;
            border: 0;
        }
        .mydo{
            list-style-type: none;
        }
        .list-do{
            list-style-type: none;
        }

        @media screen and (max-width: 576px) {
           .mycontainer{
                width: 100%;
           } 
        }
    </style>
</head>
<body bgcolor="black">

    <div class="mycontainer">
        <div class="container bg-dark mt-lg-5">
            <h3 class="text-light text-center pt-4">
               ✨ To Do List ✨
            </h3>

            <form action="" method="post" class="mt-5">

                <label class="text-white mx-4"> What do you want to do ? </label>
                <input type="text" class="form-control form-do mt-2" name="do" id="do" autofocus="on" autocomplete="off" required>
                <br>

                <button type="submit" class="btn btn-submit" name="submit"> Submit </button>
            </form>
                <?php while ($row = mysqli_fetch_row($result)) : ?> 
                    <div class="text-center" style="">
                        <ul style="mydo list-style-type: none; padding: 0; margin: 0;">
                            <li class="list-do">
                                <input type="hidden" value="<?= $row[0] ?>" name="id">  
                                <input type="text" class="form-control" id="mine" disabled value="<?= $row[1]?>">
                                <a href="hapus.php?id=<?= $row[0]; ?>&&todo=<?= $username ?>"> <button class="btn btn-primary btn-del ms-auto" > <img src="trashbin.png" alt="" style="width: 30px; border-radius: 8px;"> </button> </a>
                            </li>
                        </ul>
                        
                    </div>
                <?php endwhile; ?>
                <br><br>

            

        </div>
    </div>
    
    
</body>
</html>