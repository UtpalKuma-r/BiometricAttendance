<?php
include "_connection.php";

session_start();
if(isset($_SESSION["loggedin"])){

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // if (isset($_POST['searchby'])){
            $date = $_POST['date'];
            if ($_POST['searchby'] == 'name'){
                $query = "SELECT * FROM USERLOG WHERE DATE = '$date'";
            }
        }
else{
            $query = "SELECT * FROM USERLOG";
        }
    
        $dataAvailable = mysqli_query($conn, $query);
}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>