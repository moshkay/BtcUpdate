<?php
/**
 * Created by PhpStorm.
 * User: davinci
 * Date: 1/12/19
 * Time: 2:20 AM
 */
?>

<span class="c-divider has-text u-m-xsmall">Invoice Details</span>
<div class="row" >
    <div class="col-md-12 col-sm-12  u-border-rounded">
        <div class="u-mb-small c-profile-card u-border-rounded u-p-xsmall" >
                     <span style="font-size:1.5rem;">
                         <?php
                         if (isset($_GET['invoice_id'])){
                             $invoice_id = $_GET['invoice_id'];
                             echo "Invoice No. - ".$invoice_id;
                             $process = $_GET["process"];
                             if ($process == 'buy'){
                                 $query = "select * from buy where order_id ='$invoice_id'";
                             }elseif ($process =='sell'){
                                 $query = "select * from sell where invoice_id ='$invoice_id'";
                             }
                             //echo $query;
                             @ $query_run = mysqli_query($mysqli,$query);
                             if ($query_run){
                                 $row = mysqli_fetch_array($query_run);
                                 $creation_date = $row['creation_date'];
                                 $completed = $row['completed'];
                                 $email = $row['invoice_email_addy'];
                                 $E_currency = $row['E_currency'];
                                 $amount = $row['Amount'];

                                 //$creation_date = $row['creation_date'];
                                 //where to send the ecurrency details
                                 $query = "select ecurrency_details from admin where username = 'BITCOINEX'";
                                 @ $query_run = mysqli_query($mysqli,$query);
                                 if ($query_run) {
                                     $row = mysqli_fetch_array($query_run);
                                     $e_currency_details = $row['ecurrency_details'];
                                 }
                                 //bitcoin
                                 $query = "select * from e_currency where currency = '$E_currency'";
                                 @ $query_run = mysqli_query($mysqli,$query);
                                 if ($query_run) {
                                     $row = mysqli_fetch_array($query_run);
                                     $rate = $row['exchange_amount'];
                                     $total_amount = $rate*$amount;

                                 }
                             }

                         }else{
                             $time = time();
                             $today = getdate();
                             $date = $today['year']."-".$today['mon']."-".$today['mday'];

                             $invoice_id = md5($today['year'].$today['mon'].$today['mday']."$time");
                             echo "Invoice No. - ".$invoice_id;
                             //where to send the ecurrency details
                             $query = "select ecurrency_details from admin where username = 'admin'";
                             @ $query_run = mysqli_query($mysqli,$query);
                             if ($query_run) {
                                 $row = mysqli_fetch_array($query_run);
                                 $e_currency_details = $row['ecurrency_details'];

                             }
                             $creation_date = $date;
                             $completed = 'N';
                             $email = $_POST['email'];
                             $amount = $_POST['amount'];
                             $E_currency = $_POST['currency'];
                             $acct_details = $_POST['acct_details'];
                             //echo($acct_details);
                             //bitcoin
                             $query = "select * from e_currency where currency = '$E_currency'";
                             @ $query_run = mysqli_query($mysqli,$query);
                             if ($query_run) {
                                 $row = mysqli_fetch_array($query_run);
                                 $rate = $row['sell_exchange_amount'];
                                 $total_amount = $rate*$amount;

                             }
                             //insert query
                             $query = "insert into sell(e_currency,Amount,account_details,invoice_email_addy,username,completed,creation_date,invoice_id,upload_file_status,rate,total_amount_naira)";
                             $query = $query." values('$E_currency','$amount','$acct_details','$email','".$_SESSION['username']."','N','$creation_date','$invoice_id','N','$rate','$total_amount')";
                             @ $query_run = mysqli_query($mysqli,$query);
                             if ($query_run){
                                 //send mail\
                                 $subject="Sales Invoice for Order $invoice_id";
                                 $message ="<div style=\"border-width: 1px;text-align: center;font-size:0.4rem\">";
                                 $message = $message."<p>Sales Invoice for Order $invoice_id</p>";
                                 $message = $message. "<p>you recently requested to sell Bitcoin to BitcoinEx.</p>";
                                 $message = $message. "<p>Your invoice details are stated below:</p>";
                                 $message = $message. "<table border='1' cellspacing='0' cellpadding='0' style='text-align: center;font-size:0.4rem' width='100%'>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px'>Order Id</td>";
                                 $message = $message. "<td style='padding:2px'>$invoice_id</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>E-Currency</td>";
                                 $message = $message. "<td style='padding:2px>$E_currency</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Our E-Currency Details(where to send the E-currency)</td>";
                                 $message = $message. "<td style='padding:2px>$e_currency_details</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Email Address</td>";
                                 $message = $message. "<td style='padding:2px>$email</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Account Details</td>";
                                 $message = $message. "<td style='padding:2px>$acct_details</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Dollar Equivalent</td>";
                                 $message = $message. "<td style='padding:2px>$amount</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Rate</td>";
                                 $message = $message. "<td style='padding:2px>$rate</td>";
                                 $message = $message. "</tr>";
                                 $message = $message. "<tr>";
                                 $message = $message. "<td style='padding:2px>Total Amount (&#8358;)</td>";
                                 $message = $message. "<td style='padding:2px>&#8358; $total_amount</td>";
                                 $message = $message. "</tr>";

                                 $message = $message. "</table>";
                                 $message = $message. "Regards,<br />BitcoinEx Admin";
                                 $message = $message."<div style='background-color: orangered;height:60px;margin-top:60px;'><center><span>&copy;2019-BitcoinEx.com</span></center></div>";
                                 $message = $message. "</div>";
                                 //sending the mail
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
                                 //echo mysqli_error($mysqli);
                             }

                         }
                         ?>
                    </span>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-12 col-sm-2">
        <label class="c-field__label u-text-bold" for="amount">Invoice Details are stated below</label>
        <div  class="c-invoice__table">
            <table class="c-table">
                <tbody>
                <tr class="c-table__row ">
                    <td class="c-table__cell ">Order Id</td>
                    <td class="c-table__cell">
                        <?php
                        echo($invoice_id);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row ">
                    <td class="c-table__cell ">E-Currency</td>
                    <td class="c-table__cell">
                        <?php
                        echo($E_currency);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Our E-Currency Details(Where to send the E-Currency)</td>
                    <td class="c-table__cell">
                        <?php
                        echo($e_currency_details);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Email</td>
                    <td class="c-table__cell">
                        <?php
                        echo($email);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Dollar equivalent</td>
                    <td class="c-table__cell">
                        <?php
                        echo($amount);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Rate</td>
                    <td class="c-table__cell">
                        <?php
                        echo($rate);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Date</td>
                    <td class="c-table__cell">
                        <?php
                        echo($creation_date);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Total Amount (#)</td>
                    <td class="c-table__cell">
                        <?php
                        echo($total_amount);
                        ?>
                    </td>

                </tr>
                <tr class="c-table__row">
                    <td class="c-table__cell">Order Status</td>
                    <td class="c-table__cell">
                         <?php
                                echo($completed=='Y'?"Completed":"Pending");
                                ?>
                    </td>

                </tr>
                </tbody>
            </table>

        </div>
        <!--label class="c-field__label u-text-bold u-text-large" style= for="amount">Account Details are stated below</label-->
    </div>
    </center>


</div>

