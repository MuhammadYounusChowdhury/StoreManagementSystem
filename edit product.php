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
        <title>Edit Product</title>
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
    if (isset($_GET['id'])){
        $getid=$_GET['id'];

        $sql="SELECT * FROM product WHERE product_id=$getid";

         $query=$conn->query($sql);       
         $data= mysqli_fetch_assoc($query);
    

         $product_id         =$data['product_id'];
         $product_name       =$data['product_name'];
         $product_category   =$data['product_category'];
         $product_code       =$data['product_code'];
         $product_entry_date =$data['product_entry_date'];
    }

    if(isset($_GET['product_name'])){
        $new_product_name=$_GET['product_name'];
        $new_product_category=$_GET['product_category'];
        $new_product_code=$_GET['product_code'];
        $new_product_entry_date=$_GET['product_entry_date'];
        $new_product_id=$_GET['product_id'];
        
        $sql1="UPDATE product SET product_name='$new_product_name',
        product_category='$new_product_category',
        product_code='$new_product_code',
        product_entry_date='$new_product_entry_date'
        WHERE product_id=$new_product_id";

        if($conn->query($sql1) == TRUE){
            echo 'Update Successful!';
        }else{
            echo 'Not Update';
        }

    }
    ?>
    <?php
    $sql="SELECT *FROM product";
    $query=$conn->query($sql);       
    ?>
 

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="GET">
    Product :<br>
    <input type="text" name="product_name" value="<?php echo $product_name ?>"><br></br>
    Product Category :<br>
    <select name="product_category">
    <?php
    while($data= mysqli_fetch_array($query)){
    $Category_id =$data['Category_id'];
    $Category_name =$data['Category_name'];
    ?>

    <option value='<?php echo $Category_id ?>' <?php if ($Category_id==$product_category){echo'selected';}?>>
    <?php echo $Category_name ?>
</option>
    <?php   }    ?>
    

    </select><br></br>
    Product Code:<br>
    <input type="text" name="product_code"value="<?php echo $product_code ?>"><br></br>
    Product Entry Date :<br>
    <input type="date" name="product_entry_date"value="<?php echo $product_entry_date ?>"><br></br>
    <input type="text" name="product_id"value="<?php echo $product_id ?>"hidden>
    <input type="submit" value="Submit">

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