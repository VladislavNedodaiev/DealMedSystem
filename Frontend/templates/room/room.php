<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<?php if ($room->title) echo $room->title; else echo getLocalString('room', 'title'); ?>
			<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeRoom(<?php echo $room->id; ?>)" id="removeRoom<?php echo $room->id; ?>"><i class="text-danger fas fa-times"></i></a>
			<a href="#" data-toggle="modal" data-target="#formModal" onclick="editRoom(<?php echo $room->id; ?>, <?php echo $room->isCabinet; ?>,  '<?php echo $room->title; ?>', '<?php echo $room->x; ?>', '<?php echo $room->y; ?>', '<?php echo $room->width; ?>', '<?php echo $room->height; ?>')" id="editRoom<?php echo $room->id; ?>"><i class="text-primary fas fa-pencil-alt"></i></a>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col">
					<div class="row m-2">
						<div class="col-7 my-auto">
							<small class = "text-muted"><?php echo getLocalString('room', 'x'); ?>: </small>
						</div>
						<div class="col-5 my-auto">
							<?php echo $room->x; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col-7 my-auto">
							<small class = "text-muted"><?php echo getLocalString('room', 'y'); ?>: </small>
						</div>
						<div class="col-5 my-auto">
							<?php echo $room->y; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col-7 my-auto">
							<small class = "text-muted"><?php echo getLocalString('room', 'width'); ?>: </small>
						</div>
						<div class="col-5 my-auto">
							<?php echo $room->width; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col-7 my-auto">
							<small class = "text-muted"><?php echo getLocalString('room', 'height'); ?>: </small>
						</div>
						<div class="col-5 my-auto">
							<?php echo $room->height; ?>
						</div>
					</div>
				</div>
			</div>
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