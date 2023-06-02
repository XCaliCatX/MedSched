<!DOCTYPE html>
<html>
  <?php
  session_start();
  include "dbconnection.php";
  if($_SESSION['logged in'] != 'y'){
    header("location:home.html");
  }; 
  $ID = $_SESSION['id'];
  $Email = $_SESSION['email'];

  $sql = "SELECT FName,LName,Specialty,Location,FoodPreferences,Contact,Company FROM users WHERE UserID='$ID'";
            if(mysqli_query($conn, $sql)){
                $retval = mysqli_query($conn,$sql);
                if(mysqli_num_rows($retval)>0){
                    $row = mysqli_fetch_assoc($retval);
                }
                $Fname = $row['FName'];
                $Lname = $row['LName'];
                $Specialty = $row['Specialty'];
                $Loc = $row['Location'];
                $Pref = $row['FoodPreferences'];
                $Con = $row['Contact'];
                $Comp = $row['Company'];
    
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
function changeDateTimeFormat($orgST,$orgET){
  $newST = date('h:i a', strtotime($orgST));
  $newET = date('h:i a', strtotime($orgET));
  return [$newST,$newET];
}
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Monday'";
    if(mysqli_query($conn,$sql)){
      $retval = mysqli_query($conn,$sql);
      if(mysqli_num_rows($retval)>0){
        $row = mysqli_fetch_assoc($retval);
        $MST = $row['StartTime'];
        $MET = $row['EndTime'];
        if($MST == "00:00:00"){
          $MST = 'Unavailable';
          $MET = 'Unavailable';
        }
        if($MET == "00:00:00"){
          $MST = 'Unavailable';
          $MET = 'Unavailable';
        }
      }else{
        $MST = 'Unavailable';
        $MET = 'Unavailable';
      }
      if($MST!='Unavailable'&& $MET!='Unavailable'){
        [$MST,$MET] = changeDateTimeFormat($MST,$MET);

      }
    }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Tuesday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $TST = $row['StartTime'];
      $TET = $row['EndTime'];
      if($TST == "00:00:00"){
        $TST = 'Unavailable';
        $TET = 'Unavailable';
      }
      if($TET == "00:00:00"){
        $TST = 'Unavailable';
        $TET = 'Unavailable';
      }
    }else{
      $TST = 'Unavailable';
      $TET = 'Unavailable';
    }
    if($TST!='Unavailable'&& $TET!='Unavailable'){
      [$TST,$TET] = changeDateTimeFormat($TST,$TET);

    }
  }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Wednesday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $WST = $row['StartTime'];
      $WET = $row['EndTime'];
      if($WST == "00:00:00"){
        $WST = 'Unavailable';
        $WET = 'Unavailable';
      }
      if($WET == "00:00:00"){
        $WST = 'Unavailable';
        $WET = 'Unavailable';
      }
    }else{
      $WST = 'Unavailable';
      $WET = 'Unavailable';
    }
    if($WST!='Unavailable'&& $WET!='Unavailable'){
      [$WST,$WET] = changeDateTimeFormat($WST,$WET);

    }
  }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Thursday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $THST = $row['StartTime'];
      $THET = $row['EndTime'];
      if($THST == "00:00:00"){
        $THST = 'Unavailable';
        $THET = 'Unavailable';
      }
      if($THET == "00:00:00"){
        $THST = 'Unavailable';
        $THET = 'Unavailable';
      }
    }else{
      $THST = 'Unavailable';
      $THET = 'Unavailable';
    }
    if($THST!='Unavailable'&& $THET!='Unavailable'){
      [$THST,$THET] = changeDateTimeFormat($THST,$THET);

    }
  }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Friday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $FST = $row['StartTime'];
      $FET = $row['EndTime'];
      if($FST == "00:00:00"){
        $FST = 'Unavailable';
        $FET = 'Unavailable';
      }
      if($FET == "00:00:00"){
        $FST = 'Unavailable';
        $FET = 'Unavailable';
      }
    }else{
      $FST = "Unavailable";
      $FET = 'Unavailable';
    }
    if($FST!='Unavailable'&& $FET!='Unavailable'){
      [$FST,$FET] = changeDateTimeFormat($FST,$FET);

    }
  }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Saturday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $SST = $row['StartTime'];
      $SET = $row['EndTime'];
      if($SST == "00:00:00"){
        $SST = 'Unavailable';
        $SET = 'Unavailable';
      }
      if($SET == "00:00:00"){
        $SST = 'Unavailable';
        $SET = 'Unavailable';
      }
    }else{
      $SST = 'Unavailable';
      $SET = 'Unavailable';
    }
    if($SST!='Unavailable'&& $SET!='Unavailable'){
      [$SST,$SET] = changeDateTimeFormat($SST,$SET);

    }
  }
  $sql = "SELECT StartTime,EndTime FROM availability where UserID='$ID' AND AvailableDay = 'Sunday'";
  if(mysqli_query($conn,$sql)){
    $retval = mysqli_query($conn,$sql);
    if(mysqli_num_rows($retval)>0){
      $row = mysqli_fetch_assoc($retval);
  
      $SUST = $row['StartTime'];
      $SUET = $row['EndTime'];
      if($SUST == "00:00:00"){
        $SUST = 'Unavailable';
        $SUET = 'Unavailable';
      }
      if($SUET == "00:00:00"){
        $SUST = 'Unavailable';
        $SUET = 'Unavailable';
      }
    }else{
      $SUST = 'Unavailable';
      $SUET = 'Unavailable';
    }
    if($SUST!='Unavailable'&& $SUET!='Unavailable'){
      [$SUST,$SUET] = changeDateTimeFormat($SUST,$SUET);

    }
    
    $conn->close();
  }
  ?>
    <head>
        <link rel="stylesheet" href="css/user.css" />
    </head>
    <body>
      <?php
      include "navbar.php";
      ?>
        
            
            <main class="main">
            <div class = "display">
              <h1>Hello <?=$Fname ?>!</h1>
              <p id="email">Email: <?=$Email ?></p>
              <p>Name: <?=$Fname?> <?=$Lname?></p>
              <p>Specialty: <?=$Specialty?></p>
              <p>Location: <?=$Loc?></p>
              <p>Food Preferences: <?=$Pref?></p>
              <p>Phone Number: <?=$Con?></p>
              <p>Company: <?=$Comp?></p>
              <table style="width:100%" >
                <caption><b>Availability</b></caption>
                <tr>
                  <th>Day</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                </tr>
                <tr>
                  <td>Monday</td>
                  <td><?=$MST?></td>
                  <td><?=$MET?></td>
                </tr>
                <tr>
                  <td>Tuesday</td>
                  <td><?=$TST?></td>
                  <td><?=$TET?></td>
                  
                </tr>
                <tr>
                  <td>Wednesday</td>
                  <td><?=$WST?></td>
                  <td><?=$WET?></td>
                  
                </tr>
                <tr>
                  <td>Thursday</td>
                  <td><?=$THST?></td>
                  <td><?=$THET?></td>
                  
                  
                </tr>
                <tr>
                  <td>Friday</td>
                  <td><?=$FST?></td>
                  <td><?=$FET?></td>
                  
                </tr>
                <tr>
                  <td>Saturday</td>
                  <td><?=$SST?></td>
                  <td><?=$SET?></td>
                  
                </tr>
                <tr>
                  <td>Sunday</td>
                  <td><?=$SUST?></td>
                  <td><?=$SUET?></td>
                  
                </tr>

              </table>

              
            <form action = "update.php" method="POST">
              <center><input type="submit" name="Update" value = "Update" href="update.php"></center>
</form>   
</div>      
            </main>
            <footer class="footer">&copy;Med-Sched </footer>
          </div>
      
        
    </body>
    
</html>