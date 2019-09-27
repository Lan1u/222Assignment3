<?php
ini_set("error_reporting",E_ALL);
ini_set("log_errors","1");
ini_set("error_log","php_errors.txt");
?>

<!DOCTYPE html>
<html lang="en">
  <!-- page header -->
  <head>
    <meta charset="utf-8">
    <title>Picture Details</title>
<style>body{background-color: lightblue;font-family:Comic Sans MS, cursive, sans-serif;}
body, html {
  height: 100%;
  width:100%;
  margin: 0;
}
.button{
height:40px;
.padding:20px;border-radius: 60%;}

.but{margin:auto;text-align: center;}
</style>
  </head>


  <!-- page body -->
  <body>
 <div style="text-align:center; font-size:25px;border-bottom: 2px solid black;">
<h1>
Picture Details
</h1>
</div>
<div class="but">
<button class='button'>Add to favourite</button>
<button class='button'>Back to Home Page</button>
</div>
  <?php
session_start();  // start or resume a session
// set session variable name, if we received it
if (isset($_GET["number"])) {
    $imagenumber=$_GET["number"];
$conn = new mysqli("mysql.cms.waikato.ac.nz", "zz169", "my11154850sql","zz169");
if ($conn==FALSE) {
die("<p>ERROR: Unable to connect: " . $conn->connect_error);
}
$sql = "SELECT fileName,labelID FROM ass3 WHERE ID=$imagenumber";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$name=$row["fileName"];
$LID=$row["labelID"];
if($row["favourited"]==1){$faveour='Yes';}
else{$faveour='No';}
}
if($LID==0){$LableName="Other";}
else if($LID==0){$LableName="Other";}
else if($LID==1){$LableName="Crater";}
else if($LID==2){$LableName="Dark Dune";}
else if($LID==3){$LableName="Slope Streak";}
else if($LID==4){$LableName="Bright Dune";}
else if($LID==5){$LableName="Impact Ejecta";}
else if($LID==6){$LableName="Swiss Cheese";}
else if($LID==7){$LableName="Spider";}
else{$LableName="###Unknown###";}

echo"
<br>
<div class='bg'></div>
<p>Picture name: $name<p>
<p>Category: $LableName<p>
<p>Faveour: $faveour<p>
<br>
<br>
<br>
<br>
";


echo"<style>.bg {
  /* The image used */
  background-image: url('https://www.cms.waikato.ac.nz/~mmayo/compx222/mars/images/$name');
  margin:auto;
  /* Full height */
  height: 80%; 
		width:80%;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}<style>";
}
else{echo '<p>Sorry this picture is not available!!!</p>';}
?>

  </body>
</html>
