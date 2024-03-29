<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
   
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <div id="error_msg"></div>
                          

                            <form class="user" id="user_register_form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="user_name" placeholder="Name">


                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="user_email" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="user_password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="user_conf_pass" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
     
    <script>
        $(document).ready(function() {
    
            $('#user_register_form').submit(function(e) {
                e.preventDefault();

                var name = $('#user_name').val();
                var email = $('#user_email').val();
                var password = $('#user_password').val();
                var conf_pass = $('#user_conf_pass').val();
                var fData = {
                    name: name,
                    email: email,
                    password: password,
                    conf_pass: conf_pass
                }
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('auth/insert_user'); ?>",
                    data: fData,
                    dataType: "json",
                    success: function(res) {
                       if(res.status==401){
                        $("#error_msg").html("");
                        $("#error_msg").append('<div class="alert alert-danger">' + res.msg + '</div>');
                       }

                       if(res.status==200){
                        alert(res.msg);
                        window.location.href = res.redirect_url;
                       }
                       
                       
                    }

                });

            });
        });
    </script>

</body>

</html>