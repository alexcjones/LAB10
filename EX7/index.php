
<html>
 <head>
    <p> <center>POST SYTEM</center></p>
    
 </head>
<body>
    <p>Author________________________________________________________________________Post________________________________________________________________________Delete</p>
    
   <form method="post" action= "delete.php">

      <div id = 'main'></div>
      
     
      <?php
        
        $mysqli = new mysqli("mysql.eecs.ku.edu", "alexjones", "Aep7muaf", "alexjones");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $query= "SELECT content, postid, authorid FROM POSTS";
        $result = $mysqli->query($query);
       // $records = mysqli_query($mysqli, $query);  // Use select query here 

        //while($data = mysqli_fetch_array($records))
        //{
        //    echo "<option value='". $data['user_id'] ."'></option>";  // displaying data in option menu
        //}

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row['authorid'];
                echo "_____________________________________________________________________";
                echo $row['content'];
                echo "_____________________________________________________________________";
                $id=strval($row['postid']);
                $name = "n".$id;
                
                echo "<input type = 'checkbox' name='". $name ."'><br></option>";
                
            }
        }
        $result->free();
        
        
      ?>  
      
      
      <input type="submit" ><br>
    </form>

    <?php $mysqli->close(); ?>
</body>

</html>

