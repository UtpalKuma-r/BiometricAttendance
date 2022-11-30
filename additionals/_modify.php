<?php
if(isset($_POST['add'])){
    include_once "_connection.php";

    $query = "SELECT * FROM STUDENT WHERE TASK = 'GETFID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0){

        $name = $_POST['name'];
        $room = $_POST['room'];
        $contact = $_POST['contact'];
    
        $query =   "INSERT INTO STUDENT (NAME, ROOM, CONTACT, TASK) VALUES('$name', $room, '$contact', 'getfid')";
        $result = mysqli_query($conn, $query);
    
        if($result){
            echo "<script>alert('Student added')</script>";
        }
    }
    else{
        while ($row = mysqli_fetch_assoc($result)){
            $name = $row['name'];
            echo "<script>alert('Can not add multiple students at a time. Complete fingre registration for $name')</script>";
        }
    }

    mysqli_close($conn);

}


if(isset($_POST['remove'])){
    include_once "_connection.php";

    $uid = $_POST['uid'];

    $query = "UPDATE STUDENT SET TASK='DELFID' WHERE UID = $uid";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "<script>alert('All data for $uid is deleted')</script>";
    }
    else{
        echo "<script>alert('Error occured!!!!')</script>";
    }
}
?>