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
            }

        .grid-item {
          background-color: rgba(255, 255, 255, 0.8);
          border: 5px solid rgba(0, 0, 0, 0.8);
          padding: 5px;
          
        }
            .category{text-align: center}
            .buttons{ grid-area: but;}
            .grid-container {
  display: grid;
  grid-template-areas: 'myArea myArea myArea myArea1 myArea1 myArea1';
 
}
            img{width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
 }
            div.container {
  text-align: center;

}
        </style>
       <title>Mars View</title>
    </head>
    <body>
      <div style="text-align:center; font-size:25px;font-family:Comic Sans MS, cursive, sans-serif;border-bottom: 2px solid black;">
         <h1>
            Mars View
         </h1>
      </div>
        <div class="grid-container">
     <div class="pictures">
<?php
$x = 1;

while($x <= 25) {
    echo "<div class='grid-item'><div><img src='asd.png' alt='test!!!'></div> <div class='container'>
  <p>****</p>
  </div></div>";
    $x++;
}
?>
</div>
        <div class="buttons"> </div>  
            </div>
    </body>
</html>
							
