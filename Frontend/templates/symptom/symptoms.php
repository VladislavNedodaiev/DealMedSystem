<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('clinic_symptoms', 'clinic_symptoms_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_SESSION['profile'])) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addSymptom()" id="addSymptom<?php echo $_SESSION['profile']->id; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('clinic_symptoms', 'add_symptom'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$clinic_symptoms || empty($clinic_symptoms)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('clinic_symptoms', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($clinic_symptoms as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><?php echo $value->title; ?></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeSymptom(<?php echo $value->id; ?>)" id="removeSymptom<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="editSymptom(<?php echo $value->id; ?>, '<?php echo $value->title; ?>', '<?php echo $value->description; ?>')" id="editSymptom<?php echo $value->id; ?>"><i class="text-primary fas fa-pencil-alt"></i></a>
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

function removeSymptom(id) {

	document.getElementById('form').action = "scripts/symptom/remove_symptom.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('clinic_symptoms', 'remove_symptom_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('clinic_symptoms', 'remove_symptom_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('clinic_symptoms', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addSymptom() {

	document.getElementById('form').action = 'scripts/symptom/add_symptom.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('symptom', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='title' style='width:100%' id='title' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'symptom_title_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('symptom', 'description'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='description' style='width:100%' id='description' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'symptom_description_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_symptoms", "add_symptom_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_symptoms", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}


function editSymptom(id, title, description) {

	document.getElementById('form').action = 'scripts/symptom/edit_symptom.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('symptom', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='title' style='width:100%' id='title' value='" + title + "' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'symptom_title_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('symptom', 'description'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='description' style='width:100%' id='description' value='" + description + "' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'symptom_description_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_symptoms", "edit_symptom_title"); ?>';
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_symptoms", "edit_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>