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
  if(isset($_POST['search'])){
    $key=$_REQUEST['key'];
    $sql = $pdo->prepare('SELECT UserID,FName,LName,Specialty,Location, FoodPreferences, Company,AccountType FROM users WHERE FName LIKE :keyword OR LName LIKE :keyword OR Location LIKE :keyword OR Company LIKE :keyword OR Specialty LIKE :keyword OR AccountType LIKE :keyword');
    $sql-> bindValue(':keyword','%'.$key.'%',PDO::PARAM_STR);
    $sql->execute();
    $results = $sql->fetchAll();
    $rows=$sql->rowCount();
  }
  ?><head>
  <link rel="stylesheet" href="css/user.css" />
</head>
<body>
<?php
      include "navbar.php";
      ?>

    <main class="main">
        <h1>Search</h1>
        <form action="search.php" method="post">
            <input type="text" placeholder="Search" name="key">
            <input type="submit" value="Submit" name="search">
        </form><br>
        <div>
            <?php 
            echo "<form action='makeapp.php' method='post'>";
            if($rows !=0){
                echo "
                    <h2>Select another user to create an appointment:</h2>
                    <div><table class=\"demoTable\">
                    <thead>
                    <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Specialty</th>
                    <th>Location</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th>Food Pref.</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                        ";
                foreach($results as $r){
                    echo "
                        <tr>
                        <td><input type='radio' id='user' name= 'radio' value='{$r['UserID']}'></td>
                        <td>{$r['FName']} {$r['LName']}</td>
                        <td>{$r['Specialty']}</td>
                        <td>{$r['Location']}</td>
                        <td>{$r['Company']}</td>
                        <td>{$r['AccountType']}</td>
                        <td>{$r['FoodPreferences']}</td>
                        </tr>
                        ";
                }
                echo "</tbody></table></div>";
                echo "<input type='submit' name='submit' value='Create'>";
                echo "</form>";
            }
            
            ?>
        </div>

    </main>

      
       

  
</body>

</html>