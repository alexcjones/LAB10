
<html>
 <head>
    <p> <center>USER POSTS</center></p>
 </head>
<body>
   

   <form method="post" action= "posttable.php">

      <div id = 'main'>Username: </div>
      <select name = 'input' id = 'input'>
      <option disabled selected>-- Select User ID --</option>
      <?php
        $mysqli = new mysqli("mysql.eecs.ku.edu", "alexjones", "Aep7muaf", "alexjones");
        /* check connection */
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        $query= "SELECT user_id FROM USERS";
        $result = $mysqli->query($query);
       // $records = mysqli_query($mysqli, $query);  // Use select query here 

        //while($data = mysqli_fetch_array($records))
        //{
        //    echo "<option value='". $data['user_id'] ."'></option>";  // displaying data in option menu
        //}

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='". $row['user_id'] ."'>". $row[user_id] . "</option>";
                
            }
        }
        $result->free();
        
        
      ?>  
      </select>
      
      <input type="submit" ><br>
    </form>

    <?php $mysqli->close(); ?>
</body>

</html>

