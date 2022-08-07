<?php
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if(get_option( 'mobytic_rgpd' )) {
			return;
		}

		$default = array();

		update_option( 'mobytic_rgpd', $default );
	}
}