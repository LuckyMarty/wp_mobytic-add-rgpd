<?php 
/**
 * @package       MOBYTICRGPD
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkboxSanitize( $input )
	{
		// return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
		// return ( isset($input) ? true : false );
		$output = array();

		foreach ($this->mobytic_rgpd_managers_checkbox as $key => $value) {
			$output[$key] = isset($input[$key]) ? true : false;
		}

		foreach ($this->mobytic_rgpd_managers_text as $key => $value) {
			$output[$key] = isset($input[$key]) ? $input[$key] : false;
		}


		return $output;
	}
	public function textSanitize( $input )
	{
		// return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
		// return ( isset($input) ? true : false );
		$output = array();

		foreach ($this->mobytic_rgpd_managers_text as $key => $value) {
			$output[$key] = isset($input[$key]);
		}
		return $output;
	}

	public function adminSectionManager()
	{
		echo 'Bannière Cookies / RGPD by Mobytic';
	}

	public function checkboxField( $args )
	{
		// var_dump($args);
		$name = $args['label_for'];
		$classes = $args['label_class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );

		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
		// echo $checkbox = get_option( $option_name );
		// echo '<input type="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
		echo 
        '
        <label class="' . $classes . '" for="'.$name.'">
        <input 
			type="checkbox" 
			id="' . $name . '" 
			name="' . $option_name . '[' . $name .']" 
			value="1" 
			' . ( $checked ? 'checked' : '') . 
		'>
        <span class="slider round"></span>
        </label>
        ';
	}

	public function textField( $args )
	{
		// var_dump($args);
		$name = $args['label_for'];
		$option_name = $args['option_name'];
		$input = get_option( $option_name );

		$value = isset($input[$name]) ? $input[$name] : '';

		echo 
        '
        <input 
			type="text" 
			id="' . $name . '" 
			name="' . $option_name . '[' . $name .']" 
			value="'.$value.'"
		>';
	}
}