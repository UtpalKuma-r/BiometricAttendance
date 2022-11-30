<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/userlogs.css">
    <title>Userlog</title>
</head>
<?php
include "additionals/_userlogs.php";
?>

<body>

    <div class="header">
        <?php include "additionals/_header.html"; ?>
    </div>
    
    <div class="mid">
        <div class="search">
            <fieldset>
                <legend>Search:</legend>
                <form method="post">
                    <input type="date" name="date" id="date">
                    <button type="submit" name="search">View</button>
                </form>
            </fieldset>
        </div> 

        <div class="result">
            <table>
                    <tr>
                    <th>Name</th>
                    <th>Room No.</th>
                    <th>Date</th>
                    <th>Time</th>                    
                    <th>Attendence</th></tr>
                    <?php
                        if (mysqli_num_rows($dataAvailable) == 0){
                            echo "<TR><TD colspan=5 style='margin:auto;'>No data available</TD></TR>";
                        } 
                        else{
                            while ($row = mysqli_fetch_assoc($dataAvailable)){
                                print_r($row);
                            //     $name = $row['name'];
                            //     $room = $room['room'];
                            //     $date = $room['date'];
                            //     $time = $room['time'];
                            //     $atten = $room['atten'];
                            // echo "<TR><TD>$name</TD><TD>$room</TD><TD>$date</TD><TD>$time</td><td>$atten</TR>";
                            }
                        }   
                    ?>
            </table>
        </div>
        <div style="display: flex;">
            <button type="submit">Export to Excel</button>
        </div>
        
    </div>


   
</body>
</html>