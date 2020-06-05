<article class="card-body mx-auto">
	<div class="card" style="width: 70rem;">
		<div class="card-header">
			<div class="row">
				<div class="col-8 my-auto"><?php echo getLocalString('room_connections', 'room_connections_title'); ?></div>
				<div class="col-4 text-right my-auto">
					<?php if (isset($_GET['roomID']) && isset($_SESSION['profile']) && $rooms && (!$room_connections || count($rooms) - count($room_connections) > 1)) { ?>
						<a href="#" data-toggle="modal" data-target="#formModal" onclick="addConnection()" id="addConnection<?php echo $_GET['roomID']; ?>"><i class="text-success fas fa-plus"></i> <?php echo getLocalString('room_connections', 'add_connection'); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="card-body">
			<?php if (!$room_connections || empty($room_connections)) { ?>
				<div class="text-center m-2" style="width: 100%"><h4 class = "text-muted"><?php echo getLocalString('room_connections', 'no_information'); ?></h4></div>
			<?php } else { ?>
				<?php foreach ($room_connections as $key => &$value) { ?>
					<div class="row m-2 border-bottom">
						<div class="col-11 my-auto"><h4><a href="room.php?roomID=<?php echo $value->roomToID; ?>"><?php echo $rooms[$value->roomToID]->title; ?></a></h4></div>
						<div class="col text-right my-auto">
							<?php if (isset($_SESSION['profile'])) { ?>
								<a href="#" data-toggle="modal" data-target="#formModal" onclick="removeConnection(<?php echo $value->id; ?>)" id="removeConnection<?php echo $value->id; ?>"><i class="text-danger fas fa-times"></i></a>
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

let rooms = [];
let pos = 0;

<?php
if ($room_connections) {
	foreach ($room_connections as $key=>&$value) {

		if (isset($rooms[$value->roomToID]))
			unset($rooms[$value->roomToID]);

	}
}

if (isset($rooms[$_GET['roomID']]))
	unset($rooms[$_GET['roomID']]);

foreach($rooms as $key=>&$value) { ?>
	rooms[pos] = {
		'id': <?php echo $key; ?>,
		'title': "<?php echo $value->title; ?>"
	};
	pos++;
<?php } ?>

function removeConnection(id) {

	document.getElementById('form').action = "scripts/connection/remove_connection.php";
	document.getElementById('formModalTitle').innerHTML = "<?php echo getLocalString('room_connections', 'remove_connection_title'); ?>";
	document.getElementById('body_text').innerHTML = "<?php echo getLocalString('room_connections', 'remove_connection_text'); ?>";
	document.getElementById('input').value = id;
	document.getElementById('submit').style.display = "inline-block";
	document.getElementById('submit').value = "<?php echo getLocalString('room_connections', 'remove_submit'); ?>";
	document.getElementById('submit').classList.remove("btn-success");
	document.getElementById('submit').classList.add("btn-danger");

}

function addConnection() {

	document.getElementById('form').action = 'scripts/connection/add_connection.php';
	
	var addinnerHTML = '';
	
	addinnerHTML += "<div class='row m-1'>";
		addinnerHTML += "<div class='col-4 text-left'>";
			addinnerHTML += "<i class='fas fa-chevron-right'></i> <?php echo getLocalString('connection', 'title'); ?>";
		addinnerHTML += "</div>";
		addinnerHTML += "<div class='col-8 text-right'>";
			addinnerHTML += "<select id='roomToID' name='roomToID' required>";
				for (let i = 0; i < rooms.length; i++) {
					addinnerHTML += "<option value='" + rooms[i]['id'] + "'>" + rooms[i]['title'] + "</option>";
				}
			addinnerHTML += "</select>";
		addinnerHTML += "</div>";
	addinnerHTML += "</div>";
	document.getElementById('submit').style.display = "inline-block";
	
	document.getElementById('body_text').innerHTML = addinnerHTML;
		
	document.getElementById('formModalTitle').innerHTML = '<?php echo getLocalString("room_connections", "add_connection_title"); ?>';
	document.getElementById('submit').value = '<?php echo getLocalString("room_connections", "add_submit"); ?>';
	document.getElementById('submit').classList.remove('btn-danger');
	document.getElementById('submit').classList.add('btn-success');

}

</script>

<?php } ?>