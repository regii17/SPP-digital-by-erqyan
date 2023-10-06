<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">


    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <title>LOGIN!!!</title>
</head>

<body>
    <div class="konten">

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "logout") {
                echo '<div class="alert alert-warning alert-dismissible">
            <a href="index.php"><button type="button" class="close">×</button></a>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Anda telah Log Out</h5>
            </div>';
            } else if ($_GET['pesan'] == "gagal") {
                echo '<div class="alert">
                  <a href="index.php"><button type="button" class="close">×</button></a>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Username / Password tidak tepat!
                </div>';
            } else if ($_GET['pesan'] == "belumlogin") {
                echo '<div class="alert alert-warning alert-dismissible">
                  <a href="index.php"><button type="button" class="close">×</button></a>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                  Anda harus login terlebih dahulu!
                </div>';
            }
        }
        ?>

        <form action="cek-login.php" method="post">
            <div class="login">
                <div class="col-6 kotak1">
                    <img src="assets/gambar/login.png" alt="" srcset="">
                </div>

                <div class="col-6 kotak2">
                    <div class="form">
                        <h1>SPP NEXAS</h1>
                        <h5>Username</h5>
                        <input type="text" name="username" placeholder="Username">
                        <h5>Password</h5>
                        <input type="password" name="password" id="" placeholder="Password">
                        <button class="btn" name="btn" type="submit">LOGIN</button>
                    </div>
                </div>
            </div>

        </form>
</body>

</html>