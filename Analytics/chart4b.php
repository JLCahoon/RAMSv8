<?php 
$connect = mysqli_connect ("localhost:3306","root","root","RiskManagement");
$query= "SELECT * FROM RiskManagement";
$result=mysqli_query($connect,$query);
$chart_data='';
while($row=mysqli_fetch_array ($result))
{
  $chart_data.= "{ Department:'".$row["Department"]."', Probability:".$row["Probability"].", Impact:".$row["Impact"].", PIValue:".$row["PIValue"]."}, ";
}


$chart_data.=substr ($chart_data, 0,0);
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="css/morris.css">
     
  <script src="js/jquery.min.js"></script>
  <script src="js/raphael.min.js"></script>
  <script src="js/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Detailed Analysis for Individual Risk</h2>
   <h3 align="center"> For Whole Year</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>
<script>
      Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Department',
 ykeys:['Probability', 'Impact', 'PIValue'],
 labels:['Probability', 'Impact', 'PIValue'],
 hideHover:'auto',

});
    </script>
