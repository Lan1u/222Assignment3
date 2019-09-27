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
    <title>Favourite List</title>
<style>
body{text-align: center;background-color: lightblue;font-family:Comic Sans MS, cursive, sans-serif;	}
.grid-item {

background-color: rgba(255, 255, 255, 0.8);
border: 5px solid rgba(0, 0, 0, 0.8);
padding: 5px;

}
.container {
text-align: center;

}

.pictures {
display: inline-grid;
grid-template-columns: auto auto auto auto auto;
padding: 40px;
grid-area: pic;
margin-right:20%;
}
.button{
height:40px;
.padding:20px;border-radius: 60%;}

.but{margin:auto;text-align: center;}
</style>
  </head>


  <!-- page body -->
  <body>
    
    <!-- heading for the page -->
    <div style="text-align:center; font-size:25px;border-bottom: 2px solid black;">
<h1>
Favourite List
</h1>
</div>
<div class="but">
<button class='button'>Back to Home Page</button>
</div>
<div class="pictures">
    <?php          
$conn = new mysqli("mysql.cms.waikato.ac.nz", "zz169", "my11154850sql","zz169");
if ($conn==FALSE) {
die("<p>ERROR: Unable to connect: " . $conn->connect_error);
}

$sql = "SELECT fileName,labelID FROM ass3 WHERE favourited=1";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$name=$row["fileName"];
$LID=$row["labelID"];
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
echo "<div class='grid-item'><div><img src='https://www.cms.waikato.ac.nz/~mmayo/compx222/mars/images/$name' alt='test!!!'></div><div class='container'><p>$picArray[$x]  $LableName</p>
</div></div>";
}
?>
</div>
  </body>
</html>
