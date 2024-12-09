<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'head.php';?>
	<title></title>
</head>
<body>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<div class="row">
<?php
$q=pg_query("select * from tblproperty where pid=".$_GET['id']);
while ($r=pg_fetch_array($q)) {
  ?>
  <div class="col-md-4">
  <table class="table">
      <tr>
    
      <td colspan=2 align=center>
  <img src="admin/<?php echo $r["pimage"];?>">
</td>
</tr>
    <tr>
      <td>
        Product Name
      </td>
      <td>
  <?php echo $r["pname"];?>
</td>
</tr>
<tr>
      <td>
        Product Price
      </td>
      <td>
        Rs. <?php echo $r["pprice"];?>/-
      </td>
</tr>

<tr>
  <td>
    Description
  </td>
  <td>
    <?php echo $r['pdesc'];?>
  </td>
</tr>
<form method="post">
<tr>
  <td>
    Choose Quantity
  </td>
  <tD>
    <select name="cmbqty" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
</tD>
</tr>
<tr>
  <TD>
    <input type="submit" name="btnaddcart" class="btn btn-success" value="Add2Cart">
  </TD>
</tr>
</form>
</table>
</div>
<?php
}
?>

<?php
if(isset($_POST['btnaddcart'])){
    extract($_POST);
    $q=pg_query("select * from tblproduct where pid=".$_GET['id']);
    $r=pg_fetch_array($q);
    $stock=$r['pstock'];
    if($stock>=$cmbqty){
      $newstock=$stock-$cmbqty;
      pg_query("update tblproduct set pstock='$newstock' where pid=".$_GET['id']);
       pg_query("insert into tblcart(uid,pid,qty,status)values('".$_SESSION['uid']."','".$_GET['id']."','$cmbqty','0')");
       ?>
       <script type="text/javascript">
         alert("Added to Cart");
       </script>
       <?php
    }
    else{
      ?>
      <script type="text/javascript">
        alert("Out of stock");
      </script>
      <?php
    }
   
}
?>
</div>
<?php include 'footer.php';?>
</body>
</html>