<?php
if(isset($_POST['add'])){
    include_once "_connection.php";

    $name = $_POST['name'];
    $room = $_POST['room'];
    $contact = $_POST['contact'];

    $query =   "INSERT INTO STUDENT (NAME, ROOM, CONTACT, TASK) VALUES('$name', $room, '$contact', 'getfid')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Student added')</script>";
    }
}
?>