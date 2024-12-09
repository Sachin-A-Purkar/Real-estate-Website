<?php
session_start();
if (isset($_SESSION['uemail'])) {
    if (isset($_GET['id'])) {
        $property_id = $_GET['id'];

        // Fetch details for the specified property ID from the database
        $q = pg_query("SELECT * FROM tblproperty WHERE pid= $property_id");
        $r = pg_fetch_array($q);

?>
        

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php include 'head.php'; ?>
            <title>Property Details</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    }

                td {
                    border: none;
                    padding: 8px;
                    text-align: left;
                    }

                .image-td {
                    width: 70%; /* Adjust the width of the image td as needed */
                    }

                .details-td {
                    width: 40%; /* Adjust the width of the details td as needed */
                    }

                img {
                    max-width: 100%;
                    height: auto;
                    display: block;
                    margin: 0 auto; /* Center the image horizontally if needed */
                    }

                #rcorners4 {
                  border-radius: 15px;
                  background: #73AD21;
                  padding: 0px; 
                  width: 600px;
                  height: 500px; 
                } 

                td-1 {
                    border: 1px solid #dddddd;
                    padding: 8px;
                    text-align: left;
                    white-space: pre-wrap; /* Preserve white space, wrap lines */
                }
            </style>
        </head>
        <body>
            <?php 
            $property_active = "active";
            include 'header.php';
           ?>

            <?php include 'menu.php'; ?>
            <div class="property-details-container">
                <?php
                    $q = pg_query("SELECT * FROM tblproperty WHERE pid= $property_id");
                    $r = pg_fetch_array($q);
                ?>
                <form method="post">
                <table class="table" style="width:80%" align="center">
                    <tr>
                        <td colspan="3"><h1 ><center><?php echo $r['pname']; ?></center></h1></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <img id="rcorners4"  src="admin/<?php echo $r['pimage']; ?>" alt=""  width="1000" height="1000" align="center">
                        </td>
                        <td class="details-td">
                            <br>
                            <p><b>Location: </b><?php echo $r['plocation']; ?></p><br>
                            <p><b>Price:</b> ₹<?php echo $r['pprice']; ?></p><br>
                            <p><b>Property Type: </b><?php echo $r['ptype'];?></p><br>
                            <p><b>Property Area: </b><?php echo $r['parea'];?> ft²</p><br>
                            <p><b>Property Status: </b><?php echo $r['pstatus'];?></p><br>
                            <p><b>Property Configration: </b><?php echo $r['pconfig'];?></p><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="td-1" >
                            <span><b>Property Details: </b><?php echo $r['pdesc'];?></span>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="welcome.php"><center>Back to Property List</center></a><br></td>
                        <td colspan="2"><center><input type="submit" name="btncontact" value="Contact Agent" class="btn btn-primary px-3 d-none d-lg-flex" align=""></center></td>
                    </tr>
                    </table>
                <!-- Display property details using $property array -->
                
            </div>
            <?php include 'footer.php'; ?>
        </body>
        </html>

<?php
    } else {
        echo "Invalid property ID";
    }
} else {
    echo "<script>location.href='login.php'</script>";
}

if(isset($_POST['btncontact'])){
    extract($_POST);
    pg_query("insert into tblcontact(uid,pid)values('".$_SESSION['uid']."','".$_GET['id']."')");
}
?>
