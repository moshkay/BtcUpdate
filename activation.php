<?php
ob_start();
session_start();
require_once("configdb.php");

$activation = $_GET['activation_id'];
echo $activation;
$query = "select * from users where activation_id='$activation'";
$query_run = mysqli_query($mysqli,$query);
if ($query_run){
    if (mysqli_num_rows($query_run) > 0 ){
        $query= "update users set status = 'V' where activation_id='$activation'";
        $query_run = mysqli_query($mysqli,$query);
        if ($query_run){
            echo("success");
            header("location:index.php");
        }else {
            echo "error";
        }
    }
}else{
    echo "error";
}



?>