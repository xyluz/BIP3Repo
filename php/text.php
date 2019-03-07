<?php session_start(); 
require_once('lib/header.php');
?>


<body>
 <div class="container" style='padding-top: 40px'>
    <h4>Register A new user</h4>

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

            <button class="btn btn-md btn-success" type="submit">Send to Database</button>
            <a href="allrecords.php" class="btn btn-md btn-warning">See All Record</a>

        </form>
    </div>

</body>
</html>