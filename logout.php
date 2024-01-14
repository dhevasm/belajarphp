<?php 
    require "function.php";

    session_unset();
    session_destroy();

    setcookie("go", "", time()-3600);
    setcookie("id", "", time()-3600);

    header("Location:login.php");
?>