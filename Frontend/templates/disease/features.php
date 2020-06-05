<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('disease_features', 'disease_features_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_GET['diseaseID']) && isset($_SESSION['profile']) && $symptoms && (!$disease_features || count($symptoms) - count($disease_features) > 0)) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addFeature()" id="addFeature<?php echo $_GET['diseaseID']; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('disease_features', 'add_symptom'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$disease_features || empty($disease_features)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('disease_features', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($disease_features as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><?php echo $symptoms[$value->symptomID]->title; ?></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeFeature(<?php echo $value->id; ?>)" id="removeFeature<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
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

let symptoms = [];
let pos = 0;

<?php
if ($disease_features) {
	foreach ($disease_features as $key=>&$value) {

		if (isset($symptoms[$value->symptomID]))
			unset($symptoms[$value->symptomID]);

	}
}

foreach($symptoms as $key=>&$value) { ?>
	symptoms[pos] = {
		'id': <?php echo $key; ?>,
		'title': "<?php echo $value->title; ?>"
	};
	pos++;
<?php } ?>

function removeFeature(id) {

	document.getElementById('form').action = "scripts/feature/remove_feature.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('disease_features', 'remove_symptom_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('disease_features', 'remove_symptom_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('disease_features', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addFeature() {

	document.getElementById('form').action = 'scripts/feature/add_feature.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('symptom', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<select id='symptomID' name='symptomID' required>";
				for (let i = 0; i < symptoms.length; i++) {
					addinnerHTML += "<option value='" + symptoms[i]['id'] + "'>" + symptoms[i]['title'] + "</option>";
				}
			addinnerHTML += "</select>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("disease_features", "add_symptom_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("disease_features", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>