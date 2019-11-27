<?php 
	include './includes/header.php';
	include('admin-panel/includes/config.php');
	//increasing the counter by 1 on page loading
	$sql="UPDATE `views` SET `pnr`=`pnr`+1 WHERE 1";
	$result=mysqli_query($db,$sql);
?>
	<div class="PnrStatus">
		<div class="content">
		<h1 class="w3-margin w3-Large w3-bold text-center">CHECK PNR STATUS</h1>
		<form method="post" >
			<div style="margin:0% auto;width:50%;margin-bottom:4%;" id="searchBox">
			<div class="input-group" style="border: 1px solid #2196F3;height: auto">
			    <input type="text" class="form-control search_field" style="border-radius:0px;" placeholder="Search....." name="pnrStatus" required>
			    <input type="submit" name="submit" class="btn btn-secondary" style="border-radius: 0px;border:0px;border-left:1px solid #2196F3;color:#2196F3;background-color:#fff" value="GET DETAILS">
			</div>
		</form>
		</div>
		
			<?php 
			if(isset($_POST['pnrStatus'])){
			$pnrNo=$_POST['pnrStatus'];
			$url="http://indianrailapi.com/api/v2/PNRCheck/apikey/".$apiKey."/PNRNumber/".$pnrNo."/";
			$result=file_get_contents($url);
			$result=json_decode($result);
			?>
			<script type="text/javascript">
			$(".PnrStatus").css("marginTop","10%");
			console.log(<?php echo $result ?>);
		</script>
		<?php if($result->Status=="SUCCESS"){?>
		<div class="pnrDetails">
			<div class="row search-result-title">
				<div class="col">
					<p class="pnr-normal-text">PNR NUMBER</p>
					<p class="pnr-bold-text"><?php echo $result->PnrNumber ?></p>
				</div>
				<div class="col">
					<p class="pnr-normal-text">CURRENT STATUS</p>
					<p class="pnr-bold-text">S6 71</p>
				</div>
				<div class="col">
					<p class="pnr-normal-text">CHART PREPARED</p>
					<p class="pnr-bold-text"><?php echo $result->ChatPrepared ?></p>
				</div>
			</div>
			<hr style="border-top: dashed 2px;" />
			<div>
				<p class="pnr-normal-text">TRAIN NAME</p>
				<p class="pnr-blue-text">13164-ZYZ-EXPRESS <?php echo $result->TrainNumber."-".$result->TrainName ?></p>
			</div>
			<div class="row search-result-info">
				<div class="col-md-4 col-xs-4">
					<div class="info">
						<p class="pnr-normal-text">From</p>
						<p class="pnr-bold-text"><?php echo $result->From ?></p>
						<p >12:00 AM</p>
					</div>
					<div class="info">
						<p class="pnr-normal-text" >DAY OF BOARDING</p>
						<p class="pnr-bold-text"><?php echo $result->JourneyDate ?></p>
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="info">
						<p class="pnr-normal-text">TO</p>
						<p class="pnr-bold-text">DELHI | DLI</p>
						<p >02:00 PM</p>
					</div>
					<div class="info">
						<p class="pnr-normal-text" >CLASS</p>
						<p class="pnr-bold-text"><?php echo $result->JourneyClass ?></p>
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="info">
						<p class="pnr-normal-text">JOURNEY TIME</p>
						<p class="pnr-bold-text">7H 20M</p>
						<br>
						
					</div>
					<div class="info">
						<p class="pnr-normal-text" >PF# (TENTATIVE)</p>
						<p class="pnr-bold-text">1 </p>
					</div>
				</div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
			<?php foreach ($result->Passangers as $key ) {?>
				# code...
			
			<div class="row chart-status">
				<div class="col-md-4 col-xs-4"> 
					<p class="pnr-normal-text">BOOKING STATUS</p>
					<p class="pnr-bold-text"><?php echo $key->BookingStatus ?> </p>
					</div>
				<div class="col-md-4 col-xs-4">
					<p class="pnr-normal-text">CURRENT STATUS</p>
					<p class="pnr-bold-text"><?php echo $key->CurrentStatus ?></p>
				</div>
				<div class="col-md-4 col-xs-4">
					<p class="pnr-normal-text">CONFIRMATION PROBABILITY</p>
					<p class="pnr-bold-text">-</p>
				 </div>

			</div>
			<?php } ?>
		</div>
		<?php }else {?>
			<div class="alert alert-danger" role="alert" style="margin:20px">Sorry Either Your Status Is Failed Or Wrong PNR Number</div>
		


			<?php }}?>
			
		
	</div>
	<script type="text/javascript">
		function getPnr(){
			var pnrNo=$("#pnr").val();
			console.log("length is ",pnrNo.length);
			if(pnrNo.length<10){
				alert("PLEASE ENTER A VALID PNR NO.");
			}
			axios.get(`http://indianrailapi.com/api/v2/PNRCheck/apikey/141dd10d53b3ebf184a7802a8ca42b75/PNRNumber/${pnrNo}/Route/1/`).then(res=>{
				console.log("pikachu",res);
				var div = document.createElement('div');
				div.innerHTML =`<div class="row" style="margin:20px;"><ul class="l-grey">
          <li>Seat Information
            <ul id="nested-notes">
              <li>Coach &amp; seat number: N/A</li>
              <li>Status : ${res.data.Status}</li>
              <li> From -> To : ${res.data.From +"->"+res.data.To}</li>
              <li>CNF (Confirmation) of ticket without any seat number. Final seats are shown after chart is prepared in such cases.
                Class of Travel &amp; Fare : ${res.data.JourneyClass?res.data.JourneyClass:"N/A"}</li>
            </ul>
          </li>
          <li>Class of Travel &amp; Fare : ${res.data.JourneyClass}</li>
          <li>Chart Status (Prepared - Yes/No) ${res.data.ChatPrepared?res.data.ChatPrepared:"N/A"}</li>
          <li>Train name &amp; number</li>
          <li>Booking Status &amp; Current Status ( e.g. GNWL 25 / S2, 16 )</li>
          <li>Boarding time from source station &amp; Reaching time at destination station.</li>
          <li>Journey Time : ${res.data.JourneyDate?res.data.JourneyDate:"N/A"}</li>
      </ul>
				</div>`;
				document.getElementById('PNR-Details').appendChild(div);
			})
		}
	</script>
	<?php include './includes/footer.php'?>
	
