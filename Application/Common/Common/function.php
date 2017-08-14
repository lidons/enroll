<?php
function  show($status, $message) {
	$data = array(
			'status' => $status,
			'message' => $message,
	);
	exit(json_encode($data));
}