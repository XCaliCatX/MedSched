<?php

//update servername,username,password if needed.
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS medschedke";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
$db="medschedke";
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users(
    UserID INT(11) AUTO_INCREMENT PRIMARY KEY,
    FName VARCHAR(100),
    LName VARCHAR(100),
    Specialty VARCHAR(50),
    Location VARCHAR(200),
    FoodPreferences VARCHAR(200),
    Contact VARCHAR(200),
    Company VARCHAR(200),
    AccountType VARCHAR(15)
    )
    ";
if ($conn->query($sql) === TRUE) {
 
} else {
  echo "Error creating table users: " . $conn->error;
}

// Create users_login table
$sql = "CREATE TABLE IF NOT EXISTS user_login(
    UserID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(255),
    Password VARCHAR(20)
    )
    ";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating users_login: " . $conn->error;
}

// Create appointments table
$sql = "CREATE TABLE IF NOT EXISTS appointments(
    AppointmentID INT(11) AUTO_INCREMENT PRIMARY KEY,
    RequesterID int(11),
    ReceiverID int(11),
    AppointmentDate Date,
    AppointmentStartTime time,
    AppointmentEndTime time,
    AppointmentStatus varchar(50),
    AppointmentNotes varchar(200),
    Location varchar(100)
    )

    ";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table appointments: " . $conn->error;
}
// Create availability table
$sql = "CREATE TABLE IF NOT EXISTS availability(
    UserID INT(11),
    AvailableDay VARCHAR(50),
    StartTime time,
    EndTime time
    )

    ";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating table availability: " . $conn->error;
}
// Create messages table
$sql = "CREATE TABLE IF NOT EXISTS messages(
    MessageID INT(11) AUTO_INCREMENT PRIMARY KEY,
    ToID INT(11),
    FromID INT(11),
    Message varchar(500),
    DateTime datetime,
    Status varchar(50),
    Subject varchar(100)
    )

    ";
if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error creating messages: " . $conn->error;
}

//insert if users empty does not exist
$sql=$pdo->prepare("SELECT * FROM user_login");
$sql->execute();
$results=$sql->fetchAll();
$rows =$sql->rowCount();
if($rows == 0){
    $sql="INSERT INTO user_login(`UserID`,`Email`,`Password`) VALUES (NULL,'admin@admin.com','Admin')";
    if ($conn->query($sql) === TRUE) {
      
      } else {
        echo "Error creating database: " . $conn->error;
      }
      $sql="INSERT INTO user_login(`UserID`,`Email`,`Password`) VALUES (NULL,'admin2@admin.com','Admin2')";
    if ($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error creating database: " . $conn->error;
      }
      $sql="INSERT INTO user_login(`UserID`,`Email`,`Password`) VALUES (NULL,'shane@gmail.com','password')";
    if ($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error creating database: " . $conn->error;
      }

      $sql="INSERT INTO users(`UserID`,`FName`,`LName`,`Specialty`,`Location`,`FoodPreferences`,`Contact`,`Company`,`AccountType`) VALUES (NULL,'Ad','Min','Family','Orange County','Salad','999-999-9999','Workland','Doctor')";
      if ($conn->query($sql) === TRUE) {
          
        } else {
          echo "Error creating database: " . $conn->error;
        }
        $sql="INSERT INTO users(`UserID`,`FName`,`LName`,`Specialty`,`Location`,`FoodPreferences`,`Contact`,`Company`,`AccountType`) VALUES (NULL,'Ad','Min2','Medications','Lancaster','Hot Dogs','888-888-8888','WorkVille','Provider')";
        if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error creating database: " . $conn->error;
          }
          $sql="INSERT INTO users(`UserID`,`FName`,`LName`,`Specialty`,`Location`,`FoodPreferences`,`Contact`,`Company`,`AccountType`) VALUES (NULL,'Shane','Delmond','Surgeon','Newport','Vegan','777-777-7777','Hoag','Provider')";
        if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error creating database: " . $conn->error;
          }
}


?>

