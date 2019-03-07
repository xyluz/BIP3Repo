<?php session_start(); 
require_once('lib/header.php');

$id = $_GET['id'];

require_once('lib/dbconnection.php');

$fetch_single_record = "SELECT * FROM sampletable1 WHERE id='$id'";

$test = $connect->query($fetch_single_record);

if($test && $test->num_rows){
    
    while($row = $test->fetch_assoc()){

        $name = $row['name'];
        $email = $row['email'];
        
    }

}
?>


<body>
 <div class="container" style='padding-top: 40px'>
    <h4>Edit User</h4>

        <?php 
            if(isset($_SESSION['message']) && $_SESSION['message'] != ""){
                echo "<div style='border: solid red 2px'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
        ?>

        <form action="doEdit.php" method="post">

            Name: <input type="text" name="name" required value="<?php echo $name ?>" /> <br /><br />
            Email: <input type="email" name="email" required value="<?php echo $email ?>" /> <br /><br />
            Password: <input type="password" placeholder="new password" name="password" required /><br /><br />

            <input type="hidden" value="<?php echo $id ?>" name="id" />

            <button class="btn btn-md btn-success" type="submit">Update <?php echo $name ?></button>
            

        </form>
    </div>

</body>
</html>