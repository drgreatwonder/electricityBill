<!DOCTYPE html>

<head>
	<title>PHP - Calculate Electricity Bill</title>
</head>

<?php
$outcomeStore = $finalOutcome = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $finalOutcome = final_bill($units);
        $outcomeStore = 'Total amount of ' . $units . ' - ' . $finalOutcome;
    }
}
/**
 * To calculate electricity bill as per unit cost
 */
function final_bill($units) {
    $initialCost = 3.50;
    $secondCost = 4.00;
    $thirdCost = 5.20;
    $fourthCost = 6.50;

    if($units <= 50) {
        $finalBill = $units * $initialCost;
    }
    else if($units > 50 && $units <= 100) {
        $tempBill = 50 * $initialCost;
        $outstandingUnits = $units - 50;
        $finalBill = $tempBill + ( $outstandingUnits * $secondCost);
    }
    else if($units > 100 && $units <= 200) {
        $tempBill = (50 * 3.5) + (100 * $secondCost);
        $outstandingUnits = $units - 150;
        $finalBill = $tempBill + ( $outstandingUnits * $thirdCost);
    }
    else {
        $tempBill = (50 * 3.5) + (100 * $secondCost) + (100 * $thirdCost);
        $outstandingUnits = $units - 250;
        $finalBill = $tempBill + ( $outstandingUnits * $fourthCost);
    }
    return number_format((float)$finalBill, 2, '.', '');
}

?>

<body>
	<div id="page-wrap">
		<h1>Electricity Bill Company</h1>
		
		<form action="" method="post" id="quiz-form">            
            	<input type="number" name="units" id="units" placeholder="Please Input Units" />            
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>

		<div>
		    <?php echo '<br />' . $outcomeStore; ?>
		</div>	
	</div>
</body>
</html>