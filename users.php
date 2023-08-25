<?php 

	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$rows = db_query("select * from users");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
	<div class="row">
	<?php if(!empty($rows)):?>
		<?php foreach($rows as $row):?>
			<div class="col-2 border rounded mx-auto mt-5 p-2 shadow-lg" style="width:200px;">
				<a href="index.php?id=<?=$row['id']?>">
					<div class="col-md-12 text-center">
						<img src="<?=get_image($row['image'])?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
						<div>

						 	<div><?=esc($row['email'])?></div>
						 	<div><?=esc($row['firstname'])?> <?=esc($row['lastname'])?></div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach;?>
	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>
	</div>
</body>
</html>