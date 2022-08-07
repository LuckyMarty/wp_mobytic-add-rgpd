<?php
/**
 * Mobytic - RGPD
 *
 * @package       MOBYTICRGPD
 * @author        Lucky Marty
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Mobytic - RGPD
 * Plugin URI:    https://mobytic.com/
 * Description:   Bannière RGPD
 * Version:       1.0.0
 * Author:        Lucky Marty
 * Author URI:    https://luckymarty.fr/
 * Text Domain:   mobytic-rgpd
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Mobytic - RGPD. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_mobytic_rgpd() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_mobytic_rgpd' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_mobytic_rgpd() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_mobytic_rgpd' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}