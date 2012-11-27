<?php

class Controller_error extends Cana_Controller {
	public function init() {
		Cana::view()->display('error/404');
	}
}