<?php
session_start();
include "dbconnection.php";
if($_SESSION['logged in'] != 'y'){
  header("location:home.html");
}; 
$ID = $_SESSION['id'];
$Email = $_SESSION['email'];
if(isset($_POST['makeapp'])){
    $date=$_REQUEST['meeting-date'];
    $ST=$_REQUEST['starttime'];
    $ET=$_REQUEST['endtime'];
    $notes=$_REQUEST['notes'];
    $reciever=$_REQUEST['reciever'];
    $location = $_REQUEST['Location'];

    //get recieving user food pref, Location
    //append to notes
    $sql=$pdo->prepare("SELECT FoodPreferences FROM users WHERE UserID=$reciever");
    $sql->execute();
    $results=$sql->fetchAll();
    $rows = $sql->rowCount();
    if($rows>0){
        foreach($results as $r){
        $notes = "Notes:".$notes.", Food Preferences:".$r['FoodPreferences'];
    }}



    $sql="INSERT INTO appointments (`AppointmentID`,`RequesterID`,`ReceiverID`,`AppointmentDate`,`AppointmentStartTime`,`AppointmentEndTime`,`AppointmentStatus`,`AppointmentNotes`,`Location`) VALUES ('NULL','$ID','$reciever','$date','$ST','$ET','Requested','$notes','$location')";
    
    if(mysqli_query($conn, $sql)){
        echo "<h3>User added"
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    header("Location:appointments.php");
}
    $conn->close();
 
?>