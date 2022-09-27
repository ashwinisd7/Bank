<?php 
        $servername = "localhost";
        $username = "root";
        $password = "ashwini";
        $database = "bank";
       
        $conn = mysqli_connect($servername,$username,$password,$database);
        $login=false;
        if ($_SERVER['REQUEST_METHOD'] =='POST') {
            $uname= $_POST['uname'];
            $pw  =$_POST['pw'];

            $sql= "SELECT * FROM signup WHERE uname='$uname' AND pw='$pw'";
            $result = mysqli_query($conn,$sql);
            $num= mysqli_num_rows($result);
            if($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['uname'] = $uname;
                $_SESSION['name'] = $name;
                $_SESSION['contact'] = $contact;
                $_SESSION['emailid'] = $emailid;
                $_SESSION['address'] = $address;
                $_SESSION['dob'] = $dob;
                header("location: Services.php");
            }
            
}
           
        
            ?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet"  href="Login.css">
</head>

<body>

    
    <div class="container">
        <form action="Login.php" class="form" method="post">
          <h1 class="title">Log In</h1>
    
          <div class="inputContainer">
            <input type="text" class="input" placeholder="a" id="uname" name ="uname">
            <label for="" class="label">Username</label>
          </div>
          <div class="inputContainer">
            <input type="password" class="input" placeholder="a" id="pw" name ="pw">
            <label for="" class="label">Password</label>
          </div>
          <input type="submit" class="submitBtn" value="Log In">
          
        </form>
        
</div>
</body>
</html>