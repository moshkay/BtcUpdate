
<!doctype html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
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
        <title>Site|Transaction History</title>
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
                        <a class="c-sidebar__link" href="dashboard.php">
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
                        <a class="c-sidebar__link is-active" href="history.php">
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
                    ?>
                <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h4 class="u-mb-medium">Tabs</h4>

                    <div class="c-tabs"> 
                        <ul class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
                            <li><a class="c-tabs__link active" id="purchased-tab" data-toggle="tab" href="#purchased" role="tab" aria-controls="purchased" aria-selected="true">Purchased</a></li>
                            <li><a class="c-tabs__link" id="sold-tab" data-toggle="tab" href="#sold" role="tab" aria-controls="sold" aria-selected="false">Sold</a></li>
                        </ul>
                        <div class="c-tabs__content tab-content" id="nav-tabContent">
                            <div class="c-tabs__pane active" id="purchased" role="tabpanel" aria-labelledby="purchased-tab">
                            <table class="c-table">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head">sn</th>
                                        <th class="c-table__cell c-table__cell--head">Order Id</th>
                                        <th class="c-table__cell c-table__cell--head">E-currency Type</th>
                                        <th class="c-table__cell c-table__cell--head">Amount</th>
                                        <th class="c-table__cell c-table__cell--head">Total</th>
                                        <th class="c-table__cell c-table__cell--head">Status</th>
                                        <th class="c-table__cell c-table__cell--head">View</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php
                                $sn = 1;
                                $query = "select * from buy where username ='".$_SESSION['username']."' order by creation_date asc";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    ;
                                    while ($row = mysqli_fetch_array($query_run)){
                                        echo('<tr class="c-table__row">');
                                            echo("<td class=\"c-table__cell c-table__cell--head\">$sn</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['order_id']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['E_currency']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['Amount']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['total_amount_naira']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['completed']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\"><a class=\"c-btn\" href=process.php?process=buy&invoice_id=".$row['order_id'].">View</a></td>");
                                        echo("</tr>");
                                       $sn+=1;
                                    }
                                }

                                ?>


                                </tbody>
                            </table>
                            </div>
                            <div class="c-tabs__pane" id="sold" role="tabpanel" aria-labelledby="sold-tab">
                            <table class="c-table">
                                <thead class="c-table__head c-table__head--slim">
                                    <tr class="c-table__row">
                                        <th class="c-table__cell c-table__cell--head">sn</th>
                                        <th class="c-table__cell c-table__cell--head">Order Id</th>
                                        <th class="c-table__cell c-table__cell--head">E-currency Type</th>
                                        <th class="c-table__cell c-table__cell--head">Amount</th>
                                        <th class="c-table__cell c-table__cell--head">Total</th>
                                        <th class="c-table__cell c-table__cell--head">Status</th>
                                        <th class="c-table__cell c-table__cell--head">View</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php
                                $sn = 1;
                                $query = "select * from sell where username ='".$_SESSION['username']."' order by creation_date asc";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    ;
                                    while ($row = mysqli_fetch_array($query_run)){
                                        echo('<tr class="c-table__row">');
                                        echo("<td class=\"c-table__cell c-table__cell--head\">$sn</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['invoice_id']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['E_currency']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['Amount']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['total_amount_naira']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\">".$row['completed']."</td>");
                                        echo("<td class=\"c-table__cell c-table__cell--head\"><a class=\"c-btn\" href=process.php?process=sell&invoice_id=".$row['invoice_id'].">View</a></td>");
                                        echo("</tr>");
                                        $sn+=1;
                                    }
                                }

                                ?>


                                </tbody>
                            </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                

            </div><!-- // .container -->
            
        </main><!-- // .o-page__content -->
        
        <script src="js/main.min.js"></script>
    </body>
</html>