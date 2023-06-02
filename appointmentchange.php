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
  if(isset($_POST['AppID'])){
    $appid=$_POST['AppID'];
    echo htmlspecialchars($appid);
  }
  if(isset($_POST['accept'])){
    echo "accept";
    
    $sql = $pdo->prepare("UPDATE appointments SET AppointmentStatus ='Accepted' WHERE AppointmentID=$appid");
    if($sql->execute()){
        echo "changed";
    }else{
        echo "unsuccessful accept";
    };  
        
    }
    if(isset($_POST['Deny'])){
        echo "deny";
        
        $sql = $pdo->prepare("UPDATE `appointments` SET `AppointmentStatus` = 'Denied' WHERE `appointments`.`AppointmentID` = $appid");
        if($sql->execute()){
            echo "changed";
        }else{
            echo "unsuccessful denial";
        };  
        }
     if(isset($_POST['cancel'])){
        echo "cancel";
        
        $sql = $pdo->prepare("UPDATE appointments SET AppointmentStatus ='Cancelled' WHERE AppointmentID=$appid");
        if($sql->execute()){
            echo "changed";
        }else{
            echo "unsuccessful cancel";
        };  

            
    }

    header("Location:appointments.php");
    
    
  ?>