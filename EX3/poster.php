<!doctype html>
<html>
<head>
</head>
<body>
<?php

$username=$_POST['answer'];
$poster=$_POST['topost'];
$checker=0;
$check=0;
if ($username=="" || $poster==""){
    
    $checker+=1;
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "alexjones", "Aep7muaf", "alexjones");
/* check connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$query = "SELECT user_id FROM USERS;";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
    //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        //echo $row["user_id"];
        if ($row["user_id"]==$username){
            
            $check+=1;
        }
    }
    $result->free();
} 
if ($check == 0){
    $checker+=1;
}

if ($checker==0){
    $final1 = "INSERT INTO POSTS ( content, authorid )
    VALUES ('$poster','$username')";
    
   
    if ($mysqli->query($final1) === TRUE) {
        echo "<br> Succesful post<br>";
    }
    else{
        echo "<br> Unsuccesful post<br>";
    }
    
}
else
{
    echo "<br> Unsuccesful post<br>";
}












$mysqli->close();
?>
</body>
</html>