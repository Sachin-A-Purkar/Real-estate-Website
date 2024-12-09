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
<table class="table" style="width:70%" align="center">
  <tr>
    <td>
      Property Id
    </td>
    <td>
      Property Name
    </td>
    <td>
      Property Price
    </td>
   
  </tr>
  <?php
  $q=pg_query("select * from tblcontact,tblproperty where tblproperty.pid=tblcontact.pid and tblcontact.uid=".$_SESSION['uid']);
  while($r=pg_fetch_array($q)){
    ?>
    <Tr>
      <td>
        <?php echo $r["pid"];?>
      </td>
      <td>
        <?php echo $r["pname"];?>
      </td>
      <td>
        <?php echo $r["pprice"];?>
      </td>
     
      
    </Tr>
    <?php
  }
  ?>

</table>
<?php include 'footer.php';?>
</body>
</html>