<?php 

$host = '127.0.0.1'; //localhost
$username = 'root';
$password = '';
$db_name = 'samplefortesting2';

$connect = new mysqli($host,$username,$password,$db_name);

if(!$connect){
    echo 'an error occured ' . $connect->connect_error;
}
