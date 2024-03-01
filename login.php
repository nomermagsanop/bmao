<?php 
session_start();

if (isset($_SESSION["loggedIn"]) == "Logged") {
    header ("Location: dashboard.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Botolan Municipal Agriculture Office - Login</title>
    <link rel="icon" type="image/x-icon" href="img/da_logo.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container d-flex">

        <!-- Outer Row -->
        <div class="col justify-content-center d-flex" style="height: 100vh;">

            <div class="col-xl-10 col-lg-12 col-md-9 m-auto">

                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-img"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Back!</h1>
                                    </div>
                                    <?php if(isset($_GET['failed'])) { ?>
                                        <div class="text-center">
                                            <p class="text-danger">Username or Password is Invalid!</p>
                                        </div>
                                    <?php } ?>
                                    <form class="user" action="login_action.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="inputUser" name="inputUser" placeholder="Username">
                                            
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="inputPassword" name="inputPassword" placeholder="Password">
                                        
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block mt-4">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>