<?php 
 include("includes/config.php");

   $subcategoryquery="SELECT * FROM sub_category" ;
   $subcategoryquery=mysqli_query($db,$subcategoryquery);

   $subcategoryrow = mysqli_fetch_array($subcategoryquery,MYSQLI_ASSOC);

      
  $date=date('Y-m-d');

   if(isset($_POST['submit'])){
    $date = date('Y-m-d').rand(1,10000000); 
    $extensions = array("jpeg","jpg","png","svg","JPG","JPEG","PNG");  

      $image1           = $date.'-'.$_FILES['img1']['name'];
      $image_old_path1        = $_FILES['img1']['tmp_name'];
      $image_new_path1        ='uploads/' . $image1; 
      if($image1!==""){
        move_uploaded_file($image_old_path1, $image_new_path1);
      }else{
        echo("File not selected");
        $image1="";
      }
  
    $productName=$_POST['productName'];
    $categ=$_POST['categ'];
    $validity_date=$_POST['validity_date'];
    $coupon_code=$_POST['coupon_code'];
    $description=$_POST['description'];
    $discount_percentage=$_POST['discount_percentage'];
   
    
    

    $insertquery="INSERT INTO Products( category_id, name,image1, validity_date, coupon_code,  description, discount_percentage) VALUES ('$categ','$productName','$image1','$validity_date','$coupon_code','$description','$discount_percentage')";
      if($insertquery){ 
        mysqli_query($db,$insertquery);
        print_r("<h2>SuccessFully Saved</h2>");//print_r is like echo.

        
      }else{
        die(mysqli_error($db));
      }
      
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADD OFFER</title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Social Buttons CSS -->
        <link href="./css/bootstrap-social.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body bgcolor = "#FFFFFF">
        <div class="wrapper">
    
          <div align = "center">
             <div style = "width:100%; border: solid 1px #333333; " align = "left">
                <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>ADD A NEW OFFER</b>
                <div style="float:right;"><a style="text-decoration: none;color:white;" href="./index.php">Home</a></div>
            </div>
            <div style = "margin:30px">
                   
                   <form action = "product.php" method = "post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                      
                      <label>Offer's Name  :</label><br/><input type = "text" name = "productName" required class = "box" /><br/><br />


                      <label>Offer's Image  :</label><br/><input type="file" name="img1" class="box" required/><br/><br/>
                      
                        <label>Category :</label><br/><br>
                        <select name="categ">
                          <option value="HOTEL">HOTEL</option>
                          <option value="FOOD">FOOD</option>
                          <option value="BUS">BUS</option>
                          
                        </select> 
                        <br><br>
                        
                          
                        </div> 
                        <div class="col-md-6">


                    <label>Validity Date :</label><br/><input type="date" min="<?php echo $date?>" name="validity_date"  required /><br/><br/>

                    <label>Coupon Code:</label><br/><input type="text" name="coupon_code" required/><br/><br/>

                    <label>Description :</label><br/><input type="text" name="description" required/><br/><br/>

                    <label>Discount(%) :</label><br/><input type="text" name="discount_percentage" required /><br/><br/>

                    
                </div>
                <br>
                <br>

                        <input style="margin:20px 0 0 30%;" type = "submit" name="submit" value = " Submit "/><br />

                   </form>
                   
                   <!-- <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div> -->
                        
                </div>
                    
             </div>
                
          </div>
        </div>

   </body>
</html>
