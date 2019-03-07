<?php session_start(); 

// if(!isset($_SESSION['email']) || $_SESSION['email'] == "" )
// {
//     $_SESSION['message'] = "you cannot by-pass this page";
//     header('location: text.php');
// }

require_once('lib/dbconnection.php');

$fetch_statement = "SELECT * FROM sampletable1 ORDER BY id DESC";

$try = $connect->query($fetch_statement);


require_once('lib/header.php');

?>



<body>
    <div class="container" style="padding-top: 40px;">
    <h4><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : '' ; unset($_SESSION['message']); ?></h4>

    <form action="logout.php" method="post">
    <h3>All Record, found (<?php echo $try->num_rows ?>) records</h3>

    <?php 

        while($row = $try->fetch_assoc()){
            echo "Name : " . $row['name'] . '<br /><br />';
            echo "Email : " . $row['email'] . '<br /><br />';
            echo "Password : " . $row['password'] . '<br /><br />';
           
            echo "<a  href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>   ";

            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a> <br /><br />";

            echo "<hr>";
        }

    ?>
       
        <button class="btn btn-sm btn-primary" type="submit">Logout</button>
        

    </form>
    </div>
</body>
</html>