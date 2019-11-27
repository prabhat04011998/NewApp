
	<?php include './includes/header.php';
	include('admin-panel/includes/config.php');
	//increasing the counter by 1 on page
	$sql="UPDATE `views` SET `index-count`=`index-count`+1 WHERE 1";
	$result=mysqli_query($db,$sql);
	?>

	<div class="mainBody">
		<div>
			<br><br><br><br>
		</div>
		<div class="offersZone">
			<h1 style="margin-left:40px;color: #fff;"><strong>TRAIN LISTS</h1>
			<div class="card offersCard" style="width: 18rem;">
			  <img src="images/premium.jpeg" class="card-img-top" alt="..." style="height: 140px">
			  <div class="card-body">
			    <h5 class="pnr-bold-text"> Premium Trains</h5>
			    <p >Find all your premium Trains at single page.</p>
			    <a href="./premium.php" class="btn btn-primary">Find Trains</a>
			  </div>
			</div>
			<div class="card offersCard" style="width: 18rem;">
			  <img src="images/garibrath.jpeg" class="card-img-top" alt="..." style="height: 140px">
			  <div class="card-body">
			    <h5 class="pnr-bold-text">Garib Rath Trains</h5>
			    <p >Get All the Garib Rath trains with necessary data.</p>
			    <a href="./garibrath.php" class="btn btn-primary">Find Trains</a>
			  </div>
			</div>
			<div class="card offersCard" style="width: 18rem;">
			  <img src="images/rajdhani.jpeg" class="card-img-top" alt="..." style="height: 140px">
			  <div class="card-body">
			    <h5 class="pnr-bold-text">Rajdhani Trains</h5>
			    <p>Find all the rajdhani Trains with all the data.</p>
			    <a href="./rajdhani.php" class="btn btn-primary">Find Trains</a>
			  </div>
			</div>
		</div>
	</div>
	<div class="trainBtwStation">
		<h2 style="font-weight: 400;font-style: initial;margin-bottom: 20px;">TRAINS BETWEEEN STATION</h2>
		<form method="post" action="findTrains.php">
		<div class="row">
			<div class="col-md-4">
				<label>
					<img src="https://images.railyatri.in/assets/dweb/section-1/leftarrow-5b4b6f424824daca8cecfe03a53a1f54b4f84d14cf19e8fc148ef32909e5fed4.png">
					<input type="text" name="source" placeholder="Source">
				</label>
			</div>
			<div class="col-md-4">
				<label>
					<input type="text" name="destination" placeholder="Destination">
					<img src="https://images.railyatri.in/assets/dweb/section-1/rightarrow-9fa6e3266401bf716fe0f09ef4010343523c9bd175c31ca8e5317653b3eeadf0.png">
					
				</label>
			</div>
			<div class="col-md-4">
				<label>
					<img src="https://images.railyatri.in/assets/dweb/section-1/date-d560a2830867db51f0bc12559eebe58469ed8120835829d3c3ffa7611277b022.png">
					<input type="text" name="date" placeholder="yyyy/mm/dd">
				</label>
				
			</div>
		</div>
		<input type="submit" class="cta-blue" name="submit" value="Submit">
		</form>
	</div>

	<?php include './includes/footer.php'?>
	

