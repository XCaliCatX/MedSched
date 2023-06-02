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
  $rows=0;
  $nrows=0;
  
  
  if(isset($_POST['submit'])){
    $key=$_REQUEST['radio'];
    $sql=$pdo->prepare('SELECT * FROM availability WHERE UserID = :keyword ORDER BY CASE WHEN AvailableDay = "Monday" THEN 1
    WHEN AvailableDay = "Tuesday" THEN 2
    WHEN AvailableDay = "Wednesday" THEN 3
    WHEN AvailableDay = "Thursday" THEN 4
    WHEN AvailableDay = "Friday" THEN 5
    WHEN AvailableDay = "Saturday" THEN 6
    WHEN AvailableDay = "Sunday" THEN 7
    ELSE 8 END');
    $sql-> bindValue(':keyword',$key,PDO::PARAM_STR);
    $sql->execute();
    $results = $sql->fetchAll();
    $rows=$sql->rowCount();


    $othername=$pdo->prepare('SELECT * FROM users WHERE UserID= :keyword');
    $othername-> bindValue(':keyword',$key,PDO::PARAM_STR);
    $othername->execute();
    $nameresults = $othername->fetchAll();
    $nrows=$othername->rowCount();

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
        <center><?php
        if($nrows!=0){
            foreach($nameresults as $r){
                echo"<div> <h1>{$r['FName']} {$r['LName']}'s Availability </h1> </div>";
        }
        }
      if($rows !=0){
        echo "
            <div><table class=\"demoTable\">
            <thead>
            <tr>
            <th>Available Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            </tr>
            </thead>
            <tbody>
                ";
        foreach($results as $r){
            echo "
                <tr>
                <td>{$r['AvailableDay']}</td>
                <td>{$r['StartTime']}</td>
                <td>{$r['EndTime']}</td>
                </tr>
                ";
        }
        echo "</tbody></table></div>";
    }else{
        echo '<h4>No availability Posted';
    };
    
        ?>

        <form action="appointment.php" method="POST">
        <label for="meeting-date"><h2>Choose a date and time for your appointment:</h2></label><br>
        <label>Date</label>
        <input type="date" id="meeting-date" name="meeting-date" value=<?php date("Y-m-d")?>></input>
        <label>Start Time</label>
        <input type="time" id="starttime"name="starttime" value="" >
        <label>End Time</label>
        <input type="time" id="endtime"name="endtime" value="" ><br>
        <textarea type="textarea" rows='4' columns='50' name='Location' placeholder='Location'></textarea>
        <textarea type="textarea" rows='4' columns='50' name = "notes" placeholder="Notes"></textarea>
        <input type="hidden" name="reciever" value="<?php echo htmlspecialchars($key); ?>" />
        <input type="submit" id="makeapp" name="makeapp" value="Submit" href="appointment.php"></input>
  </form>
        </div>
      
</center>
    </main>

      
       

  
</body>

</html>