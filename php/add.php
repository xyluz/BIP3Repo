<?php session_start();

$name = $_POST['name']; // $_GET
$email = $_POST['email'];
$password = $_POST['password'];

$error = '';

$error .= $name == "" ? "Name is required <br />" : "";
$error .= $password == "" ? "Password is required <br />" : "";
$error .= $email == "" ? "Email is required <br />" : "";

$error != '' ? print_r($error); die() : false;

$encrypted_password = md5($password);

//connect to database

$host = '127.0.0.1'; //localhost
$username = 'root';
$password = '';
$db_name = 'samplefortesting2';


$connect = new mysqli($host,$username,$password,$db_name);

if($connect){
    echo "connected!";
}else{
    echo 'an error occured ' . $connect->connect_error;
}

//check if email already exists in my database.
//if email exists, send them back to text,php with a message, you already have an account
//if email doesn't exist, then sign them up

$check_db_for_email = "SELECT id FROM sampletable1 WHERE email='".$email . "'";

$test = $connect->query($check_db_for_email);

// print_r($test->num_rows);
// die();


if($test->num_rows > 0){

    $_SESSION['message'] = "You already have an account with us";
    header('location: text.php');
    die();

}



//create the query

$query_statement = "INSERT INTO sampletable1 (name,password,email) VALUES('$name','$encrypted_password','$email')";

//actually run the query

$try = $connect->query($query_statement);

//if statement ran successfully, then $try will be true, otherwise, it will be false

if($try){
 
    $_SESSION['message'] = "Welcome to dashboard " . $name;
    $_SESSION['email'] = $email;

    header('location: welcome.php');
}else{
    echo "an error occured" . $connect->error;
    header('location: text.php');
}




