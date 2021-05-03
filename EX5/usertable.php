<!doctype html>
<html>
<head>
</head>
<body>
<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "alexjones", "Aep7muaf", "alexjones");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$query= "SELECT * FROM USERS";

$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row["user_id"]. "<br>";
        
    }
}
$mysqli->close();
?>
</body>
</html>