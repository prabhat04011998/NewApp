<?php include './includes/header.php';
include('admin-panel/includes/config.php');
	//increasing the counter by 1 on page
	$sql="UPDATE `views` SET `premium-count`=`premium-count`+1 WHERE 1";
	$result=mysqli_query($db,$sql);

	$url="https://indianrailapi.com/api/v2/PremiumTrains/apikey/".$apiKey;
	$result=file_get_contents($url);
	$result=json_decode($result);
?>
<div class="train-list-container">
	<div class="train-count"> TOTAL TRAINS - <?php echo $result->TotalTrain ?></div>
	
		<?php foreach ($result->Trains as $key ) { ?>
			
		<div class="train-list-info">
			<div class="row">
				<div class="col-md-4 col-xs-4">
					<div class="pnr-bold-text">(<?php echo $key->TrainNumber ?>)</div>
					<div class="pnr-blue-text"><?php echo $key->TrainName ?></div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="pnr-bold-text">SOURCE: <?php echo $key->Source ?></div>
					<div>DEPARTURE: <?php echo $key->Departure ?></div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="pnr-bold-text" >DESTINATION: <?php echo $key->Destination ?></div>
					<div>ARRIVAL: <?php echo $key->Arrival ?></div>
				</div>
			</div>
		</div>
	<?php } ?>
	
	
</div>