<?php
defined('C5_EXECUTE') or die("Access Denied.");

class OptimizeHtml {
	public function optimize($html=false){
		$c = Page::getCurrentPage();
		$u = new User();
		
		/* 
			Do not minimize HTML when:
			- In dashboard area
			- User is logged in
			- Page has attribute 'optimize_html_disabled'
		*/
		if(!$c OR $c->isAdminArea() OR $u->isRegistered() OR $c->getAttribute('optimize_html_disabled')){
			return $html;
		} else {
			$mhh = Loader::helper('d3_minimize_html', 'd3_html_optimizer');
			return $mhh->minify($html);
		}
	}
}