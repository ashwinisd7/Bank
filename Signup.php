
<?php 
        $server = "localhost";
        $username = "root";
        $password = "ashwini";
        $database = "bank";
       
        $conn = mysqli_connect($server,$username,$password,$database);
        
        
                 
        $showalert =false;
        if ($_SERVER["REQUEST_METHOD"] =='POST') {
          $name= $_POST['name'];
          $dob=$_POST['dob'];
          $emailid = $_POST['emailid'];
          $address= $_POST['address'];   
          $uname= $_POST['uname'];
          $pw =$_POST['pw'];
          $contact= $_POST['contact'];
          $image= $_POST['image'];
          if($conn){
            $sql = "INSERT INTO `bank`.`signup` ( `name`,`dob`,`emailid`,`address`,`uname`,`pw`,`contact`,`image`) VALUES ( '$name', '$dob','$emailid', '$address','$uname','$pw','$contact','$image')";
            $sql1 = "INSERT INTO `bank`.`depositor` ( `name`,`uname`,`pw`) VALUES ( '$name','$uname','$pw')";
           $result= mysqli_query($conn,$sql);
           mysqli_query($conn,$sql1);
            if($result){
              $showalert=true;
              session_start();
                $_SESSION['signedup'] = true;
               
                header("location: Login.php");
             }
          }
          }

        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet"  href="Signup.css">
<body >
  
  <?php
  if($showalert){
   echo ' <div class="alert alert-success" role="alert">
   <h4 class="alert-heading">Success!</h4>
   <p>Your account has been created successfully.</p>
  </div>';
  }
  ?>
    <div class="container">
    <form action="Signup.php" method="post" class="form">
    

    <h1 class="main_h" >Information</h1>
        
        <p class="label">Name   <input type="text" name="name" id = "name"  class="input" ></p>
        <legend class="label">Gender<p class="label">
            Male<input type="radio" name="Gender" id="">
            Female<input type="radio" name="Gender" id="">
        </p>
        </legend>
        <p class="label"> Date Of Birth   <input type="date" name="dob" id= "dob" class="input"></p>
        <p class="label">Email ID         <input type="email" name="emailid" id= "emailid" class="input"></p>
        <p class="label">Address          <textarea name="address" id="address" cols="50" rows="8"  class="input"></textarea></p>
        <p class="label">Username         <input type="text" name="uname"id= "uname"  class="input"></p>
        <p class="label">Password         <input type="password" name="pw"id= "pw"  class="input"></p>
        <p class="label">Contact No.      <input type="number" name="contact"id= "contact"  class="input"></p>
        <p class="label">ID Card photo      <input type="file" name="id" id= "image"  class="input"></p>
        
        
        </p>
        <input type="submit" value="Register" class="button" >
        
    </form>
</div>
</body>
</html>