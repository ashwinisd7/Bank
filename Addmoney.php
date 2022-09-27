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
            
            
            $sql="UPDATE depositor SET depositor.amount = amount + '$amount' WHERE accountno = '$account' ";
            $result = mysqli_query($conn,$sql);
            
            if($result){
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
    <title>Add Money</title>
</head>
<body>
<link rel="stylesheet"  href="Addmoney.css">
<?php
        if($transaction){
            echo "success";
        }
        
    ?>
<div class="container">
    <form action="Addmoney.php" method="post" class="form">
    
        <p class="label">Account No.   <input type="text" name="ac" id= "ac" class="input"></p>
        <p class="label">Amount   <input type="number" name="amount" id= "amount" class="input"></p>
        <p class="label">Name of holder        <input type="text" name="nac" id= "nac" class="input"></p>
        
        <input type="submit" value="Deposit" class="button" >
    </form>
    </div>
</body>
</html>