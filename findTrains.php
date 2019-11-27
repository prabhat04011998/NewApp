
	<?php include('./includes/header.php');
	include('admin-panel/includes/config.php');
	//increasing the counter by 1 on page loading
	$sql="UPDATE `views` SET `find-train`=`find-train`+1 WHERE 1";
	$result=mysqli_query($db,$sql);

//$apiKey is in admin-panel/config.php
	if(isset($_POST['submit'])){
		$source=trim($_POST['source']);
		$destination=trim($_POST['destination']);
		$url="https://indianrailapi.com/api/v2/TrainBetweenStation/apikey/".$apiKey."/From/".$source."/To/".$destination;
		$result=file_get_contents($url);
		$result=json_decode($result);
		
	}

	 ?>

		
		<div class="content findTrains" >
		<h1 class="w3-margin w3-Large w3-bold text-center" style="font-family: 'Bitter', serif;">Find Trains</h1>
		<hr>
		<form class="searchBar row" method="post" style="background-color: white;padding: 20px;margin: 20px;border-radius: 10px;">
			<div class="col-md-4 col-xs-6" style="margin-bottom: 10px">
				<input name="source" type="text" placeholder="ENTER SOURCE STATION"  style="border:1px solid #000;color: black;;padding: 10px;font-weight: 600;" required>
			</div>
			<div class="col-xs-6 col-md-4" style="margin-bottom: 10px">
				<input name="destination" type="text" placeholder="ENTER DESTINATION STATION" style="border:1px solid #000;color: black;;padding: 10px;font-weight: 600;" required>
			</div>
			<div class="col-md-4">
			<input type="submit" name="submit" class="btn btn-secondary" style="border:2px solid #2196F3;background:transparent;color: #2196F3;padding:10px;border-radius:0px;font-weight: 600;" value="GET TRAINS"></div>
		</form>
<?php if(isset($_POST['submit'])){ ?>
	<script type="text/javascript">
			$(".findTrains").css("marginTop","8%");
		</script>
		<div id="trainCount">
			<div style="background:#000;color:#fff;padding:8px;text-align:center;border-radius:16px">
				Total Trains: <?php echo $result->TotalTrains ?>
			</div>
		</div>
		
		<div id="trainLists">
			<?php foreach($result->Trains as $r){ ?>
			<div class="row" style="margin:10px;background:#fff;color:#000">
			<div class="col-md-4 col-sm-4" style="border-right: 1px solid #d5d6d9"><?php echo $r->TrainName ?>(<?php echo $r->TrainNo ?>)</br></br><strong>(<?php echo $r->TrainType ?>)</strong><form method="get" action="./checkAvailability.php">
				<select name="class">
				  <option value="1A">1A</option>
				  <option value="2A">2A</option>
				  <option value="3A">3A</option>
				  <option value="SL">SL</option>
				</select>
				<input type="hidden" name="trainNo" value="<?php echo $r->TrainNo ?>" >
				<input type="hidden" name="source" value="<?php echo $source ?>">
				<input type="hidden" name="destination" value="<?php echo $destination ?>">
				<input type="Submit" name="submit" value="Check Avaliability">
			</form>
			</div>

			<div class="col-md-8 col-sm-8 col-xs-12" style="text-align:right;">
				<div class="row">
					<div class="col-md-4" style="text-align:right;"><p><?php echo $r->Source ?></p><p style="font-size:10px"><br><p><?php echo $r->ArrivalTime ?></p></div>
				<div class="col-md-4" style="margin-top:10px;">+<?php echo $r->TravelTime ?></p><img src="./images/route.png" ></div>
			<div class="col-md-4"><p><?php echo $r->Destination ?></p><br><p><?php echo $r->DepartureTime ?></p>
			</div>
		</div>
				
			</div>
		</div>
	<?php  } ?>
		</div>
	<?php } ?>
		
	</div>

	<?php include './includes/footer.php'?>