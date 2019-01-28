<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Reset Password | Dashboard UI Kit</title>
        <meta name="description" content="Dashboard UI Kit">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/main.min.css">
        <script src="js/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#submit').click(function(e){
                e.preventDefault();
                var password=$('#password').val();
                var repassword=$('#re-password').val();
                
                var ver_id = window.location.href.split('?')[1].split('=')[1]
                if ((password) && (password == repassword)){
                    $.ajax({
                        type:"POST",
                        url:"testimony_submit.php",
                        data:{password:password,file:"reset_submit",ver_id:ver_id},
                        success:function(result){
                                if (result == 'success'){
                                    alert("Password reset Successful");
                                    window.location.href='index.php';
                                }else{
                                    alert("Error: Password reset not successful!!!")
                                    
                                }
                            },
                            error:function(xhr){
                                alert("an error occured"+xhr.statusText)
                            }

                    });
                }
            });
        });
        </script>
    </head>
    <body class="o-page o-page--center">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="o-page__card">
            <div class="c-card u-mb-xsmall">
                <header class="c-card__header u-text-center u-pt-large">
                    <a class="c-card__icon" href="#!">
                        <img src="favicon.ico" alt="Dashboard's Logo">
                    </a>
                    <div class="row u-justify-center">
                        <div class="col-9">
                            <h1 class="u-h3 u-mb-zero">Reset your password</h1>
                        </div>
                    </div>
                </header>
                
                <form class="c-card__body" method=''>
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="password">Your New Password</label>
                        <input class="c-input" type="password" id="password" placeholder="Numbers, Letters..."> 
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="re-password">Confirm Password</label>
                        <input class="c-input" type="password" id="re-password" placeholder="Re-enter Password"> 
                    </div>

                    <button class="c-btn c-btn--info c-btn--fullwidth" type="submit" id="submit">Reset password</button>
                </form>
            </div>

           
        </div>

        <script src="js/main.min.js"></script>
    </body>
</html>