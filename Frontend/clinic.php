<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['profile'])) {
	
	header("Location: index.php");
	exit;
	
}

$account = $_SESSION['profile'];

?>

<?php require "templates/header.php"; ?>

<?php include "templates/alert.php" ?>

<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-3 my-auto">
					<a href="edit_clinic.php"><i class="fas fa-pencil-alt"></i></a>
					<?php if (isset($account->title)) echo $account->title; else echo getLocalString('clinic_profile', 'title'); ?>
				</div>
				<div class="col text-right my-auto">
					<a href="scripts/clinic/rearrange_doctors.php?clinicID=<?php echo $account->id; ?>"><button type="button" class="btn btn-success"><?php echo getLocalString('clinic_profile', 'rearrange_doctors'); ?></button></a>
					<a href="rooms.php"><button type="button" class="btn btn-primary"><?php echo getLocalString('clinic_profile', 'show_rooms'); ?></button></a>
					<a href="doctors.php"><button type="button" class="btn btn-primary"><?php echo getLocalString('clinic_profile', 'show_doctors'); ?></button></a>
					<a href="clients.php"><button type="button" class="btn btn-primary"><?php echo getLocalString('clinic_profile', 'show_clients'); ?></button></a>
					<a href="diseases.php"><button type="button" class="btn btn-primary"><?php echo getLocalString('clinic_profile', 'show_diseases'); ?></button></a>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-3 border-right">
					<div class="card">						
						<div class="card-header text-center">
							<i class="far fa-calendar-alt"></i><small class = "text-muted"> <?php echo getLocalString('clinic_profile', 'register_date'); ?>: <?php echo substr($account->registerDate, 0, 10); ?> </small>
						</div>
					</div>
				</div>
				
				<div class="col">
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="far fa-envelope"></i> <?php echo getLocalString('clinic_profile', 'email'); ?>: </h4></div>
						<div class="col my-auto"><h4><?php echo $account->email; ?></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="far fa-building"></i> <?php echo getLocalString('clinic_profile', 'address'); ?>: </h4></div>
						<?php if ($account->address) { ?>
						<div class="col my-auto"><h4><?php echo $account->address; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('clinic_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-phone"></i> <?php echo getLocalString('clinic_profile', 'phone'); ?>: </h4></div>
						<?php if ($account->phone) { ?>
						<div class="col my-auto"><h4><?php echo $account->phone; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('clinic_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>

<?php require "templates/footer.php"; ?>