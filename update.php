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

  $sql = "SELECT FName,LName,Specialty,Location,FoodPreferences,Contact,Company FROM users WHERE UserID='$ID'";
            if(mysqli_query($conn, $sql)){
                $retval = mysqli_query($conn,$sql);
                if(mysqli_num_rows($retval)>0){
                    $row = mysqli_fetch_assoc($retval);
                }
                $Fname = $row['FName'];
                $Lname = $row['LName'];
                $Specialty = $row['Specialty'];
                $Loc = $row['Location'];
                $Pref = $row['FoodPreferences'];
                $Con = $row['Contact'];
                $Comp = $row['Company'];
    
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
            $conn->close();
  $pdo= null;
  ?>
    <head>
        <link rel="stylesheet" href="css/user.css" />
    </head>
    <body>
    <?php
      include "navbar.php";
      ?>

            
            <main class="main">
            
                <center><form action = "updateinfo.php" method="POST">
                    <h1><b>Update Account Information:</b></h1>
                    <h3>Only fill in what needs to be changed</h3>
                    <p><input type="email" placeholder="Email: <?=$Email?>" value = "" name= "email"></p>
                    <p><input type="text" placeholder="First Name: <?=$Fname?>" value = "" name= "FName"><input type="text" placeholder="Last Name: <?=$Lname?>" value = "" name= "LName"></p>
                    <p><input type="text" placeholder="Specialty: <?=$Specialty?>" value = "" name= "specialty"></p>
                    
                    <p><input type="text" placeholder="Location: <?=$Loc?>" value = "" name= "location"></p>
                    
                    <p><textarea max-length = "255" placeholder="Food Preference: <?=$Pref?>" value = "" name= "Preferences"></textarea></p>
                    <p><input type="text" placeholder="Contact: <?=$Con?>" value = "" name= "contact"></p>
                    <p><input type="text" placeholder="Company: <?=$Comp?>" value = "" name= "company"></p>
                    <table style="width:100%" >
                <caption><b>Availability</b></caption>
                <tr>
                  <th>Day</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                </tr>
                <tr>
                  <td>Monday Unavailable:<input type="checkbox" id="Mon" name = "Mon" value="on" ></td>
                  <td><input type="time" name="MoST" value = ""></td>
                  <td><input type="time" name="MoET" value = ""></td>
                </tr>
                <tr>
                  <td>Tuesday Unavailable:<input type="checkbox" id="Tues" name = "Tues" value="on" ></td>
                  <td><input type="time" name="TST" value = ""></td>
                  <td><input type="time" name="TET" value = ""></td>
                  
                </tr>
                <tr>
                  <td>Wednesday Unavailable:<input type="checkbox" id="Weds" name = "Weds" value="on"></td>
                  <td><input type="time" name="WST" value = ""></td>
                  <td><input type="time" name="WET" value = ""></td>
                  
                </tr>
                <tr>
                  <td>Thursday Unavailable:<input type="checkbox" id="Thurs" name = "Thurs"value="on" ></td>
                  <td><input type="time" name="THST" value = ""></td>
                  <td><input type="time" name="THET" value = ""></td>
                  
                  
                </tr>
                <tr>
                  <td>Friday Unavailable:<input type="checkbox" id="Fri" name = "Fri" value="on"></td>
                  <td><input type="time" name="FST" value = ""></td>
                  <td><input type="time" name="FET" value = ""></td>
                  
                </tr>
                <tr>
                  <td>Saturday Unavailable:<input type="checkbox" id="Sat" name = "Sat" value="on"></td>
                  <td><input type="time" name="SST" value = ""></td>
                  <td><input type="time" name="SET" value = ""></td>
                  
                </tr>
                <tr>
                  <td>Sunday Unavailable:<input type="checkbox" id="Sun" name = "Sun" value="on"></td>
                  <td><input type="time" name="SUST" value = ""></td>
                  <td><input type="time" name="SUET" value = ""></td>
                  
                </tr>

              </table>

                    <input type="submit" name="Submit" value = "Submit" href="updateinfo.php">
        </center>
        </form>
              
            </main>
            <footer class="footer">&copy;Med-Sched </footer>
          </div>
      
        
    </body>
    
</html>