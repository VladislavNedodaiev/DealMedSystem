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
		<form action="scripts/client/save_client_profile.php?clientID=<?php echo $client->id; ?>" method="POST" enctype="multipart/form-data">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('edit_profile', 'edit_profile_title'); ?></div>
				<div class="col text-right my-auto">
				
					<button type="submit" class="btn btn-success"><?php echo getLocalString('edit_profile', 'save_button_text'); ?></button>
					<a href="client.php"><button type="button" class="btn btn-secondary"><?php echo getLocalString('edit_profile', 'cancel_button_text'); ?></button></a>
				
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-3 border-right">
					<div class="card">
						<div class="card-header text-muted text-center" style="display: none" id="filepath"></div>
						<label style="margin: -1px" for="photo"><img id="photo_img" class="card-img-top" style="cursor: pointer"
							src="<?php if ($client->photo && file_exists($client->photo)) echo $client->photo; else echo "images/clients/default.jpg"; ?>"></label>
						<input type="file" style="display: none" accept="image/png, image/jpeg" class="form-control-file" name="photo" id="photo">
						<input type="hidden" name="oldphoto" id="oldphoto" style="display:none" value="<?php if ($client->photo && file_exists($client->photo)) echo $client->photo; else echo "images/clients/default.jpg"; ?>">
						
						<div class="card-header text-center">
							<i class="far fa-calendar-alt"></i><small class = "text-muted"> <?php echo getLocalString('client_profile', 'birthday'); ?>: <input name="birthday" id="birthday" <?php if ($client->birthday) echo "value='".substr($client->birthday, 0, 10)."'"; ?> type="date" required> </small>
						</div>
					</div>
				</div>
				
				<div class="col">
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'first_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo getLocalString('edit_profile', 'first_name_placeholder'); ?>" value="<?php echo $client->firstName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'second_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="second_name" name="second_name" placeholder="<?php echo getLocalString('edit_profile', 'second_name_placeholder'); ?>" value="<?php echo $client->secondName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('client_profile', 'third_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="third_name" name="third_name" placeholder="<?php echo getLocalString('edit_profile', 'third_name_placeholder'); ?>" value="<?php echo $client->thirdName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-transgender-alt"></i> <?php echo getLocalString('client_profile', 'gender'); ?>: </h4></div>
						<div class="col p-2">
						<select id="gender" name="gender" class="form-control">
							<option value="0" <?php if($client->gender == 0) echo 'selected'; ?>><?php echo getLocalString('client_profile', 'no_information'); ?></option>
							<option value="-1" <?php if($client->gender < 0) echo 'selected'; ?>><?php echo getLocalString('client_profile', 'female'); ?></option>
							<option value="1" <?php if($client->gender > 0) echo 'selected'; ?>><?php echo getLocalString('client_profile', 'male'); ?></option>
						</select>
						</div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-phone"></i> <?php echo getLocalString('client_profile', 'phone'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo getLocalString('edit_profile', 'phone_placeholder'); ?>" value="<?php echo $client->phone; ?>"></h4></div>
					</div>
				</div>
			</div>
			
		</div>
		</form>
	</div>
</article>

<script>

var photo = document.getElementById('photo');
var photo_img = document.getElementById('photo_img');
var filepath = document.getElementById('filepath');

photo.onchange = function(event) {
	
	photo_img.src = URL.createObjectURL(event.target.files[0]);
	
	filepath.style="display: block;";
	filepath.innerHTML="<small>" + photo.value.split(/(\\|\/)/g).pop() + "</small>";
	
}

</script>

<?php require "templates/footer.php"; ?>