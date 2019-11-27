<?php
include('includes/config.php');
// Check connection

$result = mysqli_query($db,"SELECT * FROM Products");
?>

<!DOCTYPE html>
<html>
<head>
      <title>Product</title>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    

   </head>
<body>
<?php include('includes/navbar.php');?>
<div class="row" style="margin-top:40px;">
	<div class="col-md-3"></div>
	<div class="col-md-9"> 
		<div class="table-responsive" style="margin-top:30px;">
	<?php
$answer="<table class='table table-bordered table-hover table-responsive table-dark' >
<thead>
<tr>
<th>Id</th>
<th>Offer Category</th>
<th>Name</th>
<th>Validity</th>
<th>Image1</th>
<th>Coupon code</th>
<th>Discount(%)</th>
<th>Timestamp</th>
</tr>
</thead><tbody>";
while($row = mysqli_fetch_array($result))
{
$row_id=$row['id'];
$row_cat=$row['category_id'];
$row_name=$row['name'];
$row_validity_date=$row['validity_date'];
$row_image1=$row['image1'];
$row_coupon_code=$row['coupon_code'];
$row_discount_percentage=$row['discount_percentage'];
$row_timestamp=$row['timestamp'];
$answer.=<<<DELIMETER

<tr>
    <td>  $row_id</td>
    <td> $row_cat </td>
    <td>$row_name</td>
    <td> $row_validity_date </td>
    <td><img style="height:100px;width:100px" src="uploads/$row_image1"/></td>
    <td> $row_coupon_code </td>
    <td> $row_discount_percentage </td>
    <td> $row_timestamp </td>
    <td><a href="products.php?delete=$row_id">Delete</a></td>
</tr>

DELIMETER;
}

$answer.="</tbody></table>";
echo $answer;


if($_GET){
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $result = mysqli_query($db,"DELETE FROM `Products` WHERE id = '$id'");
        if(!$result){
            die(mysqli_error($db));
        }else{
            echo "done";
            header("Location:products.php");
        }
        echo("deleted");
    }//elseif(isset($_GET['select'])){
        //select();
    //}
}

    
?>
</div>
</div>

</body>
</html>
