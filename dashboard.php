
<!doctype html>
<?php
ob_start();
session_start();
require_once("configdb.php");
if (!isset($_SESSION["username"])){
    header("Location:index.php");
}
?>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Site|Dashboard</title>
        <meta name="description" content="Dashboard">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/main.min.css">
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

            <div class="container-fluid">




                <div class="row">
                 
                 <div class="col-xs-12 col-md-12">
                     <span class="c-divider has-text u-m-xsmall">User Details</span>
                <!--div  class="c-invoice__table" style="margin-left:50%;overflow: auto;"-->
                    <table class="c-table" style="overflow:auto;">
                        <tbody>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Username</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["username"]);
                                ?>
                                </td>
                                
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Name</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["lastname"]." ".$_SESSION["firstname"]);
                                ?>
                                </td>
                                
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Email</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["email"]);
                                ?>
                                </td>
                                
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Phone Number</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["phoneNo"]);
                                ?>
                                </td>
                                
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Address</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["addy"]);
                                ?>
                                </td>
                                
                            </tr>
                            <tr class="c-table__row">
                                <td class="c-table__cell">Member since</td>
                                <td class="c-table__cell">
                                <?php
                                echo($_SESSION["reg_date"]);
                                ?>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <!--/div-->
                </div>
                 </center>   
                
                
                </div>
                

            </div><!-- // .container -->
            
        </main><!-- // .o-page__content -->
        
        <script src="js/main.min.js"></script>
    </body>
</html>