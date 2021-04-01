<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<center>
    <h2> SISTEM INFORMASI PENGELOLAAN <BR></BR> KEUANGAN PEMBANGUNAN DESA</h2></center>
    <HR></HR>
    <div class="container" 
        style="margin: 150px auto;
        width: 200px;
        padding: 10px;
        ">
        <form method="post" action="Login/auth">
            <label > ID </label><br><br>
            <input type="text" name="id" placeholder="Masukan ID Anda" ><br><br>
            <label > Passord </label><br><br>
            <input type="password" name="pass" placeholder="Masukan Password"><br><br>
            <div><center>
            <input type="submit" name="Login" value="Login"></center>
            </div>
        </form>
    </div>

</body>
</html>