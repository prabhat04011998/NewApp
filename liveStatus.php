
	<?php 
	include './includes/header.php';
	include('admin-panel/includes/config.php');
	$sql="UPDATE `views` SET `live-status`=`live-status`+1 WHERE 1";
	$result=mysqli_query($db,$sql);
	echo("Done");

	?>
	
	<div class="TrainStatus">
		<div class="content">
		<h1 class="w3-margin w3-Large w3-bold text-center" style="font-family: initial;">Live Train Status</h1>
		<form method="post" >
			<div style="margin:0% auto;width:50%;margin-bottom:4%;" id="searchBox">
			<div class="input-group" style="border: 1px solid #2196F3;height: auto">
			    <input type="text" class="form-control search_field" placeholder="Search....." style="border-radius:0px;" name="liveStatus" required>
			    <input type="submit" name="submit" class="btn btn-secondary" style="border-radius: 0px;border:0px;border-left:1px solid #2196F3;color:#2196F3;background-color:#fff" value="GET TRAINS">
			</div>
		</form>
		</div>
		<div class="route">
			<div class="status-message"></div>
			<div class="route-cards"></div>
			
		</div>
	</div>
	<?php 

	if(isset($_POST['liveStatus'])){
		$no=$_POST['liveStatus'];
		$url="https://indianrailapi.com/api/v2/livetrainstatus/apikey/".$apiKey."/trainnumber/".$no."/date/".date("Y").date("m").date("d");
		$result=file_get_contents($url);
		$result=json_decode($result);
	?>
		<script type="text/javascript">
			$(".TrainStatus").css("marginTop","10%");
		</script>
		<?php if(strlen($no)<5){?>
			<div class="alert alert-danger" role="alert" style="margin:20px">SORRY ! PLEASE CORRECT YOUR TRAIN NO. </div>
		

		<?php }else{?>
		<div style="box-shadow: 2px 4px 6px gray ;margin:20px;padding:10px;">
			<h5><?php echo $result->{'TrainNumber' }?></h5>
					<span>Start Date: <?php echo $result->StartDate?></span>
					<div class="status-message" style="margin:20px;box-shadow: 2px 2px 6px gray ;padding:10px;">
						<h6></h6>
						<p>Train is at <?php echo $result->CurrentStation->StationName ?> (<?php echo $result->CurrentStation->StationCode ?>) </p>
						<strong >Delayed By : <?php echo $result->CurrentStation->DelayInArrival ?></strong>

					</div>
					<h5>Time Table<p style="float:right;">Daily<p></h5></div>
			<?php foreach ($result->TrainRoute as $key) {?>
				<div style="box-shadow: 2px 4px 6px gray ;margin:20px;padding:10px;">
		<div class="timeline-plus-minus-blk clearfix text-blur"><div class="row hide"><div class="grey-bg text-center day_count"><div class="white-txt font-w500">Day : <?php echo $key->Day ?> </div></div></div><div class="row"><div class="col-md-2 text-right">
											<div class="grey-4a font-w500">
												<?php echo $key->StationCode ?>
											</div>
											<div class="fs11 l-grey">
												
											</div>
												<div >
													<?php echo $key->ScheduleArrival ?>
												</div>
												<div class="fs11 green-txt">
													<?php echo $key->ActualArrival ?>
												</div>
												
										</div>
										<div class="col-md-2"><div class="timeline-circle no-border-clr blue-bg"></div></div><div class="col-md-8"><div class="grey-4a font-w500 text-blur"><?php echo $key->StationName ?><sup>4</sup></div><div class="upcoming-stn_info marg-bot-2"><span class="font-xxs l-grey">134kms</span><span class="stn-pipe l-grey">|</span><a href="#updateplatnum" data-toggle="modal" class="dropdown-toggle" id="update_plat_num_MTJ"><span class="blue-txt_op font-xxs">PF #3</span></a><span class="l-grey dly-time"></span></div></div></div><div class="col-xs-2 "><div class="font-w500 text-blur"><div class="fs11 green-txt"></div></div></div><div class="col-xs-2"></div>
									<div class="col-xs-8">
													<div class="upcoming-stn_info">
														<span class="red-txt">
															<span style="color:#61992a"><?php echo $key->DelayInArrival=='0'? "Ontime" :"Delayed By ".$key->DelayInArrival."Min" ?>
															</span>
														</span>
														<div>
														<span class="green-txt dly-time">
															<?php echo $key->ScheduleDeparture ?>
														</span></br><span style="float: right;"><?php echo $key->ActualDeparture?></span></div>
														

													</div>
													
												</div>
												<div class="row timeline-border-btn"></div>

											</div>
										</div>
			<?php }} }?>
	
		
	
	
<?php include './includes/footer.php'?>
