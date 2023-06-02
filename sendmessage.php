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
  
  
  

  if(isset($_POST["Send"])){
    
    $reciever=$_POST['reciever'];
    echo "$reciever";
    $message=$_POST['message'];
    $subject=$_POST['subject'];
    date_default_timezone_set("America/Los_Angeles");
    $datetime= date('Y-m-d h:m:s');
    $status='Sent';
    $sql=$pdo->prepare("INSERT INTO messages(`ToID`,`FromID`,`Message`,`DateTime`,`Status`,`Subject`) VALUES ('$reciever','$ID','$message','$datetime','$status','$subject')");
    if($sql->execute()){
        echo "inputed message";
    }else{
        echo "message not inputed";
    }
  }
  if(isset($_POST['reply'])){
    $mID = $_POST['reply'];
    echo $mID;
    $sql=$pdo->prepare("UPDATE messages SET status='Replied' WHERE MessageID=$mID");
    $sql->execute();
  }
  header("location:messages.php");
  ?>
  </html>