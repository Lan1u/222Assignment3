<?php
ini_set("error_reporting",E_ALL);
ini_set("log_errors","1");
ini_set("error_log","php_errors.txt");
?>

<!DOCTYPE html>
<html>
<head>

<style>
body{background-color: lightblue;}
.pictures {
display: inline-grid;
grid-template-columns: auto auto auto auto auto;
padding: 40px;
grid-area: pic;
margin-right:20%;
}

.grid-item {

background-color: rgba(255, 255, 255, 0.8);
border: 5px solid rgba(0, 0, 0, 0.8);
padding: 5px;

}
.category{text-align: center}
img{
width: 100%;
background-color: white;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
div.container {
text-align: center;

}
.but{position:fixed; 

border: none;
color: white;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 2px 2px;
cursor: pointer;
top: 20%;
right: 10%;
}
.buttonRefresh{padding:20px;border-radius: 60%;}


</style>
<title>Mars View</title>
</head>
<body>
<script>

function GotoFavourite() {
location.replace("https://webapp.cms.waikato.ac.nz/~ln46/Favourite.php");
}
function GotoStatistics() {
location.replace("https://webapp.cms.waikato.ac.nz/~ln46/Statistics.php");
}



</script>
<div style="text-align:center; font-size:25px;border-bottom: 2px solid black;">
<h1>
Mars View
</h1>
</div>
<div class="grid-container">
<div class="pictures">


<?php
session_start();
doit();
function doit(){
$x = 0;
$conn = new mysqli("mysql.cms.waikato.ac.nz", "zz169", "my11154850sql","zz169");
if ($conn==FALSE) {
die("<p>ERROR: Unable to connect: " . $conn->connect_error);
}

$picArray=array();
$n=0;
while($n<25)
{
$number=rand(0,10432);

if(check($picArray,$number)==true)
{
array_push($picArray,$number);
$n++;
}

}
while($x < 25) {


$sql = "SELECT fileName,labelID FROM ass3 WHERE ID=$picArray[$x]";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
$name=$row["fileName"];
$LID=$row["labelID"];

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

echo "<div class='grid-item'><div><a href='../~ln46/picDetail.php?number=$picArray[$x]'><img id=$x src='https://www.cms.waikato.ac.nz/~mmayo/compx222/mars/images/$name' alt='test!!!'></div><div class='container'></a>
<p>$picArray[$x]  $LableName</p>
</div></div>";



$x++;
}
$conn->close();

}
function check($ar,$number) {
$arrlength = count($ar);
for($x = 0; $x < $arrlength; $x++) {
if($ar[$x]==$number)
{return false;}
}
return true;
}
?>


</div>
<div class="but">
<button class="buttonRefresh" onclick=location.reload() >Refresh</button>
<br>
<br>
<br>
<button class="buttonRefresh" onclick= 	GotoFavourite() >Favourite</button>
<br>
<br>
<br>
<button class="buttonRefresh" onclick= GotoStatistics() >Statistics</button>


</div>  
</div>
</body>
</html>

