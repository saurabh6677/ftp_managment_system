<?php
require_once("common_files/database/database.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.2/cjs/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
</head>
<body>

<?php
require_once("assist/nav.php");
?>

<h5 class="text-left p-3 bg-warning text-light text-center">Shipping</h5>
<div class="text-left p-2 shadow-lg m-2 rounded-lg" style="justify-content:">
	<h6>What are the delivery charges ?</h6>
	<p>Delivery charges depends on seller.</p>
	<h6>What is the estimated delivery time ?</h6>
	<p>Product will deliver within specified date on the page. Delivery service will be closed on spacial occasion, festival, holiday or sunday.</p>
	<h6>Deliver time depends on following points -</h6>
	<p>1. Seller offering the products.</p>
	<p>2. Availability of the products.</p>
	<p>2. Distance between seller's location and shipped location.</p>
	<span><b>Note :</b> bookstore does not deliver any items internationaly.</span>
</div>


<?php
require_once("assist/footer.php");

?>

</body>