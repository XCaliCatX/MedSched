<!DOCTYPE html>
<html>
  <?php
  //check session and open db connection
  session_start();
  include "dbconnection.php";
  if($_SESSION['logged in'] != 'y'){
    header("location:home.html");
  }; 

  //get appointments for user
  $ID = $_SESSION['id'];
  $Email = $_SESSION['email'];

  $key = $ID;
  $sql = $pdo->prepare("SELECT * FROM appointments WHERE ReceiverID=$key OR RequesterID='$key' AND AppointmentDate > CURRENT_TIMESTAMP ORDER BY AppointmentDate,AppointmentStartTime");
  $sql->execute();
  $results = $sql->fetchAll();
  $rows=$sql->rowCount(); 

    // get names associated with specified id
    function getName($ID){
      include "dbconnection.php";
      $sql=$pdo->prepare("SELECT FName, LName FROM users WHERE UserID=$ID");
      $sql->execute();
      $names=$sql->fetchAll();
      $rown=$sql->rowCount();
      if($rown!=0){
        foreach($names as $n){
          $FName=$n['FName'];
          $LName=$n['LName'];
          return [$FName,$LName];
        }
      }
    }
    function changeDateTimeFormat($orgdate,$orgST,$orgET){
      $newdate=date("m/d/Y",strtotime($orgdate));
      $newST = date('h:i a', strtotime($orgST));
      $newET = date('h:i a', strtotime($orgET));
      return [$newdate,$newST,$newET];
    }
  $conn->close();
  ?><head>
  <link rel="stylesheet" href="css/user.css" />
</head>
<body>
<?php
      include "navbar.php";
      ?>

    <main class="main">
        <center><?php
       
      if($rows !=0){
        //create table headers
        echo "
       
        <label><b>Appointments</b></label>
            <div><table class=\"demoTable\">
            <thead>
            <tr>
            <th>Requester</th>
            <th>Reciever</th>
            <th>Date</th>
            <th>Time</th>
            <th>Details</th>
            <th>Location</th>
            </tr>
            </thead>
            <tbody>
                ";
        foreach($results as $r){

          //check appointment status to display actions
          
            [$RFName, $RLName]=getName($r['RequesterID']);
            [$RcFName, $RcLName]=getName($r['ReceiverID']);
            $appID=$r['AppointmentID'];

            $abutton="<input type='submit' name='accept' value='Accept' href='appointmentchange.php'></input>";
            $dbutton="<input type='submit' name='deny' value='Deny' href='appointmentchange.php'></input>";
            $cbutton="<input type='submit' name='cancel' value='Cancel' href='appointmentchange.php'></input>";
            [$refdate,$refST,$refET] = changeDateTimeFormat($r['AppointmentDate'],$r['AppointmentStartTime'],$r['AppointmentEndTime']);
            if($r['ReceiverID']==$ID && $r['AppointmentStatus']=="Requested"){
              $html="<td>".$abutton." ".$dbutton."</td>";
            }elseif($r['RequesterID']==$ID && $r['AppointmentStatus']=="Requested"){
              $html="<td><center>Pending...</center>".$cbutton."</td>";
            }elseif($r['ReceiverID']==$ID && $r['AppointmentStatus']=="Cancelled"){
            $html="<td><center><b><font color='red'> Cancelled</font></b></center></td>";
          }elseif($r['RequesterID']==$ID && $r['AppointmentStatus']=="Cancelled"){
            $html="<td><center><b><font color='red'> Cancelled</font></b></center></td>";
          }elseif($r['RequesterID']==$ID && $r['AppointmentStatus']=="Denied"){
            $html="<td><b><font color='red'> Denied</font></b></td>";
          }elseif($r['ReceiverID']==$ID && $r['AppointmentStatus']=="Denied"){
            $html="<td><b><font color='red'> Denied</font></b></td>";
          }elseif($r['ReceiverID']==$ID && $r['AppointmentStatus']=="Accepted"){
            $accepted="<b><font color='Green'> Accepted</font></b>";
            $html="<td><center>".$accepted."</center> ".$cbutton."</td>";
          }
          else{
              $cbutton="<input type='submit' name='cancel' value='cancel' href='appointmentchange.php'></input>";
              $html="<td>".$cbutton."</td>";
            }
            //display appointment details and actions in table
            echo "
             <form action='appointmentchange.php' method='POST'>
                <tr>
                <td>$RFName $RLName </td>
                <td>$RcFName $RcLName</td>
                <td>$refdate</td>
                <td nowrap='nowrap'>$refST - $refET</td>
                <td>{$r['AppointmentNotes']}</td>
                <td>{$r['Location']}</td>
                <input type='hidden' name='AppID' value=$appID />
                $html
                
                </tr>
                "; 
                echo "</form>";
        }
        echo "</tbody></table></div>";
       
       
    }else{
        echo '<h4>No appointments';
    }

        echo"
        <form action='pastappointments.php' method='POST'>
        <input type='submit' style='width:200px' value='Past Appointments'>
        </form>"
        
        ?>
       
       
        </div>
</center>
    </main>

      
       

  
</body>

</html>