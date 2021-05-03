<!doctype html>
<html>
<head>
</head>
<body>
<?php

$username = $_POST["input"];
$counter = 0;
$query= "SELECT postid, content FROM POSTS WHERE authorid = '$username'";

$mysqli = new mysqli("mysql.eecs.ku.edu", "alexjones", "Aep7muaf", "alexjones");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Post ID : " . $row["postid"]. "<br> Post : " . $row["content"] . "<br><br><br>";
        $counter+=1;
        
    }
}
if ($counter==0){
    echo "This user has made no posts";
}
$mysqli->close();
?>
</body>
</html>