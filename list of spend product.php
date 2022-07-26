<?php
require('connection.php') ;
$sql1 ="SELECT*FROM product";
$query1=$conn->query($sql1);
$data_list=array();
while($data1 = mysqli_fetch_assoc($query1)){
$product_id =$data1['product_id'];
        $product_name =$data1['product_name'];

$data_list[$product_id]=$product_name;
}

session_start();

     $user_first_name = $_SESSION['user_first_name'];
     $user_last_name = $_SESSION['user_last_name'];

     if(!empty($user_first_name) && !empty($user_last_name) ) {


?>

<!DOCTYPE html>

<html>
    <head>
        <title>List Of Spend Product</title>
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
    $sql="SELECT *FROM spend_product";

    $query=$conn->query($sql);
    echo "<table class='table table-secondary table-striped table-hover'><tr><th>Product Name</th><th>Quantity</th><th>Entry Date</th><th>Action</th></tr>";

    while($data=mysqli_fetch_assoc($query)){
        $spend_product_id =$data['spend_product_id'];
        $spend_product_name =$data['spend_product_name'];
        $spend_product_quantity =$data['spend_product_quantity'];
        $spend_product_entry_date =$data['spend_product_entry_date'];

        echo"<tr>
        <td>$data_list[$spend_product_name]</td>
        <td>$spend_product_quantity</td>
        <td>$spend_product_entry_date</td>
        <td><a href='edit spend product.php?id=$spend_product_id'class='btn btn-secondary'>Edit</a></td></tr>";
    }
    echo"</table>"
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
