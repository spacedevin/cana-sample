<?php

class Controller_api_sampleobject extends Sample_Controller_Rest {
	public function init() {
		switch ($this->method()) {
			case 'post':
				// save the object
				$o = SampleObject::o(c::getPagePiece(2));
				$o->serialize($this->request());
				$o->save();
				echo $o->json();

				break;

			case 'get':
				// output the object
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