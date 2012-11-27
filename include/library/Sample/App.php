<?php

/**
 * Cana application class
 * 
 * @author	Devin Smith <devins@devin-smith.com>
 * @date	2009.06.11
 *
 */


class Sample_App extends Cana_App {

	public function init($params = null) {
	
		if (!$_SERVER['__HTTP_HOST']) {
			$cli = true;
		}
		
		$params['env'] = 'local';

		parent::init($params);

		// modify the config based on specific domains or anything custom here

		parent::postInit($params);


	}

	public function displayPage($page = null) {

		if (is_null($page)) {
			$page = $this->pages();
			$page = isset($page[0]) ? $page[0] : '';
			switch ($page) {
				case '':
					$pageName = Cana::config()->defaults->page;
					break;
				default:
					$pageName = implode('/',$this->pages());
					break;
			
			}
		} else {
			$pageName = $page;
		}

		parent::displayPage($pageName);
		
		return $this;
	}

	
	public function buildView($params = array()) {

		// domain level setup
		$params['theme'][] = $this->config()->defaults->version.'/'.$this->config()->defaults->theme.'/';
		if (is_array($themes = json_decode($this->config()->domain->theme,'array'))) {
			$themes = array_reverse($themes);
			foreach ($themes as $theme) {
				$params['theme'][] = $this->config()->defaults->version.'/'.$theme.'/';
			}
		} else {
			$params['theme'][] = $this->config()->defaults->version.'/'.$this->config()->domain->theme.'/';
		}
		
		if (isset($this->config()->domain->version)) {
			$params['theme'][] = $this->config()->domain->version.'/'.$this->config()->defaults->theme.'/';
		}
		if (is_array($themes = json_decode($this->config()->domain->theme,'array'))) {
			$themes = array_reverse($themes);
			foreach ($themes as $theme) {
				$params['theme'][] = $this->config()->domain->version.'/'.$theme.'/';
			}
		} elseif (isset($this->config()->domain->version)) {
			$params['theme'][] = $this->config()->domain->version.'/'.$this->config()->domain->theme.'/';
		}
		
		$params['layout'] =  $this->config()->defaults->layout;

		foreach ($params['theme'] as $theme) {
			$this->controllerStack($theme);
		}

		parent::buildView($params);
		
		return $this;
	}

	
} 
