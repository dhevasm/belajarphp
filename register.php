<?php 
    require 'function.php';

    if(isset($_POST["submit"])){
        if(register($_POST) > 0){
            echo "<script>
                alert('user $user berhasil ditambahkan');
            </script>";
        }else{
            echo "<script>
                alert('terjadi kesalahan, $errorcode');
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register_page</title>
</head>
<style>
    label{
        display: block;
        margin-bottom: 5px;
    }
    li{
        list-style: none;
        margin: 10px;
    }
</style>
<body>
    <h2>Register</h2>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username" required autofocus>
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">verifikasi password</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <label for="email">email</label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="notelp">notelp</label>
                <input type="text" name="notelp" id="notelp" inputmode="numeric" required>
            </li>
            <li>
                <input type="submit" name="submit">
            </li>
        </ul>
    </form>
    <a href="index.php">Return</a>
</body>
</html>