<?php 

// Pengulangan pada array
$angka = [1,2,3,4,5,6,7,8,9,10];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Latihan</title>
	<style>
		.kotak {
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px; 
			margin: 3px;
			float: left;
		}
		.clear {
			clear: both;
		}
	</style>
</head>
<body>
	<?php for ($i=0; $i < count($angka); $i++) { ?>
		<div class="kotak"><?php echo $angka[$i]; ?></div>
	<?php } ?>

	<div class="clear">
		<?php foreach($angka as $a) { ?>
			<div class="kotak"><?php echo $a; ?></div>
		<?php } ?>
	</div>

	<div class="clear">
		<?php foreach($angka as $a) : ?>
			<div class="kotak"><?php echo $a; ?></div>
		<?php endforeach; ?>
	</div>
</body>
</html>