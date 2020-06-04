<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_GET['doctorID']) || !isset($_SESSION['profile'])) {
	
	header("Location: index.php");
	exit;
	
}

$doctor = require_once "scripts/doctor/doctor.php";
$room = require_once "scripts/doctor/room.php";
if (!$doctor) {
	
	header("Location: index.php");
	exit;
	
}

?>

<?php require "templates/header.php"; ?>

<?php include "templates/alert.php" ?>

<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<form action="scripts/doctor/save_doctor_profile.php?doctorID=<?php echo $doctor->id; ?>" method="POST" enctype="multipart/form-data">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('edit_profile', 'edit_profile_title'); ?></div>
				<div class="col text-right my-auto">
				
					<button type="submit" class="btn btn-success"><?php echo getLocalString('edit_profile', 'save_button_text'); ?></button>
					<a href="doctor.php?doctorID=<?php echo $doctor->id; ?>"><button type="button" class="btn btn-secondary"><?php echo getLocalString('edit_profile', 'cancel_button_text'); ?></button></a>
				
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-3 border-right">
					<div class="card">
						<div class="card-header text-muted text-center" style="display: none" id="filepath"></div>
						<label style="margin: -1px" for="photo"><img id="photo_img" class="card-img-top" style="cursor: pointer"
							src="<?php if ($doctor->photo && file_exists($doctor->photo)) echo $doctor->photo; else echo "images/doctors/default.jpg"; ?>"></label>
						<input type="file" style="display: none" accept="image/png, image/jpeg" class="form-control-file" name="photo" id="photo">
						<input type="hidden" name="oldphoto" id="oldphoto" style="display:none" value="<?php if ($doctor->photo && file_exists($doctor->photo)) echo $doctor->photo; else echo "images/doctors/default.jpg"; ?>">
						
						<div class="card-header text-center">
							<i class="far fa-calendar-alt"></i><small class = "text-muted"> <?php echo getLocalString('doctor_profile', 'birthday'); ?>: <input name="birthday" id="birthday" <?php if ($doctor->birthday) echo "value='".substr($doctor->birthday, 0, 10)."'"; ?> type="date" required></small>
							<?php if (isset($room)) { ?>
							<br>
							<small class = "text-muted"><?php echo getLocalString('doctor_profile', 'cabinet'); ?>: ?>
								<?php if ($room->title) echo $room->title; else echo getLocalString('doctor_profile', 'no_information'); ?>
							</small>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="col">
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'first_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="firstName" name="firstName" placeholder="<?php echo getLocalString('edit_profile', 'first_name_placeholder'); ?>" value="<?php echo $doctor->firstName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'second_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="secondName" name="secondName" placeholder="<?php echo getLocalString('edit_profile', 'second_name_placeholder'); ?>" value="<?php echo $doctor->secondName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'third_name'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="thirdName" name="thirdName" placeholder="<?php echo getLocalString('edit_profile', 'third_name_placeholder'); ?>" value="<?php echo $doctor->thirdName; ?>"></h4></div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-transgender-alt"></i> <?php echo getLocalString('doctor_profile', 'gender'); ?>: </h4></div>
						<div class="col p-2">
						<select id="gender" name="gender" class="form-control">
							<option value="0" <?php if($doctor->gender == 0) echo 'selected'; ?>><?php echo getLocalString('doctor_profile', 'no_information'); ?></option>
							<option value="-1" <?php if($doctor->gender < 0) echo 'selected'; ?>><?php echo getLocalString('doctor_profile', 'female'); ?></option>
							<option value="1" <?php if($doctor->gender > 0) echo 'selected'; ?>><?php echo getLocalString('doctor_profile', 'male'); ?></option>
						</select>
						</div>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-phone"></i> <?php echo getLocalString('doctor_profile', 'phone'); ?>: </h4></div>
						<div class="col p-2"><h4><input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo getLocalString('edit_profile', 'phone_placeholder'); ?>" value="<?php echo $doctor->phone; ?>"></h4></div>
					</div>
				</div>
			</div>
			
			<h3 class = "text-center m-2"><?php echo getLocalString('doctor_profile', 'description'); ?></h3>
			<div class="container m-2">
				<textarea class="form-control" name="description" id="description" placeholder="<?php echo getLocalString('edit_profile', 'description_placeholder'); ?>" maxlength="3000" rows="8"><?php echo $doctor->description; ?></textarea>
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

tinymce.init({selector:'#description'});

</script>

<?php require "templates/footer.php"; ?>