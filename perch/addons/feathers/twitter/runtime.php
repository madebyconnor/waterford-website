<?php
	
PerchSystem::register_feather('Twitter');

class PerchFeather_Twitter extends PerchFeather
{

	public function get_css($opts, $index, $count)
	{	
		$out = array();

		$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>$this->path.'/css/twitter.css',
					'type'=>'text/css'
				));


		
		
		return implode("\n\t", $out)."\n";
	}

	public function get_javascript($opts, $index, $count)
	{	
		$out = array();

		if (!$this->component_registered('twitter')) {
			$out[] = $this->_script_tag(array(
				'src'=>'//platform.twitter.com/widgets.js'
			));
			$this->register_component('twitter');
		}


		return implode("\n\t", $out)."\n";
	}

}

?>