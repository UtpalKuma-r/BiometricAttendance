<?php
include "_connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = "SELECT HASH FROM LOGINDATA WHERE USERNAME = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0){
        echo "<script>alert('Invalid Username')</script>";
        echo "<script>document.location.href='../index.php';</script>";
    }

    else{
        $row = mysqli_fetch_array($result);
        // print_r($row) ;
        $cpassword = $row["HASH"];

        if($password == $cpassword){
            session_start();
            $_SESSION['loggedin'] = TRUE;
            echo "<script>document.location.href='../alluser.php';</script>";
        }

        else{
            echo "<script>alert('Wrong Password')</script>";
            echo "<script>document.location.href='../index.php';</script>";
        }
    }
}
?>