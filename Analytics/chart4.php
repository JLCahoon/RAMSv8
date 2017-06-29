<?php 
$connect = mysqli_connect ("localhost:3306","root","root","RiskManagement");
$query= "SELECT*FROM RiskManagement";
$result=mysqli_query($connect,$query);
$chart_data='';
while($row=mysqli_fetch_array ($result))
{
    
   /* $chart_data.= "{'".$row["Financial"]."',".$row["Probability"].", ".$row["Impact"].", ".$row["PIValue"]."}, ";
}
$chart_data.=substr ($chart_data, 0,-2); // <div id="myfirstchart" style="height: 250px;"></div>
    */

   $chart_data.= "{ Department:'".$row["Department"]."', Probability:".$row["Probability"].", Impact:".$row["Impact"].", PIValue:".$row["PIValue"]."}, ";
}
   $chart_data=substr($chart_data, 0,-1);

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
 </head>
    
 <body>
  <br /><br />
     
     <div class="container" style="width:700px;">
  
   <h2 align="center">Detailed Analysis for Individual Risk</h2>
   <h3 align="center"> Graphical Attitudes</h3>   
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
          xLabels:['aa','bb','cc','dd','ee'],
 hideHover:'auto',
 stacked:true
});
    </script>
