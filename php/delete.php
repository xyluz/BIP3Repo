<?php session_start();
//connect to db
//delete that record from db
//return back to the page.

$id = $_GET['id'];

require_once('lib/dbconnection.php');

$delete_statement = "DELETE FROM sampletable1 WHERE id='" . $id . "'";

$check = $connect->query($delete_statement);

if($check){
   
    $_SESSION['message'] = "<span style='color: red'>Record Deleted</span>";
    header('location: welcome.php');

}else{
    echo "error occured " . $connect->error;
}