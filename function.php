<?php 
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "db_latihan");
    $user;
    $errorcode;

    function register($data){
        global $connect;
        global $user;
        global $errorcode;

        $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
        $password = htmlspecialchars($data["password"]);
        $password2 = htmlspecialchars($data["password2"]);
        $email = htmlspecialchars($data["email"]);
        $notelp = htmlspecialchars($data["notelp"]);

        $safepass = password_hash($password, PASSWORD_DEFAULT);

        $cekusername = mysqli_query($connect, "SELECT * FROM account WHERE username = '$username'");
        if(mysqli_fetch_assoc($cekusername)){
            $errorcode = "username sudah terdaftar";
            return false;
        }
        if($password != $password2){
            $errorcode = "verifikasi password tidak sesuai";
            return false;
        }else{
            $user = $username;
            mysqli_query($connect, "INSERT INTO account VALUES('', '$username', '$safepass', '$email', '$notelp')");
        }

        return 1;

    }

    function login($data){
        global $connect;
        global $user;
        global $errorcode;

        $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
        $password = htmlspecialchars($data["password"]);

        $cekusername = mysqli_query($connect, "SELECT * FROM account WHERE username = '$username'");
        $cekrows = mysqli_num_rows($cekusername);
        $fetchdat = mysqli_fetch_assoc($cekusername);

        if( $cekrows === 1){
            $cekpass = password_verify($password, $fetchdat["password"]);
            if($cekpass){
                $user = $username;
                $_SESSION["login"] = true;
                return 1;
            }else{
                $errorcode = "password salah";
                return false;
            }
            
        }else{
            $errorcode = "username belum terdaftar";
            return false;
        }
    }
?>