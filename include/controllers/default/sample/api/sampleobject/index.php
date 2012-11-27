<?php

class Controller_api_sampleobject extends Sample_Controller_Rest {
	public function init() {
		switch ($this->method()) {
			case 'post':
				// do stuff for posting
				if ($_SESSION['admin']) {
					// save the restaurant
					$o = SampleObject::o(c::getPagePiece(2));

					switch (c::getPagePiece(3)) {
						default:
							$request = $this->request();
							$o->serialize($request);
							$o->save();
							echo $o->json();
							break;
					}
					
				}
				break;

			case 'get':
				$out = SampleObject::o(c::getPagePiece(2));
				if ($out->id_sampleobject) {
					echo $out->json();
				} else {
					echo json_encode(['error' => 'invalid object']);
				}
				break;
		}
	}
}