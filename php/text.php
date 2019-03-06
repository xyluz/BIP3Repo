<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP test</title>
</head>
<body>
    <h4>Database first Test</h4>

    <?php 
        if(isset($_SESSION['message']) && $_SESSION['message'] != ""){
            echo "<div style='border: solid red 2px'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
    ?>

    <form action="add.php" method="post">

        Name: <input type="text" name="name" required  /> <br /><br />
        Email: <input type="email" name="email" required  /> <br /><br />
        Password: <input type="password" name="password" required /><br /><br />

        <button type="submit">Send to Database</button>

    </form>

</body>
</html>