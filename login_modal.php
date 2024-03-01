
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row float-left ml-2"><h4 class="modal-title float-left" id="myModalLabel">WELCOME BACK</h4></div>
                <div class="row float-right mr-2"><button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            </div>
            <div class="modal-body">	
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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
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


        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
