
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
        <title>Site|Settings</title>
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
                $('#submit').click(function (e) {
                    e.preventDefault();

                    var location = $("#addy").val();
                    var password = $("#password").val();
                    var repassword = $("#repeatpassword").val();
                    $.ajax({
                        type:"POST",
                        url:"testimony_submit.php",
                        data:{location:location,password:repassword,repassword:repassword,file:"settings"},
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
                        <a class="c-sidebar__link" href="#">
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
                        <a class="c-sidebar__link is-active" target="_blank" href="settings.php">
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

                <span class="c-divider has-text u-mb-medium">Update Profile</span>
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
                <div class=""row">
                    <div class="col-sm-8 col-lg-12 col-md-12 c-profile-card">
                        <div class="u-color-success">
                                <span id="status">

                                </span>

                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10">
                        <form class="c-card__body" id="updateForm" >
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="addy">Location</label> 
                                <textarea class="c-input" type="text" name="addy" id="addy">
                                    <?php
                                    echo($_SESSION['addy']);
                                    ?>
                                </textarea>
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="password">Password(Leave password blank to retain current password)</label> 
                                <input class="c-input" type="password" name="password" id="password">
                            </div>
                            <div class="c-field u-mb-small">
                                <label class="c-field__label" for="repeatpassword">Confirm Password</label> 
                                <input class="c-input" type="password" name="repeatpassword" id="repeatpassword">
                            </div>
                            <center>
                                <button class="c-btn c-btn--info c-toggle__btn" type="submit" id="submit">Process</button>
                            </center>
                        </form>
                    
                    </div>
                </div>
                

            </div><!-- // .container -->
            
        </main><!-- // .o-page__content -->
        
        <script src="js/main.min.js"></script>
    </body>
</html>