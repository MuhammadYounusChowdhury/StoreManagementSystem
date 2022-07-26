<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<style> 
body {
  background-image: url("bg1.jpg");
  background-color: #cccccc;
}
</style>





<h4 class="text-center text-secondary"style="margin-top:100px">Store Management System</h4>
<div class="text-center" style="margin-top:150px ">
    <?php
    if(isset($_POST['user_email'])){
       
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        

       $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password' ";

       $query = $conn->query($sql);

       if(mysqli_num_rows($query) >0 ){
		   $data=mysqli_fetch_array($query);
        $user_first_name=$data['user_first_name'];
        $user_last_name=$data['user_last_name'];
        
        $_SESSION['user_first_name']=$user_first_name;
        $_SESSION['user_last_name']=$user_last_name;

           header('location:index.php');
       }else{
           echo 'not ok';
       }

    }
  
    ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST">
   
    User's Email :<br>
    <input type="email" class="form-label border-secondary" name="user_email" ><br></br>
    User's Password :<br>
    <input type="password" class="form-label border-secondary"  name="user_password"><br></br>
	
	
   


    <input type="submit" value="login" class="btn btn-secondary">

</form>
     </body>
</html>