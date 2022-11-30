<?php
session_start();
if(isset($_SESSION["loggedin"])){
    // echo "<script>alert('you are logged in')</script>";
    include_once "_connection.php";
    if(isset($_POST['search'])){

                $data = $_POST['data'];
                $type = gettype($data);
                
                if ($_POST['searchby'] == 'name'){
                    $query = "SELECT * FROM STUDENT WHERE NAME = '$data'";
                }
                elseif($_POST['searchby'] == 'user'){
                    if($type == 'integer'){
                        $query = "SELECT * FROM STUDENT WHERE uid = $data";
                    }
                    else{
                        echo "<script>alert('Data must be integer when uid is selected')</script>";
                        $query = "SELECT * FROM STUDENT";
                    }
                    
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
    mysqli_close($conn);

}
else{
    echo "<script>alert('Unauthorised access!!!!')</script>";
    echo "<script>document.location.href='index.php';</script>";
}

?>