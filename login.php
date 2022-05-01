<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SHS</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="logoWrap">
                <div class="imgWrap">
                    <img src="images/logo/logo.svg" alt="logo">
                </div>
                <h2>Admin</h2>
            </div>
            <div class="formWrap">
                <form action="loginCheck.php" method="POST">
                    <div class="inputWrap">
                        <input class="form-control" id="login_id" name="login_id" type="text" placeholder="ID" aria-label="default input">
                    </div>
                    <div class="inputWrap">
                        <input class="form-control" id="login_pw" name="login_pw" type="password" placeholder="PW" aria-label="default input">
                    </div>
                    <div class="row submitWrap">
                        <button type="submit" class="btn btn-primary col-12">로그인</button>
                    </div>
                </form>
            </div>
        </div>
        </section>
        <!-- login fin -->
</body>

</html>