<?php
if(isset($_POST)){

    if($_POST['api_key'] == 'MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ'){

        if(isset($_POST['check_register'])){
            include_once "additionals/_connection.php";

            $query = "SELECT UID FROM STUDENT WHERE TASK = 'enroll'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0){
                echo 'FALSE';
            }
            else{
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['UID'];
                }
            }

            mysqli_close($conn);
        }

        if(isset($_POST['register_fingre'])){
            include_once "additionals/_connection.php";

            $uid = $_POST['uid'];
            $fid = $_POST['fid'];

            $query = "UPDATE STUDENT SET TASK='ADDED',FID=$fid WHERE UID = $uid";
            $result = mysqli_query($conn, $query);

            if ($result){
                echo 'Success';
            }
            else{
                echo 'some error occured';
            }
            mysqli_close($conn);
        }

        if(isset($_POST['attendance'])){

            $fid = $_POST['fid'];

            $getquery = "SELECT UID, NAME FROM STUDENT WHERE FID = $fid";
            $result = mysqli_query($conn, $query);

            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    $uid = $row['UID'];
                    $name = $row['NAME'];
                }
            
                $query = "INSERT INTO userlog (UID) VALUES($uid)";
                $result = mysqli_query($conn, $query);

                if ($result){
                    echo $name.' has been marked present';
                }
                else{
                    echo 'some error occured';
                }
            }
            else{
                echo 'some error occured';
            }
            mysqli_close($conn);
        }

        if(isset($_POST['check_remove'])){
            include_once "additionals/_connection.php";

            $query = "SELECT FID FROM STUDENT WHERE TASK = 'DELFID'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0){
                echo 'FALSE';
            }
            else{
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['FID'];
                }
            }

            mysqli_close($conn);
        }

        if(isset($_POST['remove_fingre'])){
            include_once "additionals/_connection.php";

            // $uid = $_POST['uid'];
            $fid = $_POST['fid'];

            $query = "DELETE FROM STUDENT WHERE FID = $fid";
            $result = mysqli_query($conn, $query);

            if ($result){
                echo 'Success';
            }
            else{
                echo 'some error occured';
            }
            mysqli_close($conn); 
        }
    }
}

// String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&check_register";
// String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&register_fingre&uid="+uid+"&fid="+fid;
// String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&check_remove";
// String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&remove_fingure&fid="+fid;
// String post = "api_key=MuoVcoDvRjHdWuQPMDvxqWkIxnoOGPFbwcoYCtCZ&attendance&fid="+fid;

?>