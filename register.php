<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'head.php';?>
    <title></title>
    <style>
      .tr_border-none {
           border-style: none !important;
      }
    </style>
</head>
<body>
    <?php 
          $register_active = "active";
          include 'header.php';
     ?>
    <?php include 'menu.php';?>
    <?php
    if(isset($_POST['btnsave'])){
        extract($_POST);

        $result = pg_query("SELECT * FROM tbluser WHERE uemail = '$txtemail'");
        if (pg_num_rows($result) > 0) {
            echo '<script>alert("User Already exist")</script>';
            header("location:register.php");
        } else {
            $insertQuery = "INSERT INTO tbluser(ufname, ulname, uemail, uphone, upass) VALUES ('$txtfname','$txtlname','$txtemail','$txtcon','$txtpass')";
            $result = pg_query($insertQuery);

            if ($result) {
              ?>
       <script type="text/javascript">
        alert("Registration Success");
       window.location.href="login.php"</script>
       <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">Registration failed. Please try again.</div>';
            }
        }
    }
    ?>
    <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form method="post">
    <table class="table">
      <tr>
        <td class="tr_border-none" colspan="2" align="center">
          <h1 class="m-0 text-primary">User Registration </h1>
        </td>
      </tr>
      <tr>
        <td class="tr_border-none">
          First Name
        </td>
        <td class="tr_border-none">
          <input type="text" class="form-control" name="txtfname" required>
        </td>
      </tr>
      <tr>
        <td class="tr_border-none">
          Last Name
        </td>
        <td class="tr_border-none">
          <input type="text" class="form-control" name="txtlname" required>
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
          Contact
        </td>
        <td class="tr_border-none">
          <input type="text" class="form-control" name="txtcon" maxlength="10" required>
        </td>
      </tr>
      <tr>
        <td class="tr_border-none">
          Password
        </td>
        <td class="tr_border-none">
          <input type="password" class="form-control" name="txtpass" required>
        </td>
      </tr>
      <Tr>
        <Td colspan=2 align=center class="tr_border-none"> 
          <input type="submit" class="btn btn-primary px-3 d-none d-lg-flex" value="Register" name="btnsave">
        </Td>
      </Tr>
      <Tr>
        <Td colspan=2 align=center class="tr_border-none"> 
          Have an Account ? <a href ="login.php"> Login</a>
        </Td>
      </Tr>
    </table>
  </form>
  </div>
  <div class="col-md-3"></div>

    <?php include 'footer.php';?>
</body>
</html>
