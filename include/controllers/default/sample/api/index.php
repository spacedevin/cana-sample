<?php

class Controller_api extends Sample_Controller_Rest {
	public function init() {
		echo json_encode(['error' => 'invalid request']);
	}
}