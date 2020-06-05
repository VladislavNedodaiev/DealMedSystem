<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['profile'])) {
	
	header("Location: index.php");
	exit;
	
}

$account = $_SESSION['profile'];

$disease = require_once("scripts/disease/disease.php");
$symptoms = require_once("scripts/symptom/symptoms.php");
$disease_features = require_once("scripts/disease/features.php");

?>

<?php require "templates/header.php"; ?>

<?php include "templates/alert.php" ?>

<form action="" id='form' method="POST">
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<span id="body_text"></span>
				<input id="input" name="input" type="hidden" value="0">
				<input id='diseaseID' name='diseaseID' type='hidden' value='<?php echo $disease->id; ?>'>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo getLocalString('disease_features', 'modal_close'); ?></button>
				<input type="submit" id="submit" class="btn btn-danger" value='<?php echo getLocalString('disease_features', 'remove_submit'); ?>'>
			</div>
		</div>
	</div>
</div>
</form>

<?php include "templates/disease/disease.php" ?>

<?php include "templates/disease/features.php" ?>

<?php require "templates/footer.php"; ?>