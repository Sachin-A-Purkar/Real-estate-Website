<!DOCTYPE html>
<html lang="en">

 <?php include "head.php";?>
<style >
    .table{
        width: auto;
        margin-left: auto;
        margin-right: auto;
    }
</style>
</head>
<body>
<div class="container-xxl bg-white p-0">
<?php 
$view_active = "active";
    include "header.php"; ?>

<?php include "menu.php";?>
<?php
if(isset($_POST['btnsearch'])){
    extract($_POST);
    pg_query("update tbluser set packname='$cmbpackage' where uid='".$_SESSION['uid']."'");
    ?>
    <script type="text/javascript">
        alert("Payment Successfull login Again");
        window.location.href="logout.php";
    </script>
    <?php
}

?>
<br>
        <form method="post">
            <table class="table" align="center">
                <tr>
                    <td colspan="3">
                        <center><h2>Package Details</h2></center>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <center><h3 style="color: silver;">Silver</h3></center>
                        Features:<br>
                        <br>
                        ⦿ List up to 10 Premium Properties.<br>
                        ⦿ Standard Customer Support.<br>
                        ⦿ Price : ₹ 500 /- only.<br>
                    </td>
                    <td>
                        <center><h3 style="color: gold;">Gold</h3></center>
                        Features:<br>
                        <br>
                        ⦿ List up to 30 Premium Properties.<br>
                        ⦿ Priority Customer Support.<br>
                        ⦿ Price : ₹ 800 /- only.<br>
                    </td>
                    <td>
                        <center><h3 style="color: #8DC9E1;">Platinum</h3></center>
                        Features:<br>
                        <br>
                        ⦿ Unlimited Premium Properties listing.<br>
                        ⦿ Priority Customer Support.<br>
                        ⦿ Dedicated Account Manager.<br>
                        ⦿ Price : ₹ 1000 /- only.<br>
                    </td>
                </tr>
                <tr >
                    <td colspan="2">
                        <br>
                       <center><select name="cmbpackage" style="width: 200px">
                            <option value="Silver">Silver-Rs. 500/-</option>
                            <option value="Gold">Gold-Rs. 800/-</option>
                            <option value="Platinum">Platinum-Rs. 1000/-</option>
                        </select></center> 
                        <br>
                        <center><input type="submit" name="btnsearch" value="Select" class="btn btn-success"></center> 
                    </td>
                    <td>
                        <img src="img/QR.jpg" width="100px"><br>
                        Scan & Pay
                    </td>
                </tr>
            </table>
        </form>
    
<?php include "footer.php";?>
</div>
</body>
</html>

