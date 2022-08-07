<?php 
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueBack' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueFront' ) );
	}
	
	function enqueueBack() {
		// enqueue all our scripts
		wp_enqueue_style( 'mobytic_rgpd_back', $this->plugin_url . 'assets/css/mobytic_rgpd_back.css' );
		wp_enqueue_script( 'mobytic_rgpd_back', $this->plugin_url . 'assets/js/mobytic_rgpd_back.js' );
	}
		function enqueueFront() {
		// enqueue all our scripts
		wp_enqueue_style( 'mobytic_rgpd_front', $this->plugin_url . 'assets/css/mobytic_rgpd_front.css' );
		wp_enqueue_script( 'mobytic_rgpd_front', $this->plugin_url . 'assets/js/mobytic_rgpd_front.js' );
	}
}