<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userlog</title>
</head>
<?php
include "additionals/_userlogs.php";
?>
<!-- <script>
    $(document).ready(function () {
    $("#studtable").table2excel({
        filename: "Students.xls"
    });
 });
</script> -->
<body>
    <form method="post">
        <input type="date" name="date" id="date">
        <button type="submit">View</button>
    
    </form>

    <div class="viewarea">

        <?php
            $exporttable = "";
            $exporttable .= "
            <table style='border: solid; border-color:red; border-width:2px;' id='studtable'>
                <tr>
                    <th>Name</th>
                    <th>Room No</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Attendence</th>
                </tr>";
                
                    if (mysqli_num_rows($dataAvailable) == 0){
                        $exporttable .= "<TR><TD width=200 colspan=5 >No data available</TD></TR>";
                    } 
                    else{

                        if($postdata){
                            // echo "data posted";
                            while ($row = mysqli_fetch_assoc($dataAvailable)){
                                print_r($row['userid']);
                                $data = $row['userid'];
                                $query = "SELECT * FROM USERLOG WHERE USERID = '$data' AND DATE = '$date'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) == 0){
                                    $exporttable .= "<TR>
                                            <TD>$row[name]</TD>
                                            <TD>$row[room]</TD>
                                            <TD></TD>
                                            <TD></TD>
                                            <TD>Absent</TD>
                                        </TR>";
                                }

                                else{
                                    while($col = mysqli_fetch_assoc($result)){
                                        $exporttable .= "<TR>
                                            <TD>$col[name]</TD>
                                            <TD>$col[room]</TD>
                                            <TD>$col[date]</TD>
                                            <TD>$col[time]</TD>
                                            <TD>Present</TD>
                                        </TR>";
                                    }
                                }
                            
                            }
                        }

                        else{
                            while ($row = mysqli_fetch_assoc($dataAvailable)){
                                $exporttable .= "<TR>
                                <TD>$row[name]</TD>
                                <TD>$row[room]</TD>
                                <TD>$row[date]</TD>
                                <TD>$row[time]</TD>
                                <TD>Present</TD>
                            </TR>";
                            }
                        }
                    }
                    
                
                
            $exporttable .= '</table>';
            echo $exporttable;
        ?>
        <?php echo $exporttable ?>
        <a href="exp.php?data=<?php $exporttable ?>">Export to excel</a>
        <!-- <form action="" method="post"><input type="submit" name="button1" value="Export to excel" /></form> -->
        <!-- <input type="submit" name="button1" value="Export to excel" /> -->
        <!-- <button onclick></button> -->
    
    </div>
</body>
</html>