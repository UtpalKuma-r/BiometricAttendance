<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/modify.css">
    <title>Modify</title>
</head>
<?php
    include "additionals/_modify.php";
?>
<body>

    <div class="header">
        <?php include "additionals/_header.html"; ?>
    </div>

    <div class="mid">
        <div class="same">
            <fieldset>
                <legend>Add Student</legend>
                <form action="" method="post">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                    <label for="room">Room</label>
                    <input type="number" name="room" id="room">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact">
                    <button type="submit" name="add">Add Student</button>
                </form>
            </fieldset>
        </div>

        <div class="same">
            <fieldset>
                <legend>Remove Student</legend>
                <form action="" method="post">
                    <label for="uid">Userid</label>
                    <input type="text" name="uid" id="uid">
                    <button type="submit" name="remove">Remove</button>
                </form>
            </fieldset>
        </div>
    </div>


</body>
</html>