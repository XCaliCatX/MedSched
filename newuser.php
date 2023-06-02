<!DOCTYPE html>

<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
        include "dbconnection.php";
        if($_SESSION['logged in'] != 'y'){
          header("location:home.html");
        }; 
        //check access was from submit button
        if(isset($_POST["submit"])){
            // begin recieving values
            $first_name =  $_REQUEST['fName'];
            $last_name = $_REQUEST['lName'];
            $specialty =  $_REQUEST['Specialty'];
            $address = $_REQUEST['Location'];
            $email = $_REQUEST['email'];
            $contact = $_REQUEST['Contact'];
            $company = $_REQUEST['Company'];
            $upassword = $_REQUEST['Password'];
            if(isset($_POST['type'])){$type = $_REQUEST['type'];};
            
            //insert new user login into user login table
            $sql = "INSERT INTO user_login(`UserID`,`Email`, `Password`)  VALUES ('NULL', '$email','$upassword')";
            
            if(mysqli_query($conn, $sql)){
                echo "<h3>User added"
                    . " Please browse your localhost php my admin"
                    . " to view the updated data</h3>";
    
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }

            //get user id and populate users table with form data
            $sql = "SELECT userID FROM user_login WHERE email='$email'";
            if(mysqli_query($conn, $sql)){
                $retval = mysqli_query($conn,$sql);
                if(mysqli_num_rows($retval)>0){
                    $row = mysqli_fetch_assoc($retval);
                }
                $userID = $row['userID'];
                echo "<h3>UserId retrieved"
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";
    
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }

            //place users form data in User table
            $sql = "INSERT INTO users(`UserID`, `FName`, `LName`, `Specialty`, `Location`, `Contact`,`Company`, `AccountType`)  VALUES ('$userID','$first_name',
                '$last_name','$specialty','$address','$contact','$company','$type')";
            if(mysqli_query($conn, $sql)){
                echo "<h3>user information stored"
                    . " Please browse your localhost php my admin"
                    . " to view the updated data</h3>";
    
                echo nl2br("\n$first_name\n $last_name\n "
                    . "$specialty\n $address\n $contact\n $company \n $email");
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
            //insert availability into availability database
            //get availability values and post to availability databas
            if(isset($_POST["Mon"])){
                $ST = $_REQUEST['MonST'];
                $ET = $_REQUEST['MonET'];
                $Day = 'Monday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Tues"])){
                $ST = $_REQUEST['TuesST'];
                $ET = $_REQUEST['TuesET'];
                $Day = 'Tuesday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Weds"])){
                $ST = $_REQUEST['WedST'];
                $ET = $_REQUEST['WedET'];
                $Day = 'Wednesday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Thurs"])){
                $ST = $_REQUEST['ThST'];
                $ET = $_REQUEST['ThET'];
                $Day = 'Thursday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Fri"])){
                $ST = $_REQUEST['FST'];
                $ET = $_REQUEST['FET'];
                $Day = 'Friday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Sat"])){
                $ST = $_REQUEST['SatST'];
                $ET = $_REQUEST['SatET'];
                $Day = 'Saturday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            if(isset($_POST["Sun"])){
                $ST = $_REQUEST['SunST'];
                $ET = $_REQUEST['SunET'];
                $Day = 'Sunday';
                $sql="INSERT INTO availability(`UserID`, `AvailableDay`, `StartTime`, `EndTime`) VALUES ('$userID', '$Day','$ST', '$ET')";
                mysqli_query($conn,$sql);
            };
            // Close connection

            mysqli_close($conn);
            //redirect to login page
            header('Location: login.html');
            
        }else{
            header("location:sign-up.html");
        }
        $conn->close();
  $pdo= null;
        ?>
    </center>
</body>
 
</html>