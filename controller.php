<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

/*
    Author: Adri Kodde
    Date: 2013-08-13
*/

class D3HtmlOptimizerPackage extends Package {

	protected $pkgHandle = 'd3_html_optimizer';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '0.9.5';
	
	public function getPackageDescription() {
		return t("Minifies HTML-output to increase page load.");
	}
	
	public function getPackageName() {
		return t("HTML optimizer");
	} 
	
	public function install() {
		$pkg = parent::install();
	}
	
	public function on_start() {
        Events::extend("on_page_output", "OptimizeHtml", "optimize", DIRNAME_PACKAGES . '/' . $this->pkgHandle . '/models/optimize_html.php');
    }
}