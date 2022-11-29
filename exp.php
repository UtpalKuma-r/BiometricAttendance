<?php
echo "<h1>exp</h1>";
if(isset($_POST)){
    echo "post called\t";
    if(isset($_POST["test"])){
        echo "test button was pressed\n";
    }
    if(isset($_POST["button"])){
        echo "button was pressed\n";
        echo $_POST['text'];
    }
}
?>