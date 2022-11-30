<?php
include "_connection.php";

session_start();


if(isset($_SESSION["loggedin"])){
    $postdata = FALSE;

    if(isset($_POST['search'])){
            $date = $_POST['date'];
            $query = "SELECT STUDENT.NAME, STUDENT.ROOM, USERLOG.DATE, USERLOG.TIME, IF(STUDENT.UID IN (SELECT UID FROM USERLOG WHERE DATE = $date), 'P', 'A')
            FROM STUDENT, USERLOG WHERE USERLOG.DATE = $date ";            
    }

    else{
            $query = "SELECT * FROM STUDENT WHERE STUDENT.UID IN (SELECT * FROM USERLOG)";
        }
    
    $dataAvailable = mysqli_query($conn, $query);


}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>