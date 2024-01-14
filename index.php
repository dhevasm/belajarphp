<?php 
    require "function.php";

    if(isset($_COOKIE["go"])){
        $cookievalue = $_COOKIE["go"];
        $cookievalueid = $_COOKIE["id"];

        $querydata = mysqli_query($connect, "SELECT username FROM account WHERE id = '$cookievalueid'");
        $fetchdata = mysqli_fetch_assoc($querydata);

        if(hash('sha256', $fetchdata["username"]) === $cookievalue){
            $_SESSION["login"] = true;
            $_SESSION["user"] = $fetchdata["username"];
        }
    }

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }

    if(isset($_POST["submit"])){
        $keywords = $_POST["search"];
        header("Location:search.php?keywords=$keywords");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_page</title>
</head>
<style>
    table{
        border-collapse: collapse;
    }
    th, td{
        padding: 10px;
    }
</style>
<body>
    <h2>Account Data Control Panel</h2>
    <b>Login sebagai <?php echo $_SESSION["user"]; ?></b><br>
    <a href="logout.php">Logout</a> | <a href="register.php">tambah data</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="search" id="keywords" autocomplete="off" autofocus placeholder="masukkan keywords pencarian!" size="40">
        <button name="submit">Search!</button>
    </form>
    <br>
    
        <table border="1">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>notelp</th>
                <th>action</th>
            </tr>
            <div id="container">
            <?php 
                $data = mysqli_query($connect, "SELECT * FROM account");
                
                while($row = mysqli_fetch_assoc($data)){
                    ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["notelp"]; ?></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a>
                                | <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
            </div>
        </table>
</body>
</html>