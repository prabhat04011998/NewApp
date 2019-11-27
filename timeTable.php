<?php include './includes/header.php';
include('admin-panel/includes/config.php');
	//increasing the counter by 1 on page loading
	$sql="UPDATE `views` SET `time-table`=`time-table`+1 WHERE 1";
	$result=mysqli_query($db,$sql);
?>
<div class="timeTable">
	<div class="timeTablecontent">
		<h1 class="w3-margin w3-Large w3-bold text-center">TRAIN TIME TABLE</h1>
		<form method="post" >
			<div style="margin:0% auto;width:50%;margin-bottom:4%;" id="searchBox">
			<div class="input-group" style="border: 1px solid #2196F3;height: auto">
			    <input type="text" class="form-control search_field" style="border-radius:0px;" placeholder="Search....." name="timeTable" required>
			    <input type="submit" name="submit" class="btn btn-secondary" style="border-radius: 0px;border:0px;border-left:1px solid #2196F3;color:#2196F3;background-color:#fff" value="GET DETAILS">
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['timeTable']) and strlen($_POST['timeTable'])>=5){
		$no=$_POST['timeTable'];
		$url="http://indianrailapi.com/api/v2/TrainSchedule/apikey/".$apiKey."/TrainNumber/".$no."/";
		$result=file_get_contents($url);
		$result=json_decode($result);
		$stationCount=sizeof($result->Route);
		
	 ?>
	 <script type="text/javascript">
			$(".timeTable").css("marginTop","10%");
		</script>
		<div style="text-align: center;margin:20px;"> 
	 	<h1><p style="font-family:initial;">12963 - Mewar Express</p></h1>
	 	</div>
	 <div class="stationTable">

	 <table class="table table-sm">
  <thead>
    <tr style="color:#2196F3 !important">
      <th scope="col">STATION</th>
      <th scope="col">STATION CODE</th>
      <th scope="col">ARRIVES</th>
      <th scope="col">DISTANCE</th>
      <th scope="col">DEPARTS</th>
      
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($result->Route as $key) {?>
  	<tr>
      <th style="color:dimgray"><?php echo $key->StationName?></th>
      <td><?php echo $key->StationCode?></td>
      <td><?php echo $key->SerialNo==1?"----":$key->ArrivalTime ?></td>
      <td><?php echo $key->Distance."KM" ?></td>
      <td><?php echo $key->SerialNo==$stationCount?"----":$key->DepartureTime ?></td> 
    </tr>
  		
  	<?php }?>
  </tbody>
</table></div>
	<?php }elseif(isset($_POST['timeTable'])){?>
		<div class="alert alert-danger" role="alert" style="margin:20px">SORRY ! PLEASE CORRECT YOUR TRAIN NO.</div>
		
	<?php }?>

</div>
<?php include './includes/footer.php'?>