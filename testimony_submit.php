<?php
    ob_start();
    session_start();
    require_once("configdb.php");
    require_once "PHPMailerAutoload.php";

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
        if ($_POST['rate'] && $_POST['price_type']){
            if ($_POST['price_type'] == 'buy_exchange_amount'){
                $query = "update e_currency set buy_exchange_amount='".$_POST['rate']."'";
            }else{
                $query = "update e_currency set sell_exchange_amount='".$_POST['rate']."'";
            }
            
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
	if ($_POST["file"] =="reset"){

        $username = $_POST["name"];
        $email = $_POST["email"];
        $subject ="Password Reset";
        $query ="select * from users where username='$username' and email='$email'";
        //echo $query;
        @ $query_run =mysqli_query($mysqli,$query);
        if (mysqli_num_rows($query_run) == 0){
            echo("error");
        }else{
            $token = rand(999,999999);
            $hash_val = md5($token);
            
            $row = mysqli_fetch_array($query_run);
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $query = "update users set reset='$hash_val' where email='$email'";
            @ $query_run = mysqli_query($mysqli,$query);
            //email
            $message = "<table border='1' cellpadding='0' cellspacing='0' width='100%'>";
            $message = $message."<tr>";
            $message = $message."<td style='padding: 40px 30px 40px 30px;'>";
            $message = $message."<p>Reset your BitcoinEx Account Password</p>";
            $message = $message."<p>Dear $firstname $lastname, to reset your BitcoinEx Account:</p>";
            $message = $message."<p>Click <a style='background-color: #1a69a4' href='localhost/btcupdate/reset-password.php?activation_id=$hash_val'>Here</a> to reset your password.</p>";
            $message = $message."<p>Alternatively copy and paste the below in to your browser address:<br><a href=\"localhost/btcupdate/reset-password.php?activation_id=$hash_val\">localhost/btcupdate/reset-password.php?activation_id=$hash_val </a></p>";
            $message = $message."<p style='margin-bottom: 60px'>Regards,<br>BitcoinEx.com Support</p><td></tr>";
            $message = $message."<tr>";
            $message = $message."<td style='text-align: center;padding:10px;background-color:orangered'>&copy; 2019 - BitcoinEx";
            $message = $message."</td>";
            $message = $message."</tr>";
            $message = $message."</table>";
            
            //send mail
            $mail = new PHPMailer();
            //$mail->SMTPDebug=3;
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth=true;
            $mail->Username="kayzeebiz@gmail.com";
            $mail->Password="moshkay55$";
            $mail->Port=587;
            $mail->From="kayzeebiz@gmail.com";
            $mail->FromName='saliu moshood kolawole';
            $mail->SMTPSecure='tls';
            $mail->smtpConnect(
                array(
                    "ssl"=> array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                        "allow_self_signed"=>true
                    )
                )
            );
            $mail->addAddress("$email","saliu moshood kolawole");
           
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body=$message;
            //$mail->AltBody="Mail verification. Pls verify ur account  without debug";
            if (!$mail->send()){
                echo "Mailer error:". $mail->ErrorInfo;

            }else{
                echo 'success';
            }
            
            //end email

        }
    }
    if ($_POST["file"] =="reset_submit"){
        $password = md5($_POST["password"]);
        $ver_id = $_POST["ver_id"];
        if ($ver_id){
            $query ="select * from users where reset='$ver_id'";
            //echo $query;
            @ $query_run =mysqli_query($mysqli,$query);
            if (mysqli_num_rows($query_run) == 0){
                echo("error");
            }else{
                $row = mysqli_fetch_array($query_run);
                $email = $row['email'];
                //echo $email;
                $query = "update users set password='$password' where email='$email'";
               
                @ $query_run = mysqli_query($mysqli,$query); 
                if ($query_run){
                    echo 'success';
                }else{
                    echo 'error';
                }
             }
        }

    }


?>
