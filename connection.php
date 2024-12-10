<?php
$host="localhost";
$user="root";
$password="";
$db_name="project_db";
$mysqli=new mysqli($host, $user,$password, $db_name);
if($mysqli->connect_error){
    die("connection failed:".$mysqli->connect_error);

}
?>