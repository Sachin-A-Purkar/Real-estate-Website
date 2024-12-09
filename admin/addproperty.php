<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <title></title>
  <?php include 'head.php'?>
</head>
<body>
<?php 
          $add_active = "active";
          include 'header.php';
?>
<?php
if(isset($_POST['btnsave'])){
  extract($_POST);
  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "insert into tblproperty(pname,pprice,ptype,plocation,parea,pstatus,pimage,pconfig)values('$txtpname','$txtprice','$property','$location','$txtarea','$txtstatus','$target_file','$txtconfig')";
  pg_query("insert into tblproperty(pname,pprice,ptype,plocation,parea,pstatus,pdesc,pimage,pconfig)values('$txtpname','$txtprice','$property','$location','$txtarea','$txtstatus','$txtdesc','$target_file','$txtconfig')");
}
?>
<div class="row">
  <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
<table class="table">
  <tR>
    <td colspan="2" align="center">
      <h2>Add Property</h2>
    </td>
  </tR>

  <Tr>
    <tD>
      Property Name
    </tD>
    <td>
      <input type="text" required class="form-control" name="txtpname" required>
    </td>
  </Tr>

  <Tr>
    <tD>
      Property Price
    </tD>
    <td>
      <input type="text" required class="form-control" name="txtprice" required>
    </td>
  </Tr>

  <tr>
        <td>
          <label for="type">Choose Property Type:</label>        
        </td>
        <td colspan="2">
          <select id="type" name="property" required>
            <option value="">Type</option>
            <option value="Flat">Flats</option>
            <option value="Banglow">Bunglows</option>
            <option value="Plots">Plots</option>
            <option value="Resort">Resort</option>
            <option value="Farm House">Farm House</option>
            <option value="NA Plot">NA Plot</option>
          </select>
        </td>
      </tr>

      <tr>
        <td>
          <label for="type">Choose Property Location:</label>        
        </td>
        <td colspan="2">
          <select id="type" name="location" required>
            <option value="">Location</option>
            <option value="Adgaon">Adgaon</option>
            <option value="Ambad">Ambad</option>
            <option value="Dwarka">Dwarka</option>
            <option value="Gangapur Road">Gangapur Road</option>
            <option value="Nashik Road">Nashik Road</option>
            <option value="Makhmalabad ">Makhmalabad</option>
            <option value="Jail Road">Jail Road</option>
            <option value="Pathardi Phata">Pathardi Phata</option>
            <option value="Indira Nagar">Indira Nagar</option>
            <option value="Igatpuri">Igatpuri</option>
            <option value="Igatpuri">Kasara</option>
            <option value="Trimbak">Trimbak</option>
            <option value="Jawhar">Jawhar</option>
            <option value="Niphad">Niphad</option>
            <option value="Ghoti">Ghoti</option>
            <option value="Dindori">Dindori</option>
          </select>
        </td>
      </tr>

  <Tr>
    <tD>
      Property Area
    </tD>
    <td>
      <input type="text" required class="form-control" name="txtarea" required>
    </td>
  </Tr>

  <Tr>
    <tD>
      Property Description
    </tD>
    <td>
      <textarea class="ckeditor" required id="ckeditor" name="txtdesc" required></textarea>
    </td>
  </Tr>

  <Tr>
    <tD>
      Property Configration
    </tD>
      <td >
          <select id="type" name="txtconfig" required>
            <option value="">Configration</option>
            <option value="RK">RK</option>
            <option value="1BHK">1BHK</option>
            <option value="2BHK">2BHK</option>
            <option value="3BHK">3BHK</option>
            <option value="4BHK">4BHK</option>
            <option value="5BHK">5BHK</option>
            <option value="6BHK">6BHK</option>
            <option value="7BHK">7BHK</option>
            <option value="8BHK">8BHK</option>
            <option value="none">none</option>
          </select>
    </td>
  </Tr>

  <Tr>
    <tD>
      Property Status
    </tD>
    <td>
      <select id="type" name="txtstatus" required>
            <option value="">Status</option>
            <option value="Completed">Completed</option>
            <option value="Under Construction">Under Construction</option>
            <option value="Ready Possession">Ready Possession</option>
            <option value="Fully Furnished">Fully Furnished</option>
          </select>
    </td>
  </Tr>

  <Tr>
    <td>
      Property Construction Year
    </td>
    <td>
      <select id="type" name="txtyear" required>
            <option value="">Year</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
          </select>
    </td>
  </Tr>

  <Tr>
    <tD>
      Product Image
    </tD>
    <td>
      <input type="file" required class="form-control" name="fileToUpload" required>
    </td>
  </Tr>
  
  <tr>
    <td colspan="2" align="center">
      <input type="submit" class="btn btn-primary" value="Add Property" name="btnsave">
    </td>
  </tr>
</table>
</form>
</div>
</div>
</body>
</html>