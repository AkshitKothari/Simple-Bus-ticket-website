<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$conn = new mysqli('localhost','root','','reg');
if($conn->connect_error)
{
   die('connection failed: '.$conn->connect_error);
}
else{
      $stmt = $conn->prepare("insert into regs(username,password,email,phone) values(?,?,?,?)");
      $stmt->bind_param("sssi",$username,$password,$email,$phone);
      $stmt->execute();
      echo "successfully registered";
      $stmt->close();

      
   
}
 ?>