<?php session_start(); 

if(!isset($_SESSION['email']) || $_SESSION['email'] == "" )
{
    $_SESSION['message'] = "you cannot by-pass this page";
    header('location: text.php');
}

$host = '127.0.0.1'; //localhost
$username = 'root';
$password = '';
$db_name = 'samplefortesting2';

$connect = new mysqli($host,$username,$password,$db_name);

if(!$connect){
    echo 'an error occured ' . $connect->connect_error;
}

$fetch_statement = "SELECT * FROM sampletable1 WHERE email='" . $_SESSION['email'] . "'";

$try = $connect->query($fetch_statement);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Welcome</title>
</head>
<body>
    <h4><?php echo $_SESSION['message']; ?></h4>

    <form action="logout.php" method="post">
    <h3>Your account details</h3>

    <?php 

        while($row = $try->fetch_assoc()){
            echo "Name : " . $row['name'] . '<br /><br />';
            echo "Email : " . $row['email'] . '<br /><br />';
            echo "Password : " . $row['password'] . '<br /><br />';
            echo "<hr>";
        }

    ?>
       
        <button type="submit">Logout</button>

    </form>

</body>
</html>