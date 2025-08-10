<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Welcome Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="front-end/images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="front-end/css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="front-end/css/materialdesignicons.min.css" />

    <!-- Custom  sCss -->
    <link rel="stylesheet" type="text/css" href="front-end/css/style.css" />
    <script src="front-end/js/jquery.min.js"></script>


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="78">

    <!--Navbar Start-->

    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky-dark" id="sticky">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="front-end/images/logo-light.png" alt="" class="logo-light" height="21" />
                <img src="front-end/images/logo-dark.png" alt="" class="logo-dark" height="21" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">SDFGHJKksdgf</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="#demo" class="nav-link">Demos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#faq" class="nav-link">Faqs</a>
                    </li>
                    <li class="nav-item">
                        <a href="#clients" class="nav-link">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
                <button class="btn btn-info navbar-btn" data-bs-toggle="modal" data-bs-target="#login-modal">Sign In</button>
                <button class="btn btn-warning navbar-btn mx-2" data-bs-toggle="modal" data-bs-target="#signup-modal">Sign Up</button>
            </div>
        </div>
    </nav>

    <!-- Navbar End -->

    <!-- home start -->
    <section class="bg-home bg-gradient" id="home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container-fluid">
                    <?php
                    if(isset($_SESSION['success']))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo  $_SESSION['success'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        session_unset();
                        session_destroy();
                    }?>

                    <?php
                    if(isset($_SESSION['error']))
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo  $_SESSION['error'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        session_unset();
                        session_destroy();
                    }?>

                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="home-title mo-mb-20">
                                <h1 class="mb-4 text-white">Ubold is a fully featured premium admin template</h1>
                                <p class="text-white-50 home-desc mb-5">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 5, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. </p>
                                <div class="subscribe">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" placeholder="Enter your e-mail address">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Subscribe Us</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-7">
                            <div class="home-img position-relative">
                                <img src="front-end/images/home-img.png" alt="" class="home-first-img">
                                <img src="front-end/images/home-img.png" alt="" class="home-second-img mx-auto d-block">
                                <img src="front-end/images/home-img.png" alt="" class="home-third-img">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
        </div>
    </section>
    <!-- home end -->

    <!-- clients start -->
    <section>
        <div class="container-fluid">
            <div class="clients p-4 bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <div class="client-images">
                            <img src="front-end/images/clients/1.png" alt="logo-img" class="mx-auto img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="client-images">
                            <img src="front-end/images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="client-images">
                            <img src="front-end/images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="client-images">
                            <img src="front-end/images/clients/6.png" alt="logo-img" class="mx-auto img-fluid d-block">
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div> <!-- end container-fluid -->
    </section>
    <!-- clients end -->

    <!-- features start -->


    <!-- faqs start -->

    <!-- cta end -->

    <!-- footer start -->
    <footer class="bg-dark footer">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-lg-4">
                    <div class="pe-lg-4">
                        <div class="mb-4">
                            <img src="front-end/images/logo-light.png" alt="" height="20">
                        </div>
                        <p class="text-white-50">A Responsive Bootstrap 5 Web App Kit</p>
                        <p class="text-white-50 mb-4 mb-lg-0">Ubold is a fully featured premium admin template built on top of awesome Bootstrap 5, modern web technology HTML5, CSS3 and jQuery.</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-list">
                        <p class="text-white mb-2 footer-list-title">About</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Home</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Features</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Faq</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Clients</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-list">
                        <p class="text-white mb-2 footer-list-title">Social</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Facebook </a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Twitter</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Behance</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Dribble</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-list">
                        <p class="text-white mb-2 footer-list-title">Support</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Help & Support</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Privacy Policy</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-list">
                        <p class="text-white mb-2 footer-list-title">More Info</p>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Pricing</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>For Marketing</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>For Agencies</a></li>
                            <li><a href="#"><i class="mdi mdi-chevron-right me-2"></i>Our Apps</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="float-start pull-none">
                        <p class="text-white-50"><script>document.write(new Date().getFullYear())</script> &copy;Ubold. Design by <a href="https://coderthemes.com/" target="_blank" class="text-white-50">Coderthemes</a> </p>
                        <!-- <p class="text-white-50">2015 - 2020 © Ubold. Design by <a href="https://coderthemes.com/" target="_blank" class="text-white-50">Coderthemes</a> </p> -->
                    </div>
                    <div class="float-end pull-none">
                        <ul class="list-inline social-links">
                            <li class="list-inline-item text-white-50">
                                Social :
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </footer>
    <!-- footer end -->


    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="front-end/images/logo-dark.png" alt="" height="24">
                                </span>
                            </a>
                        </div>
                    </div>

                    <form class="px-3" action="postRegister.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input class="form-control" type="text" id="username" name="name" required="" placeholder="Michael Zenaty">
                            <span class="text-danger" id="name"></span>
                        </div>

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="john@deo.com">
                            <?php
                            if(isset($_SESSION['errors']['email']))
                            {
                                echo '<span class="text-danger">'.$_SESSION['errors']['email'].'</span>';
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" required="" placeholder="Enter your password">
                            <?php
                            if(isset($_SESSION['errors']['password']))
                            {
                                echo '<span class="text-danger">'.$_SESSION['errors']['password'].'</span>';
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" name="confirm_password" required=""placeholder="Enter your password">
                        </div>


                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="customCheck1">
                                <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit" name="signup" value="signin">Sign Up</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- SignIn modal content -->
    <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="auth-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="front-end/images/logo-dark.png" alt="" height="24">
                                </span>
                            </a>
                        </div>
                    </div>

                    <form action="postLogin.php" class="px-3" method="POST">
                        <?php
                        if(isset($_SESSION['login_error']))
                        {
                            echo "<span class='text-danger'>".$_SESSION['login_error']."</span>";

                        }
                        ?>

                        <div class="mb-3">
                            <label for="emailaddress1" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress1" name="email" required="" placeholder="john@deo.com">
                        </div>

                        <div class="mb-3">
                            <label for="password1" class="form-label">Password</label>
                            <input class="form-control" type="password" required="" name="password" id="password1" placeholder="Enter your password">
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="customCheck2">
                                <label class="form-check-label" for="customCheck2">Remember me</label>
                            </div>
                        </div>

                        <div class="mb-2 text-center">
                            <button class="btn rounded-pill btn-primary" type="submit" name="login" value="login">Sign In</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- Back to top -->
    <!-- <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a> -->
    <!-- Back to top -->
    <a href="#" onclick="topFunction()" class="back-to-top-btn btn btn-primary" id="back-to-top-btn"><i class="mdi mdi-chevron-up"></i></a>

    <!-- javascript -->

    <script src="front-end/js/bootstrap.bundle.min.js"></script>

    <!-- custom js -->
    <script src="front-end/js/app.js"></script>

    <?php
    if(isset($_SESSION['login_error']))
    {
      ?>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#login-modal').modal('show');
        });
      </script>
      <?php
      session_unset();
      session_destroy();
    }
    ?>

    <?php
    if(isset($_SESSION['errors']))
    {
      ?>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#signup-modal').modal('show');
        });
      </script>
      <?php
      session_unset();
      session_destroy();
    }
    ?>
</body>

</html>