
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
                        <a class="c-sidebar__link is-active" href="sell.php">
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
            
                    <?php
                    
                    if ($_SESSION['status']!="V"){
                        echo("<div class=\"row\">");
                        echo("<div class=\"col-sm-8 col-lg-12 col-md-12 c-profile-card\" style=\"margin:20px\">");
                        echo("<div class=\"c-state--info\" style=\"margin:20px;padding:20px\">");
                        echo("<span style=\"color:#7f8fa4\">");
                        echo("Your Account has not been activated. if you want to activate click <a href=\"activation.php?".$_SESSION['activation_id']."\">here</a>");
                        echo("</span>");
                        echo("</div>");
                        
                        echo("</div>");
                        echo("</div>");
                    }
                    ?>
                    
                <span class="c-divider has-text u-m-xsmall">Sell E-Currency</span>

                <div class="row">
                    <div class="col-md-10 col-sm-10">
                        <form class="c-card__body" method="POST" action="process.php?process=sell">
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="input1">E-Currency</label> 
                                <!--input class="c-input" type="email" id="input1" placeholder="clark@dashboard.com"--> 
                                <select class="c-select" name="currency" id="currency" required>
                                <option value="">Select E-currency</option>
                                <?php
                                $query="select * from e_currency";
                                @ $query_run = mysqli_query($mysqli,$query);
                                if ($query_run){
                                    if (mysqli_num_rows($query_run)>0){
                                        while( $row=$query_run->fetch_assoc()){
                                            echo("<option value=\"".$row['currency']."\">".$row['currency']."-->".$row["exchange_amount"]."</option>");
                                        }
                                    }
                                }
                                ?>
                                </select>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="amount">Amount</label>
                                <input class="c-input" name="amount" type="text" id="amount" placeholder="Enter the equivalence of E-currency" required>
                                <small class="c-field__message">
                                    <i class="fa fa-info-circle"></i>This is a required field
                                </small>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="acct_details">Account Details(Account name,Number and bank on different lines)</label> 
                                <textarea class="c-input" name="acct_details" id="acct_details" cols="30" rows="2" required placeholder="Enter your Account details"></textarea>
                                <small class="c-field__message">
                                    <i class="fa fa-info-circle"></i>This is a required field
                                </small>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="email">Invoice Email</label> 
                                <?php
                                echo("<input class=\"c-input\" type=\"email\" name=\"email\" id=\"email\" placeholder=\"".$_SESSION['email']."\" required>");
                                ?>
                                <small class="c-field__message">
                                    <i class="fa fa-info-circle"></i>This is a required field
                                </small>
                            </div>
                            <center>
                            <button class="c-btn c-btn--info c-toggle__btn" type="submit">Process</button>
                            </center>

                        </form>
                        <span class="c-divider has-text u-mb-large">Tips</span>
                    
                    </div>
                </div><!-- // .row -->

                <div class="row">
                   <div class="col-md-6" style="margin:20px">
                    <ul style="list-style-type:disc;color:#7f8fa4;">
                        <li>Select the E-Currency type you want to sell from the list</li>
                        <li>Enter the Dollar Equivalent</li>
                        <li>Enter your Account Details</li>
                        <li>Enter your Email address to receive a custom invoice</li>
                        <li>Click on Process to confirm the transaction</li>
                        <li>Send the E-Currency to our E-Currency Details in the invoice</li>

                    </ul>
                   </div> 
                </div><!-- // .row -->

            </div><!-- // .container -->
            
        </main><!-- // .o-page__content -->
        
        <script src="js/main.min.js"></script>
    </body>
</html>
