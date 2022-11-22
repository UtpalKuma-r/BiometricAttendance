<?php
include "_connection.php";

if(isset($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = "SELECT HASH FROM LOGINDATA WHERE USERNAME = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0){
        echo "alert('Username invalid')";
    }

    else{
        $row = mysqli_fetch_array($result);
        // print_r($row) ;
        $cpassword = $row["HASH"];

        if($password == $cpassword){
            echo "Loged in";
        }

        else{
            echo "Wrong Password";
        }
    }
}
?>