<?php
if(isset($_POST)){

    if(isset($_POST['check_register'])){
        include_once "additionals/_connection.php";

        $query = "SELECT UID FROM STUDENT WHERE STATUS = `enroll`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0){
            echo FALSE;
        }
        else{
            while ($row = mysqli_fetch_assoc($result)){
            echo [TRUE, $row['uid']];
            }
        }
    }

    if(isset($_POST['register_fingre'])){
        include_once "additionals/_connection.php";

        
        $query = "SELECT UID FROM STUDENT WHERE STATUS = `enroll`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0){
            echo FALSE;
        }
        else{
            while ($row = mysqli_fetch_assoc($result)){
            echo [TRUE, $row['uid']];
            }
        }
    }
}
?>