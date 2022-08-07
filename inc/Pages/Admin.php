<?php 
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;
	public $callbacks_mngr;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();
		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Mobytic - RGPD', 
				'menu_title' => 'Mobytic', 
				'capability' => 'manage_options', 
				'menu_slug' => 'mobytic_rgpd', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110 
			)
		);
	}


	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'mobytic_rgpd_settings',
				'option_name' => 'mobytic_rgpd',
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			)
		);

		// $args = array();

		// foreach($this->mobytic_rgpd_managers_checkbox as $key => $value) {
		// 	$args[] = array(
		// 		'option_group' => 'mobytic_rgpd_settings',
		// 		'option_name' => $key,
		// 		'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
		// 	);
		// }

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'mobytic_rgpd_admin_index',
				'title' => 'Paramètres',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'mobytic_rgpd'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{

		$args = array();

		foreach($this->mobytic_rgpd_managers_checkbox as $key => $value) {
			$args[] = array(
				'id' 		=> $key,
				'title' 	=> $value,
				'callback' 	=> array( $this->callbacks_mngr, 'checkboxField' ),
				'page' 		=> 'mobytic_rgpd',
				'section' 	=> 'mobytic_rgpd_admin_index',
				'args' 		=> array(
								'option_name' => 'mobytic_rgpd',
								'label_for' => $key,
								'label_class' => 'switch'
								)
			);
		}

		foreach($this->mobytic_rgpd_managers_text as $key => $value) {
			$args[] = array(
				'id' 		=> $key,
				'title' 	=> $value,
				'callback' 	=> array( $this->callbacks_mngr, 'textField' ),
				'page' 		=> 'mobytic_rgpd',
				'section' 	=> 'mobytic_rgpd_admin_index',
				'args' 		=> array(
								'option_name' => 'mobytic_rgpd',
								'label_for' => $key,
								)
			);
		}

		$this->settings->setFields( $args );
	}
}