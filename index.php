<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/loginStyle.css">
</head>
<body>
    <div id="form">
        <h2>Login Form</h1>
            <form name="form" method="POST">
                <label>Username: </label>
                <input class="large-input" type="text" id="user" name="user"><br><br>
                <label>Password:</label>
                <input class="large-input" type="Password" id="pass" name="pass"></br></br>
                <input class="large-btn" type="submit" id="btn" value="Login" name="submit"/>
         </form>
    </div>
</body>
</html>

<?php
      require_once('db_connection.php');

if(isset($_POST['submit'])){
 $username= $_POST['user'];
 $password= $_POST['pass'];


 $sql = "select * from login where username = '$username' and password = '$password'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $count = mysqli_num_rows($result);

 if($count==1)
 {
    header("Location: welcome.php");
    exit(); 

 }
 else{
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<h2><p><center> Login failed </center></p></h2>";
   
 }

}
  ?>