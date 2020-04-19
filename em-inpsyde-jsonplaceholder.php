<?php
/**
  Main plugin file.
PHP version 7.3

@category Wordpress_Plugin
@package  Esmond-M
@author   Esmond Mccain <esmondmccain@gmail.com>
@license  https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
@link     esmondmccain.com
@return
 */

declare(strict_types=1);
namespace EmInpsydeJsonplaceholder;

/**
 * Plugin Name: EmInpsydeJsonplaceholder
 * Plugin URI: https://esmondmccain.com
 // phpcs:disable
 // reason: Wordpress does not allow linebreak for descriptions
 * Description: Loads a html table using the REST API of https://jsonplaceholder.typicode.com/. To test add a query string of "?inpsyde-endpoint" to the end of a url.
 * // phpcs:enable
 * Version: 1.0
 * Author: Esmond Mccain
 * Author URI: https://esmondmccain.com
 */
defined('ABSPATH') or die();
/**
 * Define global constants

 * @param $constant_name
 * @param $value
 *
 * @return array
 */
function emInpsydeJsonplaceholderConstants($constant_name, $value)
{
    $constant_name_prefix = 'EM_Inpsyde_Jsonplaceholder_Constants_';
    $constant_name = $constant_name_prefix . $constant_name;
    if (!defined($constant_name))
        define($constant_name, $value);
}
emInpsydeJsonplaceholderConstants('DIR', dirname(plugin_basename(__FILE__)));
emInpsydeJsonplaceholderConstants('BASE', plugin_basename(__FILE__));
emInpsydeJsonplaceholderConstants('URL', plugin_dir_url(__FILE__));
emInpsydeJsonplaceholderConstants('PATH', plugin_dir_path(__FILE__));
emInpsydeJsonplaceholderConstants('SLUG', dirname(plugin_basename(__FILE__)));
require  EM_Inpsyde_Jsonplaceholder_Constants_PATH
    . 'includes/classes/EmInpsydeJsonplaceholder.php';

use EmInpsydeJsonplaceholder\EmInpsydeJsonplaceholder;

new EmInpsydeJsonplaceholder;
