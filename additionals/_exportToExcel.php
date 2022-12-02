<?php
 echo "<script>alert('exportingToExcel')</script>";
include_once "_connection.php";

$output = '';

if(isset($_POST["ETE"])){
  
    if ( empty($_POST['date'])) {

        $date = date("Y-m-d");
    }
    else if ( !empty($_POST['date'])) {

        $date = $_POST['date']; 
    }
    $query = "SELECT STUDENT.NAME, STUDENT.ROOM, USERLOG.DATE, USERLOG.TIME, IF(STUDENT.UID IN (SELECT UID FROM USERLOG WHERE DATE = '$date'), 'Present', 'Absent') AS 'ATTENDANCE' 
    FROM STUDENT, USERLOG WHERE USERLOG.DATE = '$date' ";
        $result = mysqli_query($conn, $query);
        if($result->num_rows > 0){
            $output .= '
                        <table class="table" bordered="1">  
                        <tr>
                        <th>Name</th>
                        <th>Room No.</th>
                        <th>Date</th>
                        <th>Time</th>                    
                        <th>Attendence</th></tr>';
              while($row=$result->fetch_assoc()) {
                  $output .= '
                              <TR> 
                                  <TD> '.$row['NAME'].'</TD>
                                  <TD> '.$row['ROOM'].'</TD>
                                  <TD> '.$row['DATE'].'</TD>
                                  <TD> '.$row['TIME'].'</TD>
                                  <TD> '.$row['ATTENDANCE'].'</TD>
                              </TR>';
              }
              $output .= '</table>';
              header('Content-Type: application/xls');
              header('Content-Disposition: attachment; filename=User_Log'.$date.'.xls');
              
              echo $output;
              exit();
        }
        else{
            header( "location: ../userlogs.php" );
            exit();
        }
}
?>