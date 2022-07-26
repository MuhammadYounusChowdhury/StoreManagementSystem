<?php
require('connection.php') ;
function data_list($tablename,$column1, $column2){
    require('connection.php') ;
$sql="SELECT *FROM $tablename";
$query=$conn->query($sql); 
while($data= mysqli_fetch_array($query)){
    $data_id =$data[$column1];
    $data_name =$data[$column2];

    echo "<option value='$data_id'>$data_name</option>";
    }

}

session_start();

     $user_first_name = $_SESSION['user_first_name'];
     $user_last_name = $_SESSION['user_last_name'];

     if(!empty($user_first_name) && !empty($user_last_name) ) {

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Edit Spend Product</title>
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
    
            $sql="SELECT * FROM spend_product WHERE spend_product_id=$getid";
    
             $query=$conn->query($sql);       
             $data= mysqli_fetch_assoc($query);
        
    
             $spend_product_id         =$data['spend_product_id'];
             $spend_product_name       =$data['spend_product_name'];
             $spend_product_quantity   =$data['spend_product_quantity'];
             $spend_product_entry_date =$data['spend_product_entry_date'];
        }
        if(isset($_GET['spend_product_name'])){
            $new_spend_product_name=$_GET['spend_product_name'];
            $new_spend_product_quantity=$_GET['spend_product_quantity'];
            $new_spend_product_entry_date=$_GET['spend_product_entry_date'];
            $new_spend_product_id=$_GET['spend_product_id'];
            
            $sql1="UPDATE spend_product SET spend_product_name='$new_spend_product_name',
            spend_product_quantity='$new_spend_product_quantity',
            spend_product_entry_date='$new_spend_product_entry_date'
            WHERE spend_product_id=$new_spend_product_id";
    
            if($conn->query($sql1) == TRUE){
                echo 'Update Successful!';
            }else{
                echo "Error updating record:" . $conn->error;
            }
        }     
    ?>
    <?php
         
    ?>
 

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="GET">
   
    Product:<br>
    <select name="spend_product_name">
    <?php
$sql="SELECT *FROM product";
$query=$conn->query($sql); 
while($data= mysqli_fetch_array($query)){
    $data_id =$data['product_id'];
    $data_name =$data['product_name'];
?>
    <option value='<?php echo $data_id?>' <?php if($spend_product_name == $data_id){echo 'selected';}?>>
    <?php echo $data_name ?>
    </option>";
    
    <?php }  ?>
    </select><br></br>
    Product Quantity:<br>
    <input type="number" name="spend_product_quantity"value="<?php echo $spend_product_quantity;?>"><br></br>
    Store Entry Date :<br>
    <input type="date" name="spend_product_entry_date"value="<?php echo $spend_product_entry_date?>"><br></br>
    <input type="text" name="spend_product_id"value="<?php echo $spend_product_id?>"hidden>
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





















    <?php
        if (isset($_GET['id'])){
            $getid=$_GET['id'];
    
            $sql="SELECT * FROM spend_product WHERE spend_product_id=$getid";
    
             $query=$conn->query($sql);       
             $data= mysqli_fetch_assoc($query);
        
    
             $spend_product_id         =$data['spend_product_id'];
             $spend_product_name       =$data['spend_product_name'];
             $spend_product_quantity   =$data['spend_product_quantity'];
             $spend_product_entry_date =$data['spend_product_entry_date'];
        }
        if(isset($_GET['spend_product_name'])){
            $new_spend_product_name=$_GET['spend_product_name'];
            $new_spend_product_quantity=$_GET['spend_product_quantity'];
            $new_spend_product_entry_date=$_GET['spend_product_entry_date'];
            $new_spend_product_id=$_GET['spend_product_id'];
            
            $sql1="UPDATE spend_product SET spend_product_name='$new_spend_product_name',
            spend_product_quantity='$new_spend_product_quantity',
            spend_product_entry_date='$new_spend_product_entry_date'
            WHERE spend_product_id=$new_spend_product_id";
    
            if($conn->query($sql1) == TRUE){
                echo 'Update Successful!';
            }else{
                echo "Error updating record:" . $conn->error;
            }
        }     
    ?>
    <?php
         
    ?>
 

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="GET">
   
    Product:<br>
    <select name="spend_product_name">
    <?php
$sql="SELECT *FROM product";
$query=$conn->query($sql); 
while($data= mysqli_fetch_array($query)){
    $data_id =$data['product_id'];
    $data_name =$data['product_name'];
?>
    <option value='<?php echo $data_id?>' <?php if($spend_product_name == $data_id){echo 'selected';}?>>
    <?php echo $data_name ?>
    </option>";
    
    <?php }  ?>
    </select><br></br>
    Product Quantity:<br>
    <input type="number" name="spend_product_quantity"value="<?php echo $spend_product_quantity;?>"><br></br>
    Store Entry Date :<br>
    <input type="date" name="spend_product_entry_date"value="<?php echo $spend_product_entry_date?>"><br></br>
    <input type="text" name="spend_product_id"value="<?php echo $spend_product_id?>"hidden>
    <input type="submit" value="Submit">

</form>
     </body>
</html>
	<?php
}else {
    header('location:login.php');
}
?>