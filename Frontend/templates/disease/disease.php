<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<?php if ($disease->title) echo $disease->title; else echo getLocalString('disease', 'title'); ?>
			<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeDisease(<?php echo $disease->id; ?>)" id="removeDisease<?php echo $disease->id; ?>"><i class="text-danger fas fa-times"></i></a>
			<a href="#" data-toggle="modal" data-target="#formModal" onclick="editDisease(<?php echo $disease->id; ?>, <?php echo $disease->airSpread; ?>, '<?php echo $disease->title; ?>', <?php echo $disease->immunity; ?>, '<?php echo $disease->description; ?>')" id="editDisease<?php echo $disease->id; ?>"><i class="text-primary fas fa-pencil-alt"></i></a>
		</div>
		
		<div class="card-body">
			<div class="row">
				<div class="col">
					<div class="row m-2">
						<div class="col my-auto">
							<small class = "text-muted"><?php echo getLocalString('disease', 'airSpread'); ?>: </small>
						</div>
						<div class="col my-auto">
							<?php echo $disease->airSpread; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col my-auto">
							<small class = "text-muted"><?php echo getLocalString('disease', 'title'); ?>: </small>
						</div>
						<div class="col my-auto">
							<?php echo $disease->title; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col my-auto">
							<small class = "text-muted"><?php echo getLocalString('disease', 'immunity'); ?>: </small>
						</div>
						<div class="col my-auto">
							<?php echo $disease->immunity; ?>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row m-2">
						<div class="col my-auto">
							<small class = "text-muted"><?php echo getLocalString('disease', 'description'); ?>: </small>
						</div>
						<div class="col my-auto">
							<?php echo $disease->description; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>


<?php if (isset($_SESSION['profile'])) { ?>
<script>
function removeDisease(id) {

	document.getElementById('form').action = "scripts/disease/remove_disease.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('clinic_diseases', 'remove_disease_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('clinic_diseases', 'remove_disease_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('clinic_diseases', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function editDisease(id, airSpread, title, immunity, description) {

	document.getElementById('form').action = 'scripts/disease/edit_disease.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col text-center'>";
			addinnerHTML += "<?php echo getLocalString('clinic_diseases', 'isAirSpread_title'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-6'>";
			if (!airSpread)
				addinnerHTML += "<input name='airSpread' checked required style='width:100%' type='radio' value='0'/>";
			else
				addinnerHTML += "<input name='airSpread' required style='width:100%' type='radio' value='0'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_diseases', 'notAirSpread'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-6'>";
			if (airSpread)
				addinnerHTML += "<input name='airSpread' checked required style='width:100%' type='radio' value='1'/>";
			else
				addinnerHTML += "<input name='airSpread' required style='width:100%' type='radio' value='1'/>";
			addinnerHTML += "<?php echo getLocalString('clinic_diseases', 'isAirSpread'); ?>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<br>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('disease', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='title' style='width:100%' id='title' value='" + title + "' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'disease_title_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('disease', 'immunity'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='immunity' style='width:100%' id='immunity' value='" + immunity + "' type='number' step='0.01' min='0' max='1.00' placeholder=\"<?php echo getLocalString('edit_profile', 'immunity_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('disease', 'description'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<input name='description' style='width:100%' id='description' value='" + description + "' type='text' placeholder=\"<?php echo getLocalString('edit_profile', 'disease_description_placeholder'); ?>\" required>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("clinic_diseases", "edit_disease_title"); ?>';
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = '<?php echo getLocalString("clinic_diseases", "edit_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>