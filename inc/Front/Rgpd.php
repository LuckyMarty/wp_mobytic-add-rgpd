<?php
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Front;

class Rgpd
{
    public function register() {
        $option = get_option( 'mobytic_rgpd' );
		$activated = isset($option['mobytic_rgpd_setting_live_mode']) ? $option['mobytic_rgpd_setting_live_mode'] : false;

		if (!$activated) {
			return;
		}
        
        add_action( 'wp_footer', array( $this, 'display' ) );
    }

    public function display() {
        require_once('Banner.php');
    }
}