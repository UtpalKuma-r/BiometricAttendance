<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all users</title>
</head>
<?php
include "additionals/_alluser.php";
?>
<body>
    <div class="search">
        <form method="post">
        <label for="search">Search by: </label>
        <input type="radio" name="searchby" id="searchby" checked="checked" value='all'>All
        <input type="radio" name="searchby" id="searchby" value='name'>Name
        <input type="radio" name="searchby" id="searchby" value='room'>Room
        <input type="radio" name="searchby" id="searchby" value='user'>User
        <input type="text" name="data" id="data">
        <button type="submit">Search</button>
        <table>
            <tr><th>Username</th>
            <th>Name</th>
            <th>Room No.</th>
            <th>Contact</th></tr>
            <?php
                if (mysqli_num_rows($dataAvailable) == 0){
                    echo "<TR><TD width=200 colspan=3 >No students added</TD></TR>";
                } 
                else{
                    while ($row = mysqli_fetch_assoc($dataAvailable)){
                    echo "<TR><TD width=200>$row[userid]</TD><TD width=400>$row[name]</TD><TD width=150>$row[room]</TD><TD>$row[contact]</TR>";
                    }
                }
                
            ?>
        </table>
        </form>
    </div>
</body>
</html>
