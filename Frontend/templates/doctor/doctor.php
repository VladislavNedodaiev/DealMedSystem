<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-6 my-auto">
					<a href="edit_doctor.php?doctorID=<?php echo $doctor->id; ?>"><i class="fas fa-pencil-alt"></i></a>
					<?php echo getLocalString('doctor_profile', 'title'); ?>
				</div>
				<div class="col text-right my-auto">
					<a href="specializations.php?doctorID=<?php echo $doctor->id; ?>"><button type="button" class="btn btn-primary"><?php echo getLocalString('doctor_profile', 'show_specializations'); ?></button></a>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col-3 border-right">
					<div class="card">
						<img class="card-img-top" src="<?php if ($doctor->photo && file_exists($doctor->photo)) echo $doctor->photo; else echo "images/doctors/default.jpg" ?>">
						<div class="card-header text-center">
							<?php if (isset($doctor->birthday)) { ?>
							<i class="far fa-calendar-alt"></i><small class = "text-muted"> <?php echo getLocalString('doctor_profile', 'birthday'); ?>: <?php echo substr($doctor->birthday, 0, 10); ?> </small>
							<?php } ?>
							<br>
							<small class = "text-muted"><?php echo getLocalString('doctor_profile', 'cabinet'); ?>:
								<?php if ($room->title) echo $room->title; else echo getLocalString('doctor_profile', 'no_information'); ?>
							</small>
						</div>
					</div>
				</div>
				
				<div class="col">
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'first_name'); ?>: </h4></div>
						<?php if ($doctor->firstName) { ?>
						<div class="col my-auto"><h4><?php echo $doctor->firstName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('doctor_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'second_name'); ?>: </h4></div>
						<?php if ($doctor->secondName) { ?>
						<div class="col my-auto"><h4><?php echo $doctor->secondName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('doctor_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><?php echo getLocalString('doctor_profile', 'third_name'); ?>: </h4></div>
						<?php if ($doctor->thirdName) { ?>
						<div class="col my-auto"><h4><?php echo $doctor->thirdName; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('doctor_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-transgender-alt"></i> <?php echo getLocalString('doctor_profile', 'gender'); ?>: </h4></div>
						<?php if ($doctor->gender < 0) { ?>
						<div class="col my-auto"><h4><?php echo getLocalString('doctor_profile', 'female'); ?></h4></div>
						<?php } else if ($doctor->gender > 0) { ?>
						<div class="col my-auto"><h4><?php echo getLocalString('doctor_profile', 'male'); ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('doctor_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
					<div class="row m-2 border-bottom">
						<div class="col-5 my-auto"><h4 class = "text-muted"><i class="fas fa-phone"></i> <?php echo getLocalString('doctor_profile', 'phone'); ?>: </h4></div>
						<?php if ($doctor->phone) { ?>
						<div class="col my-auto"><h4><?php echo $doctor->phone; ?></h4></div>
						<?php } else { ?>
						<div class="col my-auto"><h4 class = "text-muted"><i><?php echo getLocalString('doctor_profile', 'no_information'); ?></i></h4></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php if ($doctor->description) { ?>
				<h3 class = "text-center m-2"><?php echo getLocalString('doctor_profile', 'description'); ?></h3>
				<h4 class = "m-2"><?php echo $doctor->description; ?></h4>
			<?php } ?>
		</div>
	</div>
</article>