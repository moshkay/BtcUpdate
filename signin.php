<?php
ob_start();
session_start();
require_once "PHPMailerAutoload.php";
require_once("configdb.php");
//echo(md5($_POST['password']));
//echo($_POST['repeatpassword']);

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$phoneno = $_POST["phoneno"];
$address = $_POST["address"];
$email = $_POST["email"];
$activation_id = md5($_POST['email'].$_POST['firstname'].$_POST['lastname']);
$today = getdate();
$today_date = $today['year']."-".$today['mon']."-".$today['mday'];
//echo($activation_id);
$query = "insert into users(firstname,lastname,username,password,email,phoneNo,addy,activation_id,reg_date,status) values('$firstname','$lastname','$username','$password','$email','$phoneno','$address','$activation_id','$today_date','N')";
@ $query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo "success";
    $subject = "Activate your BitcoinEx Account";
    $message = "<table border='1' cellpadding='0' cellspacing='0' width='100%'>";
    $message = $message."<tr>";
    $message = $message."<td style='padding: 40px 30px 40px 30px;'>";
    $message = $message."<p>Activate your BitcoinEx Account</p>";
    $message = $message."<p>Dear $firstname $lastname, Welcome to BitcoinEx</p>";
    $message = $message."<p>Your Account creation was successful<br> Your account details are states below:<br>";
    $message = $message."Username: <b>$username</b><br>";
    $message = $message."Fullname: <b>$firstname $lastname</b><br>";
    $message = $message."Email: <b>$email</b><br>";
    $message = $message."Phone Number: <b>$phoneno</b><br></p>";
    $message = $message."<p>You need to verify your email address to start using your BitcoinEx Account.</p>";
    $message = $message."<p>Click <a style='background-color: #1a69a4' href='localhost/btcupdate/activation.php?activation_id=$activation_id'>Here</a> to activate your account.</p>";
    $message = $message."<p>Alternatively copy and paste the below in to your browser address:<br><a href=\"localhost/btcupdate/activation.php?activation_id=$activation_id\">localhost/btcupdate/activation.php?activation_id=$activation_id </a></p>";
    $message = $message."<p style='margin-bottom: 60px'>Regards,<br>BitcoinEx.com Support</p>";
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
    $mail->Password="moshkay55";
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
        //echo "Message sent successfully";
    }
    //end mail

    
}else{
    if ((strpos(mysqli_error($mysqli),'username' != false))){
        echo("username");
    }else if(strpos(mysqli_error($mysqli),'email') != false){
        echo('email');
    }
    //echo(mysqli_error($mysqli));
}

?>