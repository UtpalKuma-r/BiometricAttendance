<?php
include "_connection.php";

session_start();
if(isset($_SESSION["loggedin"])){

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // if (isset($_POST['searchby'])){
            $date = $_POST['date'];
            $query = "SELECT * FROM STUDENT";
            $postdata = TRUE;
            
        }
else{
            $query = "SELECT * FROM USERLOG";
        }
    
        $dataAvailable = mysqli_query($conn, $query);
        // print_r($dataAvailable);
}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>