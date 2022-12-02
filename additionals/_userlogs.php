<?php
include "_connection.php";

session_start();


if(isset($_SESSION["loggedin"])){
    $postdata = FALSE;

    if(isset($_POST['search'])){
            $date = $_POST['date'];
    }

    else{
            $date = date('Y-m-d');
        }
    $_SESSION['date'] = $date;

    $query = "SELECT STUDENT.NAME, STUDENT.ROOM, USERLOG.DATE, USERLOG.TIME, IF(STUDENT.UID IN (SELECT UID FROM USERLOG WHERE DATE = '$date'), 'Present', 'Absent') AS 'ATTENDANCE' 
                FROM STUDENT, USERLOG WHERE USERLOG.DATE = '$date' ";
    $dataAvailable = mysqli_query($conn, $query);
    


}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>