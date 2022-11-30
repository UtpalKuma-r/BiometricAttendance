<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/alluser.css">
    <title>all users</title>
</head>
<?php
include "additionals/_alluser.php";
?>
<body>

    <div class="header">
        <?php include "additionals/_header.html"; ?>
    </div>

    <div class="mid">

        <div class="search">

            <fieldset>
                <legend>Search</legend>

                <form method="post">
                <label for="search">Search by: </label>

                <span><input type="radio" name="searchby" id="searchby" checked="checked" value='all'>All</span>
                <span><input type="radio" name="searchby" id="searchby" value='name'>Name</span>
                <span><input type="radio" name="searchby" id="searchby" value='room'>Room</span>
                <span><input type="radio" name="searchby" id="searchby" value='user'>User</span>

                <label for="data">Value: </label>
                <span><input type="text" name="data" id="data"></span>


                <button type="submit" name="search">Search</button>
                </form>

            </fieldset>

            
        </div>
        
        <div class="result">
        
            <table>
                <tr><th>User ID</th>
                <th>Name</th>
                <th>Room No.</th>
                <th>Contact</th></tr>
                <?php
                    if (mysqli_num_rows($dataAvailable) == 0){
                        echo "<TR><TD colspan=3 style='margin:auto;'>No data available</TD></TR>";
                    } 
                    else{
                        while ($row = mysqli_fetch_assoc($dataAvailable)){
                        echo "<TR><TD width=200>$row[uid]</TD><TD width=400>$row[name]</TD><TD width=150>$row[room]</TD><TD>$row[contact]</TR>";
                        }
                    }
                    
                ?>
            </table>
        </div>
    </div>

</body>
</html>
