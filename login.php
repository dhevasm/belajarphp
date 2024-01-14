<?php 
    require 'function.php';

    if(isset($_SESSION["login"])){
        header("Location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_page</title>
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
    <h2>Login</h2>
    

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username" required autofocus>
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password" required>
                <input type="checkbox" id="showpw">

                <script>
                    const showpw = document.querySelector("#showpw");
                    const pw = document.querySelector("#password");
                    
                    showpw.addEventListener("click", () =>{
                        if(showpw.checked){
                        pw.type = "text";
                    }else{
                        pw.type = "password";
                    }
                    });    
                </script>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" style="display: inline-block;">remember me</label>
            </li>
            <li>
                <input type="submit" name="submit">
            </li>
        </ul>
    </form>
    <b>tidak memiliki akun, </b><a href="register.php">Register</a>
</body>
<?php 
     if(isset($_POST["submit"])){
        if(login($_POST) > 0){
            $_SESSION["user"] = $_POST["username"];
            header("Location:index.php");
        }else{
            echo "<p style='color:red;'>Terjadi kesalahan, $errorcode</p>";
        }
    }

    if(isset($_POST['remember'])){
        $status = hash("sha256", $_POST["username"]);

        $nama = $_POST["username"];
        $raw = mysqli_query($connect, "SELECT * FROM account WHERE username = '$nama'");
        $id = mysqli_fetch_assoc($raw);
        $idf = $id['id'];
        
        setcookie("go", "$status", time()+3600);
        setcookie("id", "$idf", time()+3600);
    }
?>
</html>