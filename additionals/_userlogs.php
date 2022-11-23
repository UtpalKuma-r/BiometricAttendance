<?php
include "_connection.php";

session_start();

function to_excel(){
    echo "to_excel called";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=text.xls");
    echo $exporttable;
}

if(isset($_SESSION["loggedin"])){
    $postdata = FALSE;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $date = $_POST['date'];
            $query = "SELECT * FROM STUDENT";
            $postdata = TRUE;
            
    }

    else{
            $query = "SELECT * FROM USERLOG";
        }
    
    $dataAvailable = mysqli_query($conn, $query);

    if(array_key_exists('button1', $_POST)) {
        echo $exporttable;
        // to_excel();
    }
}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>