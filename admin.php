<?php
ob_start();
session_start();
require_once("configdb.php");
if (!isset($_SESSION["username"])){
    header("Location:index.php");
}else{
    if ($_SESSION['username'] != 'BITCOINEX'){
        session_destroy();
        header("Location:index.php");
    }
}
?>

<!doctype html>

<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site|Admin </title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/main.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#updateAdmin').click(function (e) {
                e.preventDefault();
                document.getElementById('status').innerHTML ="";
                var username = $("#username").val();
                var password = $("#password").val();
                var repassword = $("#repeatpassword").val();
                var currency_id = $("#e_details").val();
                var bank_name = $("#bank_name").val();
                var acct_name = $("#acct_name").val();
                var acct_number = $("#acct_no").val();
                $.ajax({
                    type:"POST",
                    url:"testimony_submit.php",
                    data:{username:username,password:password,
                        repassword:repassword,file:"adminSettings",
                        currency_id:currency_id,acct_number:acct_number,acct_name:acct_name,bank_name:bank_name},
                    success:function(result){
                        //alert(result);
                        if (result == 'settingssuccess'){
                            document.getElementById('status').innerHTML = 'Profile updated successfully.';
                            //alert("success block");
                        }else{

                            document.getElementById('status').innerHTML="Profile could not be updated";
                        }
                    },
                    error:function(xhr,ajaxOptions,thrownError){
                        //alert(thrownError);

                        // alert("an error occured"+xhr.statusText);
                        //alert("errot block sd");'
                        return false;
                    }

                });
            });

            $('#currencySubmit').click(function (e) {
                e.preventDefault();

                document.getElementById('status').innerHTML ="";
                var currency_type = $("#currency_type").val();
                var price_type =$('#price_type').val();
                var rate = $("#rate").val();
                $.ajax({
                    type:"POST",
                    url:"testimony_submit.php",
                    data:{currency_type:currency_type,rate:rate,file:"currencySettings",price_type:price_type},
                    success:function(result){
                        //alert(result);
                        if (result == 'settingssuccess'){
                            document.getElementById('status').innerHTML = 'Currency updated successfully.';
                            //alert("success block");
                        }else{

                            document.getElementById('status').innerHTML="Currency could not be updated";
                        }
                    },
                    error:function(xhr,ajaxOptions,thrownError){
                        //alert(thrownError);

                        // alert("an error occured"+xhr.statusText);
                        //alert("errot block sd");'
                        return false;
                    }

                });
            });
            $('.approve').click(function (e) {
                e.preventDefault();
                var objectId = this.id;
                //alert(objectId);
                var main_id = objectId.split('+')[1];
                var process = objectId.split('+')[0];
                choice = confirm("Are you sure you want to approve this order");
                if (choice){
                    //alert(main_id);
                    document.getElementById('status').innerHTML ="";

                    $.ajax({
                        type:"POST",
                        url:"testimony_submit.php",
                        data:{item_id:main_id,file:"approve",process:process},
                        success:function(result){
                            //alert(result);
                            if (result == 'settingssuccess'){
                                document.getElementById('status').innerHTML = 'Order approved successfully.';
                                location.reload();
                                //alert("success block");
                            }else{

                                document.getElementById('status').innerHTML="Order could not be approved";
                            }
                        },
                        error:function(xhr,ajaxOptions,thrownError){
                            //alert(thrownError);

                            // alert("an error occured"+xhr.statusText);
                            //alert("errot block sd");'
                            return false;
                        }

                    });
                }

            });
        });
    </script>
    <script>
        function showpassword(){
            x = document.getElementById("password");
            if (x.type="password"){
                x.type="text";
            }else{
                x.type="password";
            }
        }

    </script>
</head>
<body class="o-page">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="o-page__sidebar is-minimized js-page-sidebar">
    <div class="c-sidebar is-minimized">
        <a class="c-sidebar__brand" href="index.php">
            <img class="c-sidebar__brand-img" src="img/logo.png" alt="Logo">
            <span class="c-sidebar__brand-text">BitcoinEx</span>
        </a>
        <ul class="c-sidebar__list">
            <li class="c-sidebar__item">
                <a class="c-sidebar__link is-active" href="#">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-home"></i>
                            </span>Dashboard
                </a>
            </li>



            <li class="c-sidebar__item">
                <a class="c-sidebar__link" target="_blank" href="#">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-signout"></i>
                            </span>
                    <form method="POST" action="#">
                        <button class="c-btn" name="logout" type="submit">Logout</button>
                    </form>
                    <?php
                    if(isset($_POST['logout'])){
                        session_destroy();
                        header("location:index.php");

                    }
                    ?>
                </a>
            </li>
        </ul>

    </div><!-- // .c-sidebar -->
</div><!-- // .o-page__sidebar -->

