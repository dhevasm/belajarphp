<?php 
    require "function.php";

    $keywords = $_GET["keywords"];

    $data = mysqli_query($connect, "SELECT * FROM account WHERE
    username LIKE '%$keywords%' OR
    email LIKE '%$keywords%' OR
    notelp LIKE '%$keywords%'");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | result</title>
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


