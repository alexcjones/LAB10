<!doctype html>
<html>
<head>
</head>
<body>
<?php

$userinput=$_POST['answer'];
$checker=0;
if ($userinput==""){
    
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
        if ($row["user_id"]==$userinput){
            
            $checker+=1;
        }
    }
    $result->free();
}   
if ($checker==0){
    $final1 = "INSERT INTO USERS ( user_id )
    VALUES ('$userinput')";
    
   
    if ($mysqli->query($final1) === TRUE) {
        echo "<br> Succesful input<br>";
    }
    else{
        echo "<br> Unsuccesful input<br>";
    }
    
}
else
{
    echo "<br> Unsuccesful input<br>";
}


$mysqli->close();
?>
</body>
</html>