<main class="o-page__content">
    <header class="c-navbar u-mb-medium">
        <button class="c-sidebar-toggle u-mr-small">
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
            <span class="c-sidebar-toggle__bar"></span>
        </button><!-- // .c-sidebar-toggle -->

        <?php

        echo("<h2 class=\"c-navbar__title u-mr-auto\">Welcome ".$_SESSION['username']." Admin,</h2>");
        ?>



        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="c-avatar__img" src="img/avatar-72.jpg" alt="User's Profile Picture">
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
            <form method="POST" action="#">
            <button class="c-dropdown__item dropdown-item" name="logout" type="submit">Log out</button>
            </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">


        <span class="c-divider has-text u-m-xsmall">Registered Users</span>
        <div class="row">
        <div class="col-sm-8 col-lg-12 col-md-12 c-profile-card">
            <div class="u-color-success">
                                <span id="status">

                                </span>

            </div>

        </div>

    </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="c-tabs">
                    <ul class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
                        <li><a class="c-tabs__link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">All Users</a></li>
                        <li><a class="c-tabs__link" id="buyorders-tab" data-toggle="tab" href="#buyorders" role="tab" aria-controls="buyorders" aria-selected="false">Purchase Orders</a></li>
                        <li><a class="c-tabs__link" id="sellorders-tab" data-toggle="tab" href="#sellorders" role="tab" aria-controls="sellorders" aria-selected="false">Sale Orders</a></li>
                        <li><a class="c-tabs__link" id="ecurrency-tab" data-toggle="tab" href="#ecurrency" role="tab" aria-controls="ecurrency" aria-selected="false">E-Currency Updates</a></li>
                        <li><a class="c-tabs__link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin Details Update</a></li>
                    </ul>
                    <div class="c-tabs__content tab-content" id="nav-tabContent" style="overflow:auto;">
                        <div class="c-tabs__pane active" id="users" role="tabpanel" aria-labelledby="users-tab" style="overflow: auto;">
                            <table class="c-table">
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">sn</th>
                                    <th class="c-table__cell c-table__cell--head">Username</th>
                                    <th class="c-table__cell c-table__cell--head">E-mail</th>
                                    <th class="c-table__cell c-table__cell--head">Name</th>
                                    <!--th class="c-table__cell c-table__cell--head">password</th-->
                                    <th class="c-table__cell c-table__cell--head">Date Created</th>
                                    <th class="c-table__cell c-table__cell--head">Phone No.</th>
                                    <th class="c-table__cell c-table__cell--head">Address</th>
                                    <th class="c-table__cell c-table__cell--head">Confimation Stat.</th>
                                    <!--th class="c-table__cell c-table__cell--head">Block</th-->
                                </tr>
                                </thead>
                                <tbody>


                                <?php
                                $sn = 1;
                                $query = "select * from users";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    while ($row = mysqli_fetch_array($query_run)){
                                        $status = $row['status'] == 'V'?'Activated':'Not Activated';
                                        echo('<tr class="c-table__row">');
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$sn</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['username']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['email']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['firstname']." ".$row['lastname']."</td>");
                                        //echo("<td class=\"c-table__cell c-table__cell--head\">".$row['password']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['reg_date']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['phoneNo']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['addy']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$status."</td>");
                                        //echo("<td class=\"c-table__cell c-table__cell--head\"><input type='checkbox' id=\"".$row['id']."\"></td>");
                                        echo("</tr>");
                                        $sn+=1;
                                    }
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="c-tabs__pane" id="buyorders" role="tabpanel" aria-labelledby="buyorders-tab" style="overflow: auto;">
                            <table class="c-table">
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">sn</th>
                                    <th class="c-table__cell c-table__cell--head">Order Id</th>
                                    <th class="c-table__cell c-table__cell--head">Username</th>
                                    <th class="c-table__cell c-table__cell--head">E-currency Type</th>
                                    <th class="c-table__cell c-table__cell--head">E-currency Detail</th>
                                    <th class="c-table__cell c-table__cell--head"> Rate</th>
                                    <th class="c-table__cell c-table__cell--head">Amount</th>
                                    <th class="c-table__cell c-table__cell--head">Total</th>
                                    <th class="c-table__cell c-table__cell--head">Creation Date</th>
                                    <th class="c-table__cell c-table__cell--head">Completion Date</th>
                                    <th class="c-table__cell c-table__cell--head">Status</th>
                                    <th class="c-table__cell c-table__cell--head">Approve</th>
                                </tr>
                                </thead>

                                <?php
                                $sn = 1;
                                $query = "select * from buy";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    while ($row = mysqli_fetch_array($query_run)){
                                        $status = $row['completed']=='N'?'pending':'completed';
                                        $button = $row['completed']=='N'?"<a class='c-btn approve' id=\"buy+".$row['id']."\">Approve</a>":"<a class='c-btn is-disabled' id=\"".$row['id']."\">Approved</a>";
                                        echo('<tr class="c-table__row">');
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$sn</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['order_id']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['username']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['E_currency']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['e_currency_details']."</td>");
                                        //echo("<td class=\"c-table__cell c-table__cell--head\">".$row['password']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['rate']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['Amount']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['total_amount_naira']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['creation_date']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['completion_date']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$status."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$button</td>");
                                        echo("</tr>");
                                        $sn+=1;
                                    }
                                }

                                ?>
                            </table>
                        </div>
                        <div class="c-tabs__pane" id="sellorders" role="tabpanel" aria-labelledby="sellorders-tab" style="overflow: auto;">
                            <table class="c-table">
                                <thead class="c-table__head c-table__head--slim">
                                <tr class="c-table__row">
                                    <th class="c-table__cell c-table__cell--head">sn</th>
                                    <th class="c-table__cell c-table__cell--head">Order Id</th>
                                    <th class="c-table__cell c-table__cell--head">Username</th>
                                    <th class="c-table__cell c-table__cell--head">E-currency Type</th>
                                    <th class="c-table__cell c-table__cell--head">Account Detail</th>
                                    <th class="c-table__cell c-table__cell--head"> Rate</th>
                                    <th class="c-table__cell c-table__cell--head">Amount</th>
                                    <th class="c-table__cell c-table__cell--head">Total</th>
                                    <th class="c-table__cell c-table__cell--head">Creation Date</th>
                                    <th class="c-table__cell c-table__cell--head">Completion Date</th>
                                    <th class="c-table__cell c-table__cell--head">Status</th>
                                    <th class="c-table__cell c-table__cell--head">Approve</th>
                                </tr>
                                </thead>

                                <?php
                                $sn = 1;
                                $query = "select * from sell";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    while ($row = mysqli_fetch_array($query_run)){
                                        $status = $row['completed']=='N'?'pending':'completed';
                                        $button = $row['completed']=='N'?"<a  class='c-btn approve' id=\"sell+".$row['id']."\">Approve</a>":"<a class='c-btn is-disabled' id=\"".$row['id']."\">Approved</a>";
                                        echo('<tr class="c-table__row">');
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$sn</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['invoice_id']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['username']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['E_currency']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['account_details']."</td>");
                                        //echo("<td class=\"c-table__cell c-table__cell--head\">".$row['password']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['rate']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['Amount']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['total_amount_naira']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['creation_date']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['completion_date']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$status."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$button</td>");
                                        echo("</tr>");
                                        $sn+=1;
                                    }
                                }

                                ?>
                            </table>
                        </div>
                        <div class="c-tabs__pane" id="ecurrency" role="tabpanel" aria-labelledby="ecurrency-tab">
                            <form>
                                <div class="col-sm-6 col-md-12 c-field u-mb-medium">

                                    <label class="c-field__label" for="select1">E-Currency Type</label>

                                    <!-- Select2 jquery plugin is used -->
                                    <select class="c-select" id="currency_type">
                                        <option value="bitcoin">Bitcoin</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-12 c-field u-mb-medium">

                                    <label class="c-field__label" for="select1">Operation Price</label>

                                    <!-- Select2 jquery plugin is used -->
                                    <select class="c-select" id="price_type">
                                        <option value="">Select Price type</option>
                                        <option value="buy_exchange_amount">Buy Price</option>
                                        <option value="sell_exchange_amount">Sell Price</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="rate" >Rate</label>
                                        <input class="c-input" type="text" id="rate" placeholder="Rate" required>
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small>

                                    </div>
                                </div>
                                <center>
                                    <button class="c-btn c-btn--info c-toggle__btn" type="submit" id="currencySubmit">Submit</button>
                                </center>
                            </form>


                        </div>
                        <div class="c-tabs__pane" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <form>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="username" >Admin Username</label>
                                        <input class="c-input" type="text" value="BITCOINEX" id="username" placeholder="BITCOINEX" disabled required>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="acct_name" >Account Name</label>
                                        <input class="c-input" type="text" value="" id="acct_name" placeholder="Your Bank Account Name">
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="acct_no" >Account Number</label>
                                        <input class="c-input" type="text" value="" id="acct_no" placeholder="Your Bank Account Number">
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="bank_name" >Bank Name</label>
                                        <input class="c-input" type="text" value="" id="bank_name" placeholder="Your Bank Name">
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="e_details" >E-Currency Details</label>
                                        <input class="c-input" type="text" value="" id="e_details" placeholder="Wallet Id">
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="password" >Admin Password</label>
                                        <input class="c-input" type="password" id="password" placeholder="password" >
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>Leave empty if you dont want it to change
                                        </small><br>
                                        <small class="c-field__message">
                                            <input type="checkbox" onclick="showpassword()">Show Password
                                        </small>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12 u-mb-small">
                                    <div class="c-field">
                                        <label class="c-field__label" for="repeatpassword" >Confirm Password</label>
                                        <input class="c-input" type="text" id="repeatpassword" placeholder="Confirm Password" >
                                        <small class="c-field__message">
                                            <i class="fa fa-info-circle"></i>This is a required field
                                        </small>
                                    </div>
                                </div>
                                <center>
                                    <button class="c-btn c-btn--info c-toggle__btn" type="submit" id="updateAdmin">Process</button>
                                </center>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div><!-- // .container -->

</main><!-- // .o-page__content -->

<script src="js/main.min.js"></script>
</body>
</html>
