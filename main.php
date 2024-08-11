<?php        
    session_start();

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];  
        $password = $_POST['password'];  
        $conn=new mysqli("localhost","root","","reg");

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query="Select * from regs where username= '$username' limit 1";
            $result=mysqli_query($conn,$query);
            
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data=mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: movie.html");
                        die;
                    }
                    
                }
            }
            echo"<script type='text/javascript'> alert('wrong username or password')</script>";
        }
        else
        {
            echo"<script type='text/javascript'> alert('wrong username or password')</script>";
        }
    }
       
            
?>  