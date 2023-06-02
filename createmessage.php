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
    
    
  }
  if(isset($_POST['reciever'])){
    $key=$_REQUEST['reciever'];
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

        <form action="sendmessage.php" method="POST">
        
       <center>
        
        <label>Subject:</label><br>
        <input type="text" name="subject" id="subject" value="" required><br>
        <label>Message:</label><br>
        <textarea type="textarea" rows='10' columns='200' name = "message" placeholder=""></textarea><br>
        <input type="hidden" name="reciever" value="<?php echo htmlspecialchars($key); ?>" />
        <?php
          if(isset($_POST['reply'])){
            $mid=$_POST['reply'];
            echo "$mid";
            echo "<input type='hidden' name='reply' value=$mid />";
          if(isset($_POST['reciever'])){
            $key=$_POST['reciever'];
            echo "kwy ia $key";
           echo" <input type='hidden' name='reciever' value='$key' />";
          }
          }
          
        ?>
        <input type="submit" id="Send" name="Send" value="Send" href="sendmessage.php"></input><br>
</center>
  </form>
        </div>
      
</center>
    </main>

      
       

  
</body>

</html>