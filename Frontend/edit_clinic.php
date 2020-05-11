<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['profile'])) {

	header("Location: login.php");
	exit;

}

$account = $_SESSION['profile'];

?>

<?php require "templates/header.php"; ?>

<?php include "templates/alert.php" ?>

<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<form action="scripts/clinic/save_clinic_profile.php" method="POST">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto">
					<?php echo getLocalString('edit_profile', 'edit_profile_title'); ?>
					<input type="text" class="form-control" id="title" name="title" placeholder="<?php echo getLocalString('edit_profile', 'title_placeholder'); ?>" value="<?php echo $account->title; ?>">
				</div>
				<div class="col text-right my-auto">
				
					<button type="submit" class="btn btn-success"><?php echo getLocalString('edit_profile', 'save_button_text'); ?></button>
					<a href="clinic.php"><button type="button" class="btn btn-secondary"><?php echo getLocalString('edit_profile', 'cancel_button_text'); ?></button></a>
				
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
						<div class="col p-2"><h4><?php echo $account->email; ?></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="far fa-building"></i> <?php echo getLocalString('clinic_profile', 'address'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="address" name="address" placeholder="<?php echo getLocalString('edit_profile', 'address_placeholder'); ?>" value="<?php echo $account->address; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="far fa-phone"></i> <?php echo getLocalString('clinic_profile', 'phone'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo getLocalString('edit_profile', 'phone_placeholder'); ?>" value="<?php echo $account->phone; ?>"></h4></div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</article>

<?php require "templates/footer.php"; ?>