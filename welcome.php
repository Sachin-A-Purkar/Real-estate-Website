<?php
session_start();
if (isset($_SESSION['uemail'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'head.php'; ?>
    <title>Property List</title>
    <style >
        #rcorners4 {
                  border-radius: 15px;
                  background: #73AD21;
                  padding: 0px; 
                  width: 400px;
                  height: 250px; 
                } 
        td {
            border: none;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
      <?php 
    $property_active = "active";
    include 'header.php';
    ?>
    <?php include 'menu.php'; ?>
    <form method="post">
  <table align="center">
      <tr>
      <td align="center">
      Search
      </td>
      <td>
        <input type="text" name="txtsearch" class="form-control">
      </td>
      <td><input type="submit" name="btnsearch" value="Search" class="btn btn-primary px-3 d-none d-lg-flex">
        </td>
      </tr>      
      
    </table>
  </form>
  
    <table class="table" style="width:50%" align="center">
        <?php
        $a=5;
        if($_SESSION['packname']=="Silver"){
                $a=10;
        }
        if($_SESSION['packname']=="Gold"){
                $a=20;
        }
        if($_SESSION['packname']=="Platinum"){
                $a=50;
        }
if(isset($_POST["btnsearch"])){
  extract($_POST);
  $qry="select * from tblproperty where pname like '%".$txtsearch."%' limit $a";
}
else{
$qry="select * from tblproperty limit $a";
}
        $q = pg_query($qry);
        while ($r = pg_fetch_array($q)) {
            ?>
            <tr>
                <td>
                    <table class="table" border="0">
                        <tr height="30px" ><td colspan="100%" class="tr_border-none"> </td></tr>
                        <tr>
                            <td rowspan="5"  width="200"> 
                                <img id="rcorners4" src="admin/<?php echo $r['pimage']; ?>" alt="<?php echo $r['pname']; ?>" width="150" height="auto"/>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td > Name </td>
                            <td > <?php echo $r['pname'];?> </td>
                        </tr>

                        <tr>
                            <td > Property Type </td>
                            <td > <?php echo $r['ptype'];?> </td>
                        </tr>

                        <tr>
                            <td > Location </td>
                            <td > <?php echo $r['plocation'];?> </td>
                        </tr>

                        <tr>
                            <td > Price </td>
                            <td > ₹ <?php echo $r['pprice'];?> <a href="property.php?id=<?php echo $r['pid']; ?>">
                                <br>
                            <button type="button" class="btn btn-link" data-mdb-ripple-init data-mdb-ripple-color="dark">More Details</button></a></td>
                        </tr>
                        <tr height="30px" ><td colspan="100%" > </td></tr>
                    </table>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>

<?php
} else {
    echo "<script>location.href='login.php'</script>";
}
?>
