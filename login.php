<?php
ob_start();
session_start();
require_once("configdb.php");


$username = $_POST["username"];
$password = md5($_POST["password"]);
if ($username != "BITCOINEX"){
    $query ="select * from users where username='$username' and password='$password'";
    @ $query_run =mysqli_query($mysqli,$query);
    if (mysqli_num_rows($query_run) == 0){
        echo("error");
    }else{
        $row = mysqli_fetch_array($query_run);


                $_SESSION['email']=$row['email'];
                $_SESSION['username']=$username;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION["status"] = $row['status'];
                $_SESSION["addy"] = $row['addy'];
                $_SESSION["phoneNo"] = $row['phoneNo'];
                $_SESSION["reg_date"] = $row['reg_date'];
                $_SESSION['activation_id'] = $row['activation_id'];
            echo 'success';


    }
}else{
    $query ="select * from admin where username='BITCOINEX'";
    @ $query_run =mysqli_query($mysqli,$query);
    if (mysqli_num_rows($query_run) == 0){
        echo("erroradmin");
    }else{
        $row = mysqli_fetch_array($query_run);
        if (md5($_POST["password"]) == $row['password']){
            echo("admin");
            $_SESSION['username']=$username;

        }


    }
}


?>