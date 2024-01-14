<?php 
    require "function.php";

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }

    $id = $_GET["id"];

    $data = mysqli_query($connect, "SELECT * FROM account WHERE id = '$id'");
    $fetchdat = mysqli_fetch_assoc($data);

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $notelp = $_POST["notelp"];
        mysqli_query($connect, "UPDATE account SET username='$username', email='$email', notelp='$notelp' WHERE id='$id'");

        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_page</title>
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
    <h2>Edit Page</h2>
    <a href="index.php">Return</a>
    <br>
    <form action="" method="post">
    <ul>
            <li>
                <label for="username">username</label>
                <input type="text" name="username" id="username" value="<?php echo $fetchdat['username'] ?>" required>
            </li>
            <li>
                <label for="email">email</label>
                <input type="email" name="email" id="email" value="<?php echo $fetchdat['email'] ?>" required>
            </li>
            <li>
                <label for="notelp">notelp</label>
                <input type="text" name="notelp" id="notelp" value="<?php echo $fetchdat['notelp'] ?>" inputmode="numeric" required>
            </li>
            <li>
                <input type="submit" name="submit">
            </li>
        </ul>
    </form>
</body>
</html>