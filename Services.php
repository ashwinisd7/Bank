<?php
 $server = "localhost";
 $username = "root";
 $password = "ashwini";
 $database = "bank";
$conn = mysqli_connect($server,$username,$password,$database);
 session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet"  href="Services.css">
</head>
  <h1 class ="header" > Hello <?php echo $_SESSION['uname']  ?>  welcome to your services page </h1>
<body>


    

    <div class = "user">
        <div class= "form">
       <p class="label">Name           </p>
       <p class="label">Date Of Birth   </p>
       <p class="label">Email ID       </p>
       <p class="label">Address       </p>
       <p class="label">Contact No.     </p>
       <p class="label">Amount          </p>

<div class ="new">
       <a href ="Transaction.php"><input type="submit"  value="Send Money" class="button1" ></a>
       <a href ="Addmoney.php"><input type="submit"  value="Add money" class="button2" ></a>
       <a  href =""> <input type="submit"  value="Log out" class="button4" ></a>
</div>
</div>

</div>
    </body>
</html>