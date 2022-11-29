<?php
include "_connection.php";

session_start();
if(isset($_SESSION["loggedin"])){
    // echo "<script>alert('you are logged in')</script>";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            // if (isset($_POST['searchby'])){
                $data = $_POST['data'];
                if ($_POST['searchby'] == 'name'){
                    $query = "SELECT * FROM STUDENT WHERE NAME = '$data'";
                }
                elseif($_POST['searchby'] == 'user'){
                    $query = "SELECT * FROM STUDENT WHERE userid = '$data'";
                }
                elseif($_POST['searchby'] == 'room'){
                    $query = "SELECT * FROM STUDENT WHERE room = '$data'";
                }
                else{
                    $query = "SELECT * FROM STUDENT";
                }
            }
    else{
                $query = "SELECT * FROM STUDENT";
            }
        
            $dataAvailable = mysqli_query($conn, $query);
    // }

}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>