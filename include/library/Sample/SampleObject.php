<?php

class Sample_SampleObject extends Cana_Table {
	public function __construct($id = null) {
		parent::__construct();
		$this
			->table('sampleobject')
			->idVar('id_sampleobject')
			->load($id);
	}
	
	public function items() {
		if (!isset($this->_items)) {
			$this->_items = SampleObject_Item::q('select * from sampleobject_item where id_sampleobject="'.$this->id_sampleobject.'"');
		}
		return $this->_items;
	}
	
	public function exports() {
		$out = $this->properties();
		$items = $this->items();
		foreach ($items as $item) {
			$out['items'][] = $item->exports();
		}
		return $out;
	}
}