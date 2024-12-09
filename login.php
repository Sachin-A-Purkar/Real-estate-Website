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
          $login_active = "active";
          include 'header.php';
?>
<?php include 'menu.php';?>
<?php
    if(isset($_POST['btnlogin'])){
      extract($_POST);

      $q=pg_query("SELECT * FROM tbluser WHERE uemail='$txtemail' and upass='$txtpass'");
      if(pg_num_rows($q)>0){
        $_SESSION['uemail']=$txtemail;
        $q1=pg_query("SELECT * FROM tbluser WHERE uemail='$txtemail'");
        $r1=pg_fetch_array($q1);
        $_SESSION['uid']=$r1["uid"];
        $_SESSION['ufname']=$r1["firstname"];
        $_SESSION['packname']=$r1["packname"];
        $_SESSION['ulname']=$r1["lastname"];
        $_SESSION['ulname']=$r1["packname"];
        $_SESSION['is_login']=1;
        
       ?>
       <script type="text/javascript">
        alert("Login Success");
       window.location.href="welcome.php"</script>
       <?php
      }
      else{
        ?>
        <script type="text/javascript">
          alert("Invalid Credentials");
        </script>
        <?php
      }
  }
?>
 <style>
      .tr_border-none {
           border-style: none !important;
      }
    </style>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form method="post">
    <table class="table">
      <br>
      <tr>
        <td class="tr_border-none" colspan="2" align="center">
          <h1 class="m-0 text-primary">User Login </h1>
        </td>
      </tr>
     <tr>
        <td class="tr_border-none">
          Email
        </td>
        <td class="tr_border-none">
          <input type="email" class="form-control" name="txtemail" required>
        </td>
      </tr>
      <tr>
        <td class="tr_border-none">
          Password
        </td>
        <td class="tr_border-none">
          <input type="password" class="form-control" name="txtpass"required>
        </td>
      </tr>
     
      
      <Tr>
        <Td colspan=2 align=center class="tr_border-none"> 
          <input type="submit" class="btn btn-primary px-3 d-none d-lg-flex" value="Login" name="btnlogin">
        </Td>
      </Tr>
      <Tr>
        <Td colspan=2 align=center class="tr_border-none"> 
         Don't aave an Account ? <a href ="register.php"> Register</a>
        </Td>
      </Tr>
    </table>

    </table>
  </form>
  </div>
  <div class="col-md-3"></div>
<?php include 'footer.php';?>
</body>
</html>