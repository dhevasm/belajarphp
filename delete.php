<?php 
    require "function.php";

    if(!isset($_SESSION["login"])){
        header("Location:login.php");
    }

    $id = $_GET["id"];

    mysqli_query($connect, "DELETE FROM account WHERE id='$id'");

    header("Location:index.php");
?>