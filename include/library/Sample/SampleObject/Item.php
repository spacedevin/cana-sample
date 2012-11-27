<?php

class Sample_SampleObject_Item extends Cana_Table {
	public function __construct($id = null) {
		parent::__construct();
		$this
			->table('sampleobject_item')
			->idVar('id_sampleobject_item')
			->load($id);
	}
	public function sampleObject() {
		SampleObject::o($this->id_sampleobject);
	}
}