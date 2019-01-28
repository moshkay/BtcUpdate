<!doctype html>
<?php
ob_start();
session_start();
require_once("configdb.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,">
	
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	
	<link rel="stylesheet" href="btc.css" type='text/css'>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

</head>
<script src="js/jquery.min.js"></script>
<script>
//reg
$(document).ready(function(){
    $('#reg-submit').click(function(e){
        e.preventDefault();
        var password=$('#password').val();
        var repassword=$('#repeatpassword').val();
        var firstname=$('#firstname').val();
        var lastname=$('#lastname').val();
        var address=$('#addy').val();
        var email=$('#email').val();
        var username=$('#username').val();
        var phoneno=$('#phoneno').val();
        
        if (repassword){
            
            if (password != repassword){
                alert("passwords does not match");
            }else{
                document.getElementById('loading').style.display='block';
                window.location.href="#loading";

                $.ajax({
                    type:"POST",
                    url:"signin.php",
                    data:{firstname:firstname,lastname:lastname,address:address,email:email,username:username,phoneno:phoneno,password:password},
                    success:function(result){
                        if (result == 'success'){
                            document.getElementById('loading').style.display='none';
                            alert("Registration Successful, You can now log-in");
                        }else{
                            if (result =='email'){
                                alert("Error: Email already exists!");
                                document.getElementById('loading').style.display='none';
                            }else{
                                alert("Error: Username already exists!");
                                document.getElementById('loading').style.display='none';
                            }
                            
                        }
                    },
                    error:function(xhr){
                        alert("an error occured"+xhr.statusText)
                    }
                });
            }
        }

    });
    $("#submit").click(function(e){
        e.preventDefault();
        var password = $('#login-password').val();
        var username = $('#login-username').val();

        if (password){
            $.ajax({
                type:"POST",
                url:"login.php",
                data:{username:username,password:password},
                success:function(result){
                        if (result == 'success'){
                            alert("Login Successful");
                            window.location="dashboard.php";
                        }else if(result == 'admin'){
                            alert("Login Successful");
                            window.location="admin.php";
                        }else if (result == 'activate'){
                            alert("Please, activate BitcoinEx Account from your email account")
                        }else{
                            alert("Error: Incorrect Username or Password!!!")
                            
                        }
                    },
                    error:function(xhr){
                        alert("an error occured"+xhr.statusText)
                    }

            })
        }
     });

     $('#forget_submit').click(function(e){
        e.preventDefault();
        var name = $('#forget_name').val();
        var email = $('#forget_email').val();
        if ((name) &&(email)){
            $.ajax({
                type:"POST",
                url:"testimony_submit.php",
                data:{name:name,email:email,file:"reset"},
                success:function(result){
                        if (result == 'success'){
                            alert("An Email has been sent to the email address");
                        }else{
                            alert("Error: Incorrect Username or Email Address!!!")
                            
                        }
                    },
                    error:function(xhr){
                        alert("an error occured"+xhr.statusText)
                    }

            })
        }

     })
});

function showpassword(){
 x = document.getElementById("password");
 if (x.type="password"){
     x.type="text";
 }else{
     x.type="password";
 }
}

</script>



<body>

<nav class='navbar navbar-default navbar-fixed-top'  style='margin-bottom:0px;'>

<div class='navbar-header'>
<a href='#' class='navbar-brand' style='color:#6a1b9a'>BitcoinEx</a>

<button class='navbar-toggle' data-target='.navbar-collapse' data-toggle='collapse'>

<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>

</button>
</div>
<div class='container'>
<div class='navbar-collapse collapse'>

<ul class='nav navbar-nav navbar-right'>
<li><a href='#'></a></li>
<li><a href='#'><i class="fa fa-facebook"></i></a></li>
<li><a href='#'><i class="fa fa-phone-square"></i></a></li>
<li><a href='#'><i class="fa fa-twitter"></i></a></li>
<li><a href='#'><i class="fa fa-instagram"></i></a></li>

</ul>
</div>
</div>
</nav>

 <div class='jumbotron text-center' >
 <div class='jumbo-elements'>
 <h2 class='text-center'>Naija number 1 <span class='btc-logo'><img src='img/img1.jpg'></span>  Trade <span class='under-border'>Network</span></h2>
 
 <a data-toggle='modal' data-target='#mylogin' class='btn'>sign in</a>
 <a data-toggle='modal' data-target='#mymodal' class='btn'>Create an account</a>
 </div>
</div> 

<div class='modal fade' id='mymodal' tabindex='-1' role='dialog' aria-hidden='true'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header' id="loadinghead">
<h1 class='text-center'>SIGN UP FOR FREE</h1>
    <center>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom" style="display: none" id="loading"></i>
        <span class="sr-only">Loading...</span>
    </center>

</div>
<div class='modal-body'>
<form class='form-horizontal' role='form' id="reg-form" action="" method="post">
<div class='form-group'>
<label for='firstname' class='col-xs-2 control-label'>Firstname</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='firstname' placeholder='Enter your Firstname' required>
</div>
</div>
<div class='form-group'>
<label for='lastname' class='col-xs-2 control-label'>Lastname</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='lastname' placeholder='Enter your Lastname' required>
</div>
</div>
<div class='form-group'>
<label for='phoneno' class='col-xs-2 control-label'>Phone Number</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='phoneno' placeholder='Enter your Phone Number' required>
</div>
</div>
<div class='form-group'>
<label for='addy' class='col-xs-2 control-label'>Contact Address</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='addy' placeholder='Enter your address' required>
</div>
</div>

<div class='form-group'>
<label for='username' class='col-xs-2 control-label'>Username</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='username' placeholder='Enter your username' required>
</div>
</div>

<div class='form-group'>
<label for='email' class='col-xs-2 control-label'>Email</label>
<div class='col-xs-10'>
<input type='email' class='form-control' id='email' placeholder='eg.wellmade@gmail.com' required>
</div>
</div>

<div class='form-group'>
<label for='password' class='col-xs-2 control-label'>Password</label>
<div class='col-xs-10'>
    <input type='password' class='form-control' id='password' placeholder='Enter your password' required>
</div>
</div>
    <div class='form-group'>
        <label class='col-xs-2 control-label'></label>
        <div class='col-xs-1'>
            <input type="checkbox" id="showPassword" class='form-control' onclick="showpassword()">
        </div>
        <label for='showPassword' class='col-xs-3'>Show Password</label>
    </div>

<div class='form-group'>
<label for='repeatpassword' class='col-xs-2 control-label'>Repeat Password</label>
<div class='col-xs-10'>
<input type='password' class='form-control' id='repeatpassword' placeholder='repeat your password' required>
</div>
</div>

</div>
<div class='modal-footer'>
<button id='reg-submit' type='submit' value='submit' class='btn btn-primary' >Submit</button>
<button type='button' class='btn btn-danger' data-dismiss='modal'>close</button>
</form>
</div>
</div>

</div>

</div>

<div class='modal fade' id='mylogin' tabindex='-1' role='dialog' aria-hidden='true'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header'>
<h1 class='text-center'>SIGN IN</h1>
</div>
<div class='modal-body'>
<form class='form-horizontal' action="<?php $_PHP_SELF?>" role='form'>
<div class='form-group'>
<label for='login-username' class='col-xs-2 control-label'>Username</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='login-username' placeholder='Enter your Username' required>
</div>
</div>

<div class='form-group'>
<label for='login-password' class='col-xs-2 control-label'>Password</label>
<div class='col-xs-10'>
<input type='password' class='form-control' id='login-password' placeholder='Enter your password' required>
<a href='#' data-toggle='modal' data-target='#Retrievepassword' class='text-left'>forgot password?</a>
</div>
</div>



</div>
<div class='modal-footer'>
<input name='submit' type='submit' id='submit' value='submit' class='btn btn-primary'>
<button type='button' class='btn btn-danger' data-dismiss='modal'>close</button>

</form>
</div>
</div>

</div>

</div>

<div class='modal fade' id='Retrievepassword' tabindex='-1' role='dialog' aria-hidden='true'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header'>
<h1 class='text-center'>RETRIEVE PASSWORD</h1>
</div>
<div class='modal-body'>
<form class='form-horizontal' role='form'>
<div class='form-group'>
<label for='name' class='col-xs-2 control-label'>Username</label>
<div class='col-xs-10'>
<input type='text' class='form-control' id='forget_name' placeholder='Enter your name' required>
</div>
</div>

<div class='form-group'>
<label for='email' class='col-xs-2 control-label'>Email</label>
<div class='col-xs-10'>
<input type='email' class='form-control' id='forget_email' placeholder='eg.wellmade@gmail.com' required>
</div>
</div>


</div>
<div class='modal-footer'>
<input name='submit' type='submit' id='forget_submit' value='submit' class='btn btn-primary'>
<button type='button' class='btn btn-danger' data-dismiss='modal'>close</button>
</form>
</div>
</div>

</div>

</div>
<nav class='navbar navbar-inverse text-center' style='border-radius:0px;'>
<h4 style='color:white;'>BUY BTC: #375/$  SELL BTC: #340/$</h4>
</nav>



<div class='container'>
<h1>BTC CALCULATOR HERE</h1>
</div>



<div class='container'>
<div class='row'>
<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center'>
<h2>HOW TO BUY OR SELL BTC</h2>
</div>
</div>

<div class='row'>
<div class='col-sm-4'>
<div class='panel'>
<div class='panel-body'>
<h1>1</h1>
<p><h4> Register free account</h4></p>
<p style='font-family:verdana,sans-serif;'> Sign up for free and check your email for confirmation and start trading instantly.</p>
</div>
<div class='panel-footer' style='background:#6a1b9a;'>
 <a href='#' data-toggle='modal' data-target='#mymodal'><h4 class='text-center' style='color:white;'>Register now!</h4></a>
</div>
</div>
</div>


<div class='col-sm-4'>
<div class='panel'>
<div class='panel-body'>
<h1>2</h1>
<p><h4>Create an order</h4></p>
<p style='font-family:verdana,sans-serif;'> Sign in to your account, click on create new order, select buy or sell and fill the details</p>
</div>
<div class='panel-footer' style='background:#6a1b9a;'>
<h4 class='text-center' style='color:white;'>Its very easy</h4>
</div>
</div>
</div>

<div class='col-sm-4'>
<div class='panel'>
<div class='panel-body'>
<h1>3</h1>
<p><h4>Get funded </h4></p>
<p style='font-family:verdana,sans-serif;'> Processing is 4-12 hours. once your order and payment are confirmed, you get funded ASAP</p>
</div>
<div class='panel-footer' style='background:#6a1b9a;'>
<h4 class='text-center' style='color:white;'>Funding is ASAP</h4>
</div>
</div>
</div>
</div>
</div>



<div class='container'   style='margin-bottom:50px;'>
<div class='row'>
<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12'>

<div class='panel'>
<div class='panel-title text-center'>
<h2>ABOUT US</h2>
</div>
<div class='panel-body'>
<p>about us information goes here  </p>
</div>

<div class='panel-footer'>
<h4 class='text-center' style='color:#6a1b9a;'>TRADE <img src='img/img2.png' style='padding:20px;'>  WITH US TODAY</h4>
</div>
</div>
</div>

</div>
</div>


<div class='navbar navbar-inverse' style='border-radius:0px; margin-bottom:0;'>
<div class='container'>
<div class='footer-details'>

<h3 class='text-center' style='color:white;'>copyright@sitename.com 2019</h3>
<h3 class='text-center' style='color:white;'>copyright@sitename.com 2019</h3>
<h3 class='text-center' style='color:white;'>copyright@sitename.com 2019</h3>
</div>


</div>









<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>