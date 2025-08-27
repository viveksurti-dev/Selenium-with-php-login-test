<?php
$mail = 'admin@test.com';
$pass = '$2y$10$MYQqd1R0NeXOBDRm3lI4XOPX0Px9IFU49W/rwcVfNGtvQFPd4aaym'; //Admin@123

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = 'Email and Password are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        if ($mail == $email && password_verify($password, $pass)) {
            $success = 'Login Success';
        } else {
            $error = "Invalid Username or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
    body {
        background-color: aliceblue;
        height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <section class="container-fluid">
        <div class="container-login mt-5">
            <div class="login-form d-flex justify-content-center align-items-center">
                <div class="card p-3 col-md-3">
                    <div class="card-body">
                        <?php
                        if (isset($error)) {
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        } else if (isset($success)) {
                            echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                        }
                        ?>
                        <form method="post">
                            <div>
                                <h3 class="text-center">Login</h3>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" class="form-control" placeholder="Enter Password"
                                    name="password">
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" id="loginBtn" value="Login" name="login"
                                    class="btn btn-primary w-100">
                            </div>
                            <div class="form-group mt-2 d-flex justify-content-end">
                                <a href="<?php echo ''; ?>">Forgot Password?</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>