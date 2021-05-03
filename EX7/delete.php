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
    
       
    
    $i=1;
    $b="";
    $name="n";
  
        $i=10;
        while ($i<150){
            $b=strval($i);
           
            $name="n".$b;
            
            
            $mynew = $_POST[$name];
            if ($mynew=="on"){
                
                $q2 = "DELETE FROM POSTS WHERE postid='$i'";
                if ($mysqli->query($q2) === TRUE) {
                    echo "Record deleted successfully<br>";
                } 
                else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
            $i+=1;
        }
    







    $mysqli->close();
?>
</body>
</html>