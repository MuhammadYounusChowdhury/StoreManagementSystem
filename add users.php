<?php
require('connection.php') ;
session_start();

     $user_first_name = $_SESSION['user_first_name'];
     $user_last_name = $_SESSION['user_last_name'];

     if(!empty($user_first_name) && !empty($user_last_name) ) {
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add Users</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
<body>



<div class="container bg-light ">
	 <div class ="container-foulid border-bottom border-secondary">
	 	 
	 <?php include('topbar.php');?>
	 
		  </div>		  
		  
	 <div class="container-foulid">
	 <div class="row">
	 <div class="col-sm-3 bg-light  p-0 m-0">
	 	 
	 <?php include('leftbar.php');?>
		  
	 </div>	 	 
	 
	 <div class="col-sm-9 border-start border-secondary">
	 <div class="container p-4 m-4">
	 
	 



<?php
    if(isset($_GET['user_first_name'])){
        $user_first_name = $_GET['user_first_name'];
        $user_last_name = $_GET['user_last_name'];
        $user_email = $_GET['user_email'];
        $user_password = $_GET['user_password'];
        

       $sql = "INSERT INTO users (user_first_name, user_last_name, user_email,user_password) VALUES ('$user_first_name','$user_last_name', '$user_email', '$user_password')";

       if($conn->query($sql) == TRUE){
       echo 'Data Inserted!';
    }else{
        echo 'Data Not Inserted!';

    }

    }
    ?>
    <?php
         
    ?>
 

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="GET">
   
    
    User's First Name:<br>
    <input type="text" name="user_first_name"   ><br></br>
    User's Last Name :<br>
    <input type="text" name="user_last_name"><br></br>
    User's Email :<br>
    <input type="email" name="user_email"><br></br>
    User's Password :<br>
    <input type="password" name="user_password"><br></br>
   


    <input type="submit" value="Submit" class='btn btn-secondary'>

</form>


	 
	 
	 
	 </div>
	 	 
	 </div>	 	 
	 </div>
	 </div>	 	 
	 <div class="container-foulid border-top border-secondary">
		 <?php include('bottombar.php');?>
		  </div>
	</div>





     </body>
</html>
<?php
}else {
    header('location:login.php');
}
?>