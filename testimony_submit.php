<?php
    ob_start();
    session_start();
    require_once("configdb.php");

if ($_POST['file'] == 'testimony'){
    if ($_POST['testimony']){
        $testimony = $_POST['testimony'];
        $username = $_POST['name'];
        $ratings = $_POST['ratings'];
        $location  = $_POST['location'];
        $today = getdate();
        $date = $today['year']."-".$today['mon']."-".$today['mday'];
        $query = "insert into testimony(testimony,email,username,rating,location,entered_date) ";
        $query = $query."values('".addslashes($testimony)."','".$_SESSION['email']."','$username','$ratings','".addslashes($location)."','$date')";

        $query_run = mysqli_query($mysqli,$query);

        if ($query_run){
            echo "success";

        }else{
            echo("error");
        }
    }
}

    if ($_POST["file"] =="settings"){
        if ($_POST['location']){
            $location  = $_POST['location'];
        }
        $query = "update users set addy = '$location'";
        if ($_POST["password"]){
            $password = $_POST['password'];
            $con_pass = $_POST['repassword'];
            if ($password == $con_pass){
                $query = $query.",password ='".md5(password)."' where username = '".$_SESSION['username']."'";
            }

            @ $query_run = mysqli_query($mysqli,$query);
            if ($query_run){
                echo "settingssuccess";
            }else{
                echo "settingserror";
            }

        }

    }

if ($_POST["file"] =="adminSettings"){
    $query = "update admin set username='".$_POST['username']."' ";
        if ($_POST['acct_name']){
            $query =$query. ",account_name='".$_POST['acct_name']."'";
        }
        if ($_POST['acct_number']){
            $query =$query. ",account_number='".$_POST['acct_number']."'";
        }
        if ($_POST['currency_id']){
            $query =$query. ",ecurrency_details='".$_POST['currency_id']."'";
        }
        if ($_POST['bank_name']){
            $query =$query. ",bank_name='".$_POST['bank_name']."'";
        }

        if ($_POST["password"]) {
            $password = $_POST['password'];
            $con_pass = $_POST['repassword'];
            if ($password == $con_pass) {

                $query = $query . ",password ='" . md5($password) . "'";
            }
        }
        $query =$query. " where username = '" . $_SESSION['username']. "'";
        //echo $query;
        @ $query_run = mysqli_query($mysqli,$query);
        if ($query_run){
            echo "settingssuccess";
        }else{
            echo "settingserror";
        }


}

    if ($_POST["file"] =="currencySettings"){
        if ($_POST['rate']){
            $query = "update e_currency set exchange_amount='".$_POST['rate']."'";
            @ $query_run = mysqli_query($mysqli,$query);
            if ($query_run){
                echo "settingssuccess";
            }else{
                echo "settingserror";
            }
        }
    }
    if ($_POST["file"] =="approve"){
        $today = getdate();
        $process= $_POST['process'];
        $id = $_POST['item_id'];
        $date = $today['year']."-".$today['mon']."-".$today['mday'];
        if ($process == 'buy'){
            $query = "update buy set completion_date = '$date',completed='Y' where id ='$id'";
        }elseif ($process =='sell'){
            $query = "update sell set completion_date = '$date',completed='Y' where id ='$id'";
        }
        //echo($query);
        @ $query_run = mysqli_query($mysqli,$query);
        if ($query_run){
                echo "settingssuccess";
            }else{
                echo "settingserror";
            }

    }


?>
