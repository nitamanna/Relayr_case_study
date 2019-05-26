<?php
//Step1
function connect(){
    $config = parse_ini_file('./db.ini');
    $con = mysqli_connect($config['host'],$config['username'],$config['password'],$config['db']);
    if(!$con){
        die("Failed to connect to Database"); 
    }
    return $con;
}
?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>

<?php
//Step2
$query = "SELECT * FROM mysqldb1.Employee";
mysqli_query(connect(), $query) or die('Error querying database.');

//Step3
$result = mysqli_query(connect(), $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo '<br>' . $row['EmpId'] . ' ' . $row['FirstName'] . ': ' . $row['LastName'] . ' ' . $row['City'] . '<br/>' ;
}
//Step 4
mysqli_close(connect());
?>

</body>
</html>
