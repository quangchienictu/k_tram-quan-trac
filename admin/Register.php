<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="public\css\login.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Đăng Kí</h5>
                    <form action="index.php?object=Login&action=Login&code=2" method="post">
                        <div class="form-label-group">
                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Tài khoản..." required>
                            <label for="inputEmail">Tài khoản</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Mật khẩu..." required>
                            <label for="inputPassword">Mật khẩu</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" class="form-control" placeholder="Retype password" required>
                            <label for="inputPassword">Nhập lại mật khẩu</label>
                        </div>
                        <div>
                            <button type="submit" name="dangky" class="btn btn-lg btn-primary btn-block text-uppercase"
                                    onclick="checkPasswordMatch()">Đăng Kí
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>