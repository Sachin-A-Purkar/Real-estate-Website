<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	 <?php include 'head.php'?>
<body>
	<?php 
          $view_active = "active";
          include 'header.php';
	?>
		<table class="table">
		<tr>
			<td colspan="4" align="center">
      			<h2>Delete Property</h2>
    		</td>
		</tr>
		<Tr>
			<tD>
				Property Id
			</tD>
			<tD>
				Property Name
			</tD>
			<tD>
				Property Price
			</tD>
			
			
		</Tr>
	
<?php
$q=pg_query("select * from tblproperty");
while($r=pg_fetch_array($q)){
?>
<tr>
	<td>
		<?php echo $r['pid'];?>
	</td>
	<td>
		<?php echo $r['pname'];?>
	</td>
	<td>
		<?php echo $r['pprice'];?>
	</td>
	<Td>
	<a href="deleteprod.php?id=<?php echo $r['pid'];?>"><input type="button"	value="Delete" class="btn btn-danger"></a>
	</Td>
</tr>
<?php
}
?>
</table>
</body>
</html>