<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_GET['clientID']) || !isset($_SESSION['profile'])) {
	
	header("Location: index.php");
	exit;
	
}

$client = require_once "scripts/client/client.php";
if (!$client) {
	
	header("Location: index.php");
	exit;
	
}

?>

<?php require "templates/header.php"; ?>

<?php include "templates/alert.php" ?>

<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-6 my-auto">
					<a href="edit_client.php?clientID=<?php echo $client->id; ?>"><i class="fas fa-pencil-alt"></i></a>
					<?php echo getLocalString('client_profile', 'title'); ?>
				</div>
				<div class="col text-right my-auto">
					<a href="histories.php?clientID=<?php echo $client->id; ?>"><button type="button" class="btn btn-primary"><?php echo getLocalString('client_profile', 'show_histories'); ?></button></a>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-3 border-right">
					<div class="card">
						<img class="card-img-top" src="<?php if ($client->photo && file_exists($client->photo)) echo $client->photo; else echo "images/clients/default.jpg" ?>">
						<div class="card-header text-center">
							<i class="far fa-calendar-alt"></i><small class = "text-muted"> <?php echo getLocalString('client_profile', 'birthday'); ?>: <?php echo substr($client->birthday, 0, 10); ?> </small>
						</div>
					</div>
				</div>
				
				<div class="col">
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'first_name'); ?>: </h4></div>
						<?php if ($client->firstName) { ?>
						<div class="col my-auto"><h4><?php echo $client->firstName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('client_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'second_name'); ?>: </h4></div>
						<?php if ($client->secondName) { ?>
						<div class="col my-auto"><h4><?php echo $client->secondName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('client_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'third_name'); ?>: </h4></div>
						<?php if ($client->thirdName) { ?>
						<div class="col my-auto"><h4><?php echo $client->thirdName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('client_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-transgender-alt"></i> <?php echo getLocalString('client_profile', 'gender'); ?>: </h4></div>
						<?php if ($client->gender < 0) { ?>
						<div class="col my-auto"><h4><?php echo getLocalString('client_profile', 'female'); ?></h4></div>
						<?php } else if ($client->gender > 0) { ?>
						<div class="col my-auto"><h4><?php echo getLocalString('client_profile', 'male'); ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('client_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-phone"></i> <?php echo getLocalString('client_profile', 'phone'); ?>: </h4></div>
						<?php if ($client->phone) { ?>
						<div class="col my-auto"><h4><?php echo $client->phone; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('client_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>

<?php require "templates/footer.php"; ?>