<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'head.php';?>
  <title></title>
</head>
<body>
  <?php 
          $con_active = "active";
          include 'header.php';
?>


<table class="table">
  <tr>
      <td>
     User Name
    </td>
     <td>
     User Email
    </td>
     <td>
     User Contact
    </td>
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
  $q=pg_query("select * from tblcontact,tblproperty,tbluser where tbluser.uid=tblcontact.uid and tblproperty.pid=tblcontact.pid");
  while($r=pg_fetch_array($q)){
    ?>
    <Tr>
        <td>
        <?php echo $r["ufname"];?>
      </td>
        <td>
        <?php echo $r["uemail"];?>
      </td>
      <td>
        <?php echo $r["uphone"];?>
      </td>
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

</body>
</html>