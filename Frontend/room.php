<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['profile'])) {
	
	header("Location: index.php");
	exit;
	
}

$account = $_SESSION['profile'];

$room = require_once("scripts/room/room.php");
$rooms = require_once("scripts/room/rooms.php");
$room_connections = require_once("scripts/room/connections.php");

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
				<input id='roomFromID' name='roomFromID' type='hidden' value='<?php echo $room->id; ?>'>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo getLocalString('room_connections', 'modal_close'); ?></button>
				<input type="submit" id="submit" class="btn btn-danger" value='<?php echo getLocalString('room_connections', 'remove_submit'); ?>'>
			</div>
		</div>
	</div>
</div>
</form>

<?php include "templates/room/room.php" ?>

<?php include "templates/room/connections.php" ?>

<?php require "templates/footer.php"; ?>