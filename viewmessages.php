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
  
  if($_POST['submit']== "View"){

    $mID=$_POST['message'];
    $sql=$pdo->prepare("Select * FROM messages WHERE MessageID=$mID");
    $sql->execute();
    $results=$sql->fetchAll();
    $rows =$sql->rowCount();
    if($rows==1){
        foreach ($results as $r){
            $subject=$r['Subject'];
            $message=$r['Message'];
            $datetime=strtotime($r['DateTime']);
            $datetime=date('m/d/Y h:i A',$datetime);
            $to=$r['ToID'];
            
            if($r['ToID']== $ID){
                $key=$r['FromID'];
                
            }else{
                $key=$r['ToID'];
                
            }
            [$to,$from]=getUserNames($r['ToID'],$r['FromID']);
            
        
            if($ID == $r['ToID']){
                $sql=$pdo->prepare("UPDATE messages SET status='Read' WHERE MessageID=$mID");
                $sql->execute();
            

            }
        }
    }
    
}
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
           <form action='messages.php' method='GET'>
           <input type="submit" value="All Messages" href="messages.php" style="width:200px;"><br>
</form>
</center>
            <?php
            
                    
                echo"
                
                <br>
                    <p>To:$to</p><p>From:$from </p>
                    <p>When:$datetime</p>
                    <p>Subject: $subject</p>
                    <p>Message:<br>$message</p>
                 \

                ";
                
           
            ?>
            <center>
            
           
        </form>
        

           
        </div>

    </main>

      
       

  
</body>

</html>