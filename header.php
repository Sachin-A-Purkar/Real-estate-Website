
 <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-housing.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Makaan</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php 




                ?>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link  <?php echo $home_active ?>">Home</a>
                        <?php
                            if($_SESSION["uemail"]==null){ ?>
                                <a href="register.php" class="nav-item nav-link <?php echo $register_active ?>">Register</a>
                                <a href="login.php" class="nav-item nav-link <?php echo $login_active ?>">Login</a> 
                           <?php }else{?>
                                <a href="welcome.php" class="nav-item nav-link <?php echo $property_active ?>">Property</a>
                                <a href="choosepackage.php " class="nav-item nav-link <?php echo $view_active ?>">View Package</a> 
                                <a href="logout.php" class="nav-item nav-link">Logout</a>
                        <?php
                    }
                    ?>
                    </div>
                    <button class="btn btn-primary px-3 d-none d-lg-flex" onclick="redirectToAdmin()">ADMIN</button>
                        <script type="text/javascript">
                        function redirectToAdmin() {
                                window.location.href = "admin/index.php";
                        }
                        </script>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->