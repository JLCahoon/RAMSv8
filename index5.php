<?php

$conn=mysqli_connect("localhost:3306","root","root","RiskManagement");


$start=0;
$limit=2;
// limit=1,2;
// limit=2,2;

$t=mysqli_query($conn,"select * from RiskManagement");
$total=mysqli_num_rows($t);



if(isset($_GET['RiskID']))
{
	$id=$_GET['RiskID'];
	$start=($id-1)*$limit;
	//$start=2*1;
	//$start=2;
}
else
{
	$id=1;
}
$page=ceil($total/$limit);

$query=mysqli_query($conn,"select * from RiskManagement limit $start,$limit");
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Risk Registers</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Risk Id</th>
        <th>RiskName</th>
        <th>Category</th>
        <th>Description</th>
        <th>Probability</th>
          
        <th>ProbabilityJustficatio</th>
        <th>Impact</th>
        <th>ImpactJustification</th>
        <th>PIValue</th>
        <th>Priority</th>
          
        <th>RiskStatus</th>
        <th>Owner</th>
        <th>Response</th>
        <th>Mitigation</th>
        <th>MitigationStatus</th>
          
        <th>Financial</th>
        <th>Department</th>  
          
          
      </tr>
    </thead>
    <tbody>
	
	<?php
	while($ft=mysqli_fetch_array($query))
	{?>
	 <tr>
        <td><?= $ft['0']?></td>
        <td><?= $ft['1']?></td>
        <td><?= $ft['2']?></td>
        <td><?= $ft['3']?></td>
        <td><?= $ft['4']?></td>
         
        <td><?= $ft['5']?></td>
        <td><?= $ft['6']?></td>
        <td><?= $ft['7']?></td>
        <td><?= $ft['8']?></td>
        <td><?= $ft['9']?></td>
         
        <td><?= $ft['10']?></td>
        <td><?= $ft['11']?></td>
        <td><?= $ft['12']?></td>
        <td><?= $ft['13']?></td>
        <td><?= $ft['14']?></td>
         
        <td><?= $ft['15']?></td>
        <td><?= $ft['16']?></td>
        
      </tr>
	<?php
	}
	
	?>


    </tbody>
  </table>
  <ul class="pagination">
	 <?php if($id > 1) {?> <li><a href="?id=<?php echo ($id-1) ?>">Previous</a></li><?php }?>
	 <?php
	 for($i=1;$i <= $page;$i++){
	 ?>
		<li><a href="?RiskID=<?php echo $i ?>"><?php echo $i;?></a></li>
	  <?php
	 }
	  ?>
	<?php if($id!=$page)
	//3!=4
	{?> 
	  <li><a href="?RiskID=<?php echo ($id+1); ?>">Next</a></li>
	<?php }?>
 </ul>
  
  
</div>

</body>
</html>

