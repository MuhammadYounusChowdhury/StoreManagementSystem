<?php
require('connection.php') ;
  session_start();

     $user_first_name = $_SESSION['user_first_name'];
     $user_last_name = $_SESSION['user_last_name'];

     if(!empty($user_first_name) && !empty($user_last_name) ) {
		 
		 $sql3 ="SELECT*FROM product";
$query3=$conn->query($sql3);
$data_list=array();
while($data3 = mysqli_fetch_assoc($query3)){
$product_id =$data3['product_id'];
        $product_name =$data3['product_name'];

$data_list[$product_id]=$product_name;
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Report</title>
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
	 
	 
	 
	 
	 <form action="<?php echo $_SERVER['PHP_SELF'];?>"method="GET">
Select Product Name:
	<select name="product_name">
     <?php
	 $sql="SELECT *FROM product";



    $query=$conn->query($sql);


    while($data=mysqli_fetch_assoc($query)){
        $product_id =$data['product_id'];
        $product_name =$data['product_name'];
    
?>	  
    
    <option value= <?php echo $product_id?>"><?php echo $product_name?></option>
	<?php  }  ?>
	</select>
   
    <input type="submit" value="Generate Report">

</form>
<h2>Store Product</h2>
<?php
if (isset($_GET['product_name'])){
            $product_name=$_GET['product_name'];
			$sql2="SELECT *FROM store_product WHERE store_product_name=$product_name";
			
			
			$query2 = $conn->query($sql2);
			 			 
             while($data2=mysqli_fetch_array($query2)){			
        
        $store_product_quantity =$data2['store_product_quantity'];
        $store_product_entry_date =$data2['store_product_entry_date'];
		$store_product_name =$data2['store_product_name'];
		
		echo"<h2>$data_list[$store_product_name]</h2>";
		echo"<table border='1'><tr><td>Store Date</td><td>Amount</td></tr>";
		echo"<tr><td>$store_product_entry_date</td><td>$store_product_quantity</td></tr>";
		echo"</table>";
}
}
?>
<h2>Spend Product</h2>
<?php
if (isset($_GET['product_name'])){
            $product_name=$_GET['product_name'];
			$sql4="SELECT *FROM spend_product WHERE spend_product_name=$product_name";
			 $query4=$conn->query($sql4);
			 
while($data4=mysqli_fetch_array($query4)){
			
        $spend_product_name =$data4['spend_product_name'];
        $spend_product_quantity =$data4['spend_product_quantity'];
        $spend_product_entry_date =$data4['spend_product_entry_date'];
		
		echo"<h3>$data_list[$spend_product_name]</h3>";
		echo"<table border='1'><tr><td>Spend Data</td><td>Amount</td></tr>";
		echo"<tr><td>$spend_product_entry_date</td><td>$spend_product_quantity</td></tr>";
		echo"</table>";
}
}
?>
	 
 
	 
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