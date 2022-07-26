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
        <title>Edit Category</title>
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
     if(isset($_GET['id'])){
         $getid=$_GET['id'];
         $sql="SELECT *FROM category WHERE Category_id=$getid";

         $query=$conn->query($sql);       
         $data= mysqli_fetch_assoc($query);
    


         $Category_id =$data['Category_id'];
         $Category_name =$data['Category_name'];
         $Category_entrydate =$data['Category_entrydate'];
        
        



     }

    if (isset($_GET['Category_name'])){
        $new_Category_name = $_GET['Category_name'];
        $new_Category_entrydate = $_GET['Category_entrydate'];
        $new_Category_id = $_GET['Category_id'];  
        
        
        $sql1 = "UPDATE category SET Category_name='$new_Category_name', Category_entrydate='$new_Category_entrydate' WHERE Category_id=$new_Category_id";
        if($conn->query($sql1) == TRUE) {
            echo 'Update Successful';
        }else{
            echo 'Not Update';
        }
    }
    

    ?>

<form action="edit category.php" method="GET">
    Category :<br>
    <input type="text" name="Category_name" value="<?php echo $Category_name ?>"><br><br>
    Category Entry Date :<br>

    <input type="date" name="Category_entrydate" value="<?php echo $Category_entrydate ?>"><br><br>

    <input type="text" name="Category_id"value="<?php echo $Category_id ?>" hidden>

    <input type="submit" value="Update">

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