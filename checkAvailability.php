<?php 
include 'includes/header.php';
include 'admin-panel/includes/config.php';
$trainNo= $_GET['trainNo'] ;
$journeyClass= $_GET['class'];
$source= $_GET['source'];
$destination= $_GET['destination'];
$journeyDate= date('ymd');
echo("<br><br><br><br><br><br>");
$url="https://indianrailapi.com/api/v2/SeatAvailability/apikey/".$apiKey."/TrainNumber/".$trainNo."/From/".$source."/To/".$destination."/Date/".$journeyDate."/Quota/GN/Class/".$journeyClass."/";
$result=file_get_contents($url);
$result=json_decode($result);

?>
<div class="checkAvailability-content">
	<div class="checkAvailability-table">
	<table width="100%" cellspacing="0" class="table table-striped">
                  <thead>
                    <tr><th>DATE/DAY</th>
                    <th>STATUS</th>
                    <th>CONFIRMATION PROBABILITY</th>
                    <th></th>
                  </tr></thead>
                  <tbody>
                  	<?php foreach ($result->Availability as $key ) { ?>
                  	
                    <tr class="date-status-wht">

                      <td>
                        <?php echo $key->JourneyDate ?> </td>
                      <td>
                        <?php echo $key->Availability ?>
                      </td>
                      <td>
                          <p class="no-cp"><?php echo $key->Confirm ?></p>

                      </td>
                      <td>

                              <a href="javascript:void(0)" class="btn btn-default btn-block  disabled">Book</a>

                      </td>
                    </tr>
                <?php } ?>
                    
                    
                </tbody>
              </table>
          </div>
</div>




<?php include 'includes/footer.php'; ?>