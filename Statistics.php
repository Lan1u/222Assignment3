<?php
ini_set("error_reporting",E_ALL);
ini_set("log_errors","1");
ini_set("error_log","php_errors.txt");
?>

<html>
<head>

<title>Mars View</title>
<link href="style.css" rel="stylesheet" type="text/css"/>

<?php
	$other=0;
	$crater=0;
	$darkDune=0;
	$slopeStreak=0;
	$brightDune=0;
	$impactEjecta=0;
	$swissCheese=0;
	$spider=0;

	$conn = new mysqli("mysql.cms.waikato.ac.nz", "zz169", "my11154850sql","zz169");
	if ($conn==FALSE) {
	die("<p>ERROR: Unable to connect: " . $conn->connect_error);
	}


	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=0 AND favourited=1";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$other=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=1 AND favourited=1";
	$result2 = $conn->query($sql);
	while($row = $result2->fetch_assoc()) {
		$crater=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=2 AND favourited=1";
	$result3 = $conn->query($sql);
	while($row = $result3->fetch_assoc()) {
		$darkDune=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=3 AND favourited=1";
	$result4 = $conn->query($sql);
	while($row = $result4->fetch_assoc()) {
		$slopeStreak=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=4 AND favourited=1";
	$result5 = $conn->query($sql);
	while($row = $result5->fetch_assoc()) {
		$brightDune=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=5 AND favourited=1";
	$result6 = $conn->query($sql);
	while($row = $result6->fetch_assoc()) {
		$impactEjecta=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=6 AND favourited=1";
	$result6 = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		$swissCheese=$row["COUNT(favourited)"];
	    }

	$sql = "SELECT COUNT(favourited) FROM ass3 WHERE labelID=7 AND favourited=1";
	$result7 = $conn->query($sql);
	while($row = $result7->fetch_assoc()) {
		$spider=$row["COUNT(favourited)"];
	    }
?>
	
    	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<script type="text/javascript">
      	google.charts.load("current", {packages:["corechart"]});
      	google.charts.setOnLoadCallback(drawChart);

	
      	function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Amount'],
          ['Other',     <?php echo $other?>],
          ['Crater',      <?php echo $crater?>],
          ['Dark Dune',  <?php echo $darkDune?>],
          ['Slope Streak', <?php echo $slopeStreak?>],
          ['Bright Dune',    <?php echo $brightDune?>],
	  ['Impact Ejecta',    <?php echo $impactEjecta?>],
	  ['Swiss Cheese',    <?php echo $swissCheese?>],
	  ['Spider',    <?php echo $spider?>]
        ]);

        var options = {
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    	</script>


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

	<div class="mainDisplay">
	    <h1>Favourited distribution</h1>
	    <div id="piechart"></div>
	</div>


	<div class="buttonDisplay">
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
</body>
</html>
