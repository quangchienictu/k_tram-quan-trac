<!-- 
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href="public\css\login.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Đăng Nhập</h5>
                        <form class="form-signin" action="index.php?object=Login&action=Login&code=1" method="post">
                            <div class="form-label-group">
                                
                                <label for="inputEmail">Tài khoản</label>
                            </div>
                            <div class="form-label-group">
                               
                                <label for="inputPassword">Mật khẩu</label>
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">đăng nhập</button>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"  ><a href="Register.php" class="text-center" id="dki" style=" color: white;text-decoration: none
  ;"> đăng kí </a></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html> -->




<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();
if (isset($_SESSION['login'])) {
    Header("Location: index.php?object=mucnuoc&action=list");
} else {?>
<!DOCTYPE html>
<html>

<head>
<title> Đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" Master  Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+SC:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
    <div class="padding-all">
        <div class="header">
            <h1>Trạm quan trắc</h1>
        </div>

        <div class="design-w3l">
            <div class="mail-form-agile">
                <form action="index.php?object=Login&action=Login&code=1" method="post">
                   <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Tài khoản..." required>
                    <input type="password" class="padding" id="inputPassword" class="form-control" name="password" placeholder="Mật khẩu..." required>
                    <input type="submit" class="mt-5" value="login">
                </form>
            </div>
          <div class="clear"> </div>
        </div>
        
        <div class="footer">
        <p>© 2020   | Design by  <a href="#" >  Tuấn Anh</a></p>
        </div>
    </div>
</body>
</html>
<?php } ?>