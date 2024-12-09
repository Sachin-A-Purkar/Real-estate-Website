<!DOCTYPE html>
<html lang="en">

 <?php include "head.php";?>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: right;
  width: 35%;
  margin-bottom: 16px;
  margin-left: 10%;
  
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 15px;
}

.about-section {
  padding: 50px;
  text-align: center;
  color: black;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
<div class="container-xxl bg-white p-0">
<?php 
    $home_active = "active";
    include "header.php";
?>
<?php include "menu.php";?>

    <div class="about-section">
  <h1>About Us</h1>
  <p>Makkan is Real estate Property Listing Website Which Allows User to Browse and Contact The Agent.</p>
</div>
<h2 style="text-align:center">Our Team</h2>
<br>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="img/pro.jpeg" alt="Jane" style="width:100%">
      <div class="container">
        <h3>Gunjal Jay Satish</h3>
        <p class="title">Developer</p>
        <p>Student of TY.Bsc (C.S)</p>
        <p>jaygunjal@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/pro.jpeg" alt="Mike" style="width:100%">
      <div class="container">
        <h3>Purkar Sachin Ananda</h3>
        <p class="title">Developer</p>
        <p>Student of TY.Bsc (C.S)</p>
        <p>sachinpurkar0001@example.com</p>
        <p><button class="button">+91 9021551522</button></p>
      </div>
    </div>
  </div>
  
</div>
<?php include "footer.php";?>
</div>
</body>
</html>