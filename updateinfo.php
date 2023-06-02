<?php
  session_start();
  include "dbconnection.php";
  if($_SESSION['logged in'] != 'y'){
    header("location:home.html");
  }; 
  $ID = $_SESSION['id'];
  $Email = $_SESSION['email'];


  if ($_POST['email']!=""){
    $Email= $_REQUEST['email'];
    $_SESSION['email']= $Email;
    $sql = "UPDATE user_login SET Email='$Email' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['FName']!=""){
    $FName= $_REQUEST['FName'];
    
    $sql = "UPDATE users SET FName='$FName' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['LName']!=""){
    $LName= $_REQUEST['LName'];
    
    $sql = "UPDATE users SET LName='$LName' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['specialty']!=""){
    $Spe= $_REQUEST['specialty'];
    
    $sql = "UPDATE users SET Specialty='$Spe' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['location']!=""){
    $Loc= $_REQUEST['location'];
    if($Loc!=''){
    $sql = "UPDATE users SET Location='$Loc' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
 } };
  if ($_POST['Preferences']!=""){
    $Pref= $_REQUEST['Preferences'];
    
    $sql = "UPDATE users SET FoodPreferences='$Pref' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['contact']!=""){
    $Con= $_REQUEST['contact'];
    
    $sql = "UPDATE users SET Contact='$Con' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };
  if ($_POST['company']!=""){
    $Com= $_REQUEST['company'];
    
    $sql = "UPDATE users SET Company='$Com' WHERE UserID=$ID";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  };

 
if(isset($_POST["MoET"]) && isset($_POST["MoET"])){
    if(isset($_POST['Mon'])){
        echo "Check Mark Detected";
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Monday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["MoST"];
        $ET = $_POST["MoET"];
        $Day = "Monday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["TET"]) && isset($_POST["TET"])){
    if(isset($_POST['Tues'])){
        echo "Check Mark Detected";
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Tuesday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["TST"];
        $ET = $_POST["TET"];
        $Day = "Tuesday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["WET"]) && isset($_POST["WET"])){
    if(isset($_POST['Weds'])){
        echo "Check Mark Detected";
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Wednesday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["WST"];
        $ET = $_POST["WET"];
        $Day = "Wednesday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["THET"]) && isset($_POST["THET"])){
    if(isset($_POST['Thurs'])){
        echo "Check Mark Detected";
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Thursday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["THST"];
        $ET = $_POST["THET"];
        $Day = "Thursday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["FET"]) && isset($_POST["FET"])){
    if(isset($_POST['Fri'])){
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Friday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["FST"];
        $ET = $_POST["FET"];
        $Day = "Friday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["SET"]) && isset($_POST["SET"])){
    if(isset($_POST['Sat'])){
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Saturday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }else{
        $ST = $_POST["SST"];
        $ET = $_POST["SET"];
        $Day = "Saturday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
if(isset($_POST["SUET"]) && isset($_POST["SUET"])){
    if(isset($_POST['Sun'])){
        echo "Check Mark Detected";
        $ST = '00:00:00';
        $ET = '00:00:00';
        $Day = 'Sunday';
        $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)==0){
            $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }else{
            $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    
    }else{
        $ST = $_POST["SUST"];
        $ET = $_POST["SUET"];
        $Day = "Sunday";
        if($ST==''){
            
        }elseif($ET==''){

        }
        else{
            $sql = "SELECT * FROM availability WHERE UserID='$ID' AND AvailableDay='$Day'";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)==0){
                $sql = "INSERT INTO availability(UserID,AvailableDay,StartTime,EndTime) VALUES ('$ID','$Day', '$ST','$ET')";
                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully";
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE availability SET StartTime='$ST',EndTime='$ET' WHERE UserID='$ID' AND AvailableDay='$Day'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
    }
    }
}
  mysqli_close($conn);
  header("location:index.php");
  



  ?>
  