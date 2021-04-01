<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<center>
<div class="wrap">
    <div class="card " style="width: 60rem; ">
    <div class="card-body">
      <h4 class="card-title" style="text-align:center"><b>Sistem Informasi Pengelolaan Keuangan Pembangunan <br> Desa Kedung Pomahan Wetan</b></h4>
      <hr>
    
        <form method="post" action="<?php echo site_url('Login/auth')?>">
            <label style="padding-right: 170px"> ID </label><br><br>
            <input type="text" name="id" placeholder="Masukan ID Anda" ><br><br>
            <label style="padding-right: 120px"> Password </label><br><br>
            <input type="password" name="pass" placeholder="Masukan Password"><br><br>
            <div>
            <input type="submit" name="Login" value="Login">
            </div>
        </form>
    
    </div>
    </div>
    </div>
    </center>