<?php session_start();

$id = $_POST['id'];
$name = $_POST['name']; 
$email = $_POST['email'];
$password = $_POST['password'];

$error = '';

$error .= $name == "" ? "Name is required <br />" : "";
$error .= $password == "" ? "Password is required <br />" : "";
$error .= $email == "" ? "Email is required <br />" : "";
$error .= $id == "" ? "User ID is required <br />" : "";


if($error){
    print_r($error); 
    die();
}

$encrypted_password = md5($password);

//connect to database

require_once('lib/dbconnection.php');

//TODO: verify that the user actually exists in the database

$update_user_statement = "UPDATE sampletable1 SET name='$name', email='$email', password='$encrypted_password' WHERE id='$id'";

$test = $connect->query($update_user_statement);

if($test){

    $_SESSION['message'] = "User data updated!";
    header('location: text.php');
    die();

}else{
    echo "Error 500 : " . $connect->error; 
}






