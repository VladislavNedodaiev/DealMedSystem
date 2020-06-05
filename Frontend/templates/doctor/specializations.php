<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('doctor_specializations', 'doctor_specializations_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_GET['doctorID']) && isset($_SESSION['profile']) && $diseases && (!$doctor_specializations || count($diseases) - count($doctor_specializations) >= 1)) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addSpecialization()" id="addSpecialization<?php echo $_GET['doctorID']; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('doctor_specializations', 'add_specialization'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$doctor_specializations || empty($doctor_specializations)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('doctor_specializations', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($doctor_specializations as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><a href="disease.php?diseaseID=<?php echo $value->diseaseID; ?>"><?php echo $diseases[$value->diseaseID]->title; ?></a></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeSpecialization(<?php echo $value->id; ?>)" id="removeSpecialization<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
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

let diseases = [];
let pos = 0;

<?php
if ($doctor_specializations) {
	foreach ($doctor_specializations as $key=>&$value) {

		if (isset($diseases[$value->diseaseID]))
			unset($diseases[$value->diseaseID]);

	}
}

foreach($diseases as $key=>&$value) { ?>
	diseases[pos] = {
		'id': <?php echo $key; ?>,
		'title': "<?php echo $value->title; ?>"
	};
	pos++;
<?php } ?>

function removeSpecialization(id) {

	document.getElementById('form').action = "scripts/specialization/remove_specialization.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('doctor_specializations', 'remove_specialization_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('doctor_specializations', 'remove_specialization_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('doctor_specializations', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addSpecialization() {

	document.getElementById('form').action = 'scripts/specialization/add_specialization.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('specialization', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<select id='diseaseID' name='diseaseID' required>";
				for (let i = 0; i < diseases.length; i++) {
					addinnerHTML += "<option value='" + diseases[i]['id'] + "'>" + diseases[i]['title'] + "</option>";
				}
			addinnerHTML += "</select>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("doctor_specializations", "add_specialization_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("doctor_specializations", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>