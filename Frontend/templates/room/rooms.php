<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('clinic_rooms', 'clinic_rooms_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_SESSION['profile'])) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addRoom()" id="addRoom<?php echo $_SESSION['profile']->id; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('clinic_rooms', 'add_room'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$clinic_rooms || empty($clinic_rooms)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('clinic_rooms', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($clinic_rooms as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><a href="room.php?roomID=<?php echo $value->id; ?>"><?php echo $value->title; ?></a></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeRoom(<?php echo $value->id; ?>)" id="removeRoom<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="editRoom(<?php echo $value->id; ?>, <?php echo $value->isCabinet; ?>,  '<?php echo $value->title; ?>', '<?php echo $value->x; ?>', '<?php echo $value->y; ?>', '<?php echo $value->width; ?>', '<?php echo $value->height; ?>')" id="editRoom<?php echo $value->id; ?>"><i class="text-primary fas fa-pencil-alt"></i></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</article>


<?php if (isset($_SESSION['profile'])) { ?>
<script>

function removeRoom(id) {

	document.getElementById('form').action = "scripts/room/remove_room.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('clinic_rooms', 'remove_room_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('clinic_rooms', 'remove_room_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('clinic_rooms', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addRoom() {

	document.getElementById('form').action = 'scripts/room/add_room.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col text-center'>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'isCabinet_title'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-6'>";
			addinnerHTML += "<input name='isCabinet' required checked style='width:100%' type='radio' value='0'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'notCabinet'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-6'>";
			addinnerHTML += "<input name='isCabinet' required style='width:100%' type='radio' value='1'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'isCabinet'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<br>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='title' style='width:100%' id='title' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'room_title_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'x'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='x' style='width:100%' id='x' type='number' step='0.01' placeholder=\"<?php echo getLocalString('edit_profile', 'x_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'y'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='y' style='width:100%' id='y' type='number' step='0.01' placeholder=\"<?php echo getLocalString('edit_profile', 'y_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'width'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='width' style='width:100%' id='width' type='number' step='0.01' placeholder=\"<?php echo getLocalString('edit_profile', 'width_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'height'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='height' style='width:100%' id='height' type='number' step='0.01' placeholder=\"<?php echo getLocalString('edit_profile', 'height_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_rooms", "add_room_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_rooms", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}


function editRoom(id, isCabinet, title, x, y, width, height) {

	document.getElementById('form').action = 'scripts/room/edit_room.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col text-center'>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'isCabinet_title'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-6'>";
			if (!isCabinet)
				addinnerHTML += "<input name='isCabinet' checked required style='width:100%' type='radio' value='0'/>";
			else
				addinnerHTML += "<input name='isCabinet' required style='width:100%' type='radio' value='0'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'notCabinet'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-6'>";
			if (isCabinet)
				addinnerHTML += "<input name='isCabinet' checked required style='width:100%' type='radio' value='1'/>";
			else
				addinnerHTML += "<input name='isCabinet' required style='width:100%' type='radio' value='1'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_rooms', 'isCabinet'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<br>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='title' style='width:100%' id='title' type='text' value='" + title + "' placeholder=\"<?php echo getLocalString('edit_profile', 'room_title_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'x'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='x' style='width:100%' id='x' type='number' step='0.01' value='" + x + "' placeholder=\"<?php echo getLocalString('edit_profile', 'x_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'y'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='y' style='width:100%' id='y' type='number' step='0.01' value='" + y + "' placeholder=\"<?php echo getLocalString('edit_profile', 'y_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'width'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='width' style='width:100%' id='width' type='number' step='0.01' value='" + width + "' placeholder=\"<?php echo getLocalString('edit_profile', 'width_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('room', 'height'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='height' style='width:100%' id='height' type='number' step='0.01' value='" + height + "' placeholder=\"<?php echo getLocalString('edit_profile', 'height_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_rooms", "edit_room_title"); ?>';
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_rooms", "edit_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>