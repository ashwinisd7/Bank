<?php 
        $servername = "localhost";
        $username = "root";
        $password = "ashwini";
        $database = "bank";
       
        $conn = mysqli_connect($servername,$username,$password,$database);
        $transaction = false;
        if ($_SERVER['REQUEST_METHOD'] =='POST') {
            $account=$_POST['ac'];
            $nameac=$_POST['nac'];
            $amount= $_POST['amount'];
            $contact =$_POST['contactac'];
            $ifsc = $_POST['ifsc'];
            $daccount = $_POST['daccount'];
            $sql = "INSERT INTO `bank`.`transaction` ( `accountno`,`amount`,`bankdetails`,`ifsc`,`daccount`) VALUES ( '$account', '$amount','$nameac','$ifsc','$daccount')";
            $sql1="UPDATE depositor SET amount = depositor.amount + '$amount' WHERE accountno = '$account' ";
            $sql3="UPDATE depositor SET amount = depositor.amount - '$amount' WHERE accountno = '$daccount' ";
            $result = mysqli_query($conn,$sql);
            $result2= mysqli_query($conn,$sql1);
            $result3= mysqli_query($conn,$sql3);

            if($result and $result2){
                $transaction = true;
            }
           
        }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
</head>
<link rel="stylesheet"  href="Transaction.css">
<body>
<nav>
    <?php
        if($transaction){
            echo "success";
        }
         ?>
</nav>
<div class="container">
    <form action="Transaction.php" method="post" class="form">
        <p class="label">From Account No.<input type="text" name="daccount" id= "daccount" class="input"></p>
        <p class="label">Account No.   <input type="text" name="ac" id= "ac" class="input"></p>
        <p class="label">Amount   <input type="number" name="amount" id= "amount" class="input"></p>
        <p class="label">Name of holder        <input type="text" name="nac" id= "nac" class="input"></p>
        <p class="label">IFSC         <input type ="number" name="ifsc" id="ifsc"class="input"></textarea></p>
        <p class="label">Contact No.      <input type="number" name="contactac"id= "contactac"  class="input"></p>
        <input type="submit" value="Transfer" class="button" >
    </form>
    </div>
    </body>
</html>