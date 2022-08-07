<?php 
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;
	
	public $mobytic_rgpd_managers_checkbox = array();
	public $mobytic_rgpd_managers_text = array();

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/mobytic-rgpd.php';

		$this->mobytic_rgpd_managers_checkbox = array(
			'mobytic_rgpd_setting_live_mode' => 'Activer',
		);

		$this->mobytic_rgpd_managers_text = array(
			'mobytic_rgpd_setting_lien' => 'Lien',
		);
	}
}