
<!doctype html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
ob_start();
session_start();
require_once("configdb.php");
require_once "PHPMailerAutoload.php";
if (!isset($_SESSION["username"])){
    header("Location:index.php");
}


?>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Site|Invoice</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/main.min.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#download').click(function(){

                var divContents = $("#pdf").html();
                //alert(divContents);
                var printWindow = window.open('','','height=400,width=800');
                printWindow.document.write('<html><head><title>invoice file</title><link rel="stylesheet" href="css/main.min.css"></head><body>');
                printWindow.document.write(divContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
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
                <a class="c-sidebar__link" href="buy.php">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-file-o"></i>
                            </span>Buy E-Currency
                </a>
            </li>

            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="sell.php">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-send"></i>
                            </span>Sell E-currency
                </a>
            </li>

            <li class="c-sidebar__item">
                <a class="c-sidebar__link" href="history.php">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-th"></i>
                            </span>Transaction History
                </a>
            </li>

            <li class="c-sidebar__item">
                <a class="c-sidebar__link" target="_blank" href="testimony.php">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-comment"></i>
                            </span>Testimony
                </a>
            </li>

            <li class="c-sidebar__item">
                <a class="c-sidebar__link" target="_blank" href="settings.php">
                            <span class="c-sidebar__icon">
                                <i class="fa fa-wrench"></i>
                            </span>Account Settings
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

        echo("<h2 class=\"c-navbar__title u-mr-auto\">Welcome ".$_SESSION['username']."</h2>");
        ?>



        <div class="c-dropdown dropdown">
            <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="c-avatar__img" src="img/avatar-72.jpg" alt="User's Profile Picture">
            </a>

            <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                <a class="c-dropdown__item dropdown-item" href="settings.php">Edit Profile</a>
            </div>
        </div>
    </header>

    <div class="container-fluid" id="pdf">
        <?php

        if ($_SESSION['status']!="V"){
            echo("<div class=\"row\">");
            echo("<div class=\"col-sm-8 col-lg-12 col-md-12 c-profile-card\" style=\"margin:20px\">");
            echo("<div class=\"c-state--info\" style=\"margin:20px;padding:20px\">");
            echo("<span style=\"color:#7f8fa4\">");
            echo("Your Account has not been activated. if you want to activate click <a href=\"activation.php?activation_id=".$_SESSION['activation_id']."\">here</a>");
            echo("</span>");
            echo("</div>");

            echo("</div>");
            echo("</div>");
        }

        if ($_GET['process'] == "sell"){
            include("sell_invoice.php");
        }elseif ($_GET['process'] == 'buy'){
            include('buy_invoice.php');
        }
/**
        if ($_FILES['file']){
            $image_name = $_FILES['file']["name"];
            $imgagetmp = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $query = "update buy set upoad_file='$imagetmp' where order_id='$invoice_id'";
            @ $query_run = mysqli_query($mysqli,$query);
            if ($query_run){
                echo "<script>alert('image uploaded successfully')</script>";
            }else{
                echo "<script>alert('image not uploaded')</script>";
            }
        }*/

        ?>





    </div><!-- // .container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <center>
                    <button class="fa fa-download c-btn" id="download">Download</button>
                    <!--?php/**
                        if ($_GET['process'] == "buy"){
                            echo "<button data-toggle='modal' data-target='#uploadmodal' class=\"fa fa-upload c-btn\" id=\"upload\">Upload</button>";
                        }*/
                    ?-->
                </center>
            </div>

        </div>
        <div class="c-modal c-modal--small modal fade" id="uploadmodal" tabindex="-1" role="dialog" aria-labelledby="uploadmodal" data-backdrop="static">
            <div class="c-modal__dialog modal-dialog" role="document">
                <div class="c-modal__content">

                    <div class="c-modal__header">
                        <h3 class="c-modal__title">Upload Proof of Payment</h3>

                        <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-close"></i>
                                    </span>
                    </div>

                    <div class="c-modal__body">
                        <form action="/file-upload" class="dropzone u-mb-small" id="modal-dropzone" style="height: 180px;">
                            <div class="dz-message" data-dz-message>
                                <i class="dz-icon fa fa-cloud-upload"></i>
                                <span>Drag a file here or browse for a file to upload.</span>
                            </div>

                            <div class="fallback">
                                <input name="file" type="file">
                            </div>
                        </form>
                    </div>

                    <div class="c-modal__footer u-justify-center">
                        <a class="c-btn c-btn--success" href="#">Submit</a>
                    </div>

                </div>
            </div>
    </div>

    </div>

</main>

<script src="js/main.min.js"></script>
</body>
</html>
