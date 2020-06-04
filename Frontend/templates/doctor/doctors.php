<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('clinic_doctors', 'clinic_doctors_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_SESSION['profile'])) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addDoctor()" id="addDoctor<?php echo $_SESSION['profile']->id; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('clinic_doctors', 'add_doctor'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$clinic_doctors || empty($clinic_doctors)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('clinic_doctors', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($clinic_doctors as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><a href="doctor.php?doctorID=<?php echo $value->id; ?>"><?php echo $value->firstName." ".$value->secondName." ".$value->thirdName; ?></a></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeDoctor(<?php echo $value->id; ?>)" id="removeDoctor<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
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

function removeDoctor(id) {

	document.getElementById('form').action = "scripts/doctor/remove_doctor.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('clinic_doctors', 'remove_doctor_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('clinic_doctors', 'remove_doctor_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('clinic_doctors', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addDoctor() {

	document.getElementById('form').action = 'scripts/doctor/add_doctor.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='far fa-user'></i> <?php echo getLocalString('doctor_profile', 'first_name'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='firstName' style='width:100%' id='firstName' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'first_name_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='far fa-user'></i> <?php echo getLocalString('doctor_profile', 'second_name'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='secondName' style='width:100%' id='secondName' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'second_name_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='far fa-user'></i> <?php echo getLocalString('doctor_profile', 'third_name'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='thirdName' style='width:100%' id='thirdName' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'third_name_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-transgender-alt'></i> <?php echo getLocalString('doctor_profile', 'gender'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<select style='width:100%' id='gender' name='gender' class='form-control'>";
				addinnerHTML += "<option value='0' selected><?php echo getLocalString('doctor_profile', 'no_information'); ?></option>";
				addinnerHTML += "<option value='-1'><?php echo getLocalString('doctor_profile', 'female'); ?></option>";
				addinnerHTML += "<option value='1'><?php echo getLocalString('doctor_profile', 'male'); ?></option>";
			addinnerHTML += "</select'>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_doctors", "add_doctor_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_doctors", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>