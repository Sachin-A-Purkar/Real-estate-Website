<!DOCTYPE html>
<html lang="en">

 <?php include "head.php";?>

</head>
<body>
<div class="container-xxl bg-white p-0">
<?php 
    $home_active = "active";
    include "header.php";
?>
<?php include "menu.php";?>

    <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">     Moving you toward your Dream Shelter !</p>
                     <?php
                            if($_SESSION["uemail"]==null){ ?>
                    <a href="login.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                     <?php } else {  ?>
                        <a href="welcome.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                    <?php   }     ?> 
                </div>
                <div class="col-md-6 animated fadeIn" >
                    <div >
                        <div >
                            <img class="img-fluid" src="img/homepage.jpeg" alt=" carousel-2" width="100%" height="100%" align="margin-left">
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "footer.php";?>
</div>
</body>
</html>