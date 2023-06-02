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
  
  $sql=$pdo->prepare("SELECT DISTINCT * FROM messages WHERE ToID =$ID OR FromID=$ID ORDER BY DateTime DESC");
  $sql->execute();
  $results=$sql->fetchAll();
  $rows =$sql->rowCount();

  function getUserNames($to,$from){
    include "dbconnection.php";
    $sql=$pdo->prepare("Select FName,LName From users WHERE UserId=$to");
    $sql->execute();
    $tor=$sql->fetchAll();
    $toname="";
    foreach ($tor as $t) {
        $toname= $t['FName']." ".$t['LName'];
    }
    $sql=$pdo->prepare("Select FName,LName From users WHERE UserId=$from");
    $sql->execute();
    $fro=$sql->fetchAll();
    $froname="";
    foreach ($fro as $f){
        $froname= $f['FName']." ".$f['LName'];
    }
    return [$toname,$froname];
  }

  ?><head>
  <link rel="stylesheet" href="css/user.css" />
</head>
<body>
<?php
      include "navbar.php";
      ?>

    <main class="main">
            <center>
            <form action='newmessage.php' method='GET'>
            <input type="submit" value="New Message" style="width:200px">
        </form>
    
            <?php
            if($rows>0){
               
                echo "<div><table>
                <thead>
                <tr>
                <th>To</th>
                <th>From</th>
                <th>Subject</th>
                <th>Status</th>
                <th>View</th>
                
                </tr>
                </thead>
                <tbody>
                ";
                foreach($results as $r){
                    [$to,$from]=getUserNames($r['ToID'],$r['FromID']);
                    $key = $r['MessageID'];
                    echo"
                    
                    <tr>
                    <td>$to</td>
                    <td>$from</td>
                    <td>{$r['Subject']}</td>
                    <td>{$r['Status']}</td>
                    <form action='viewmessages.php' method='POST'>
                    <input type='hidden' name='message' id='message' value=$key>
                    <td><input type='submit' name='submit' value='View' href='viewmessages.php'></td>
                    </form>
                ";
                }
                
            }else{
                echo "<p>No Messages</p>";
            }
            ?>
        <form>

           
        </div>

    </main>

      
       

  
</body>

</html>