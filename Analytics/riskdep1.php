<?php    
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "RiskManagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Department, COUNT(Department) FROM RiskManagement
   GROUP BY Department";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<table><tr><th>Department With</h1></th></tr><tr><th>Highest Numbers of Risks</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>Department: ".$row["Department"]."</td> <td>Risks: ".$row["COUNT(Department)"]."</td></tr>";        
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
    