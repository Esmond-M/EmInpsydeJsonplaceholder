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


require plugin_dir_path(__FILE__) . 'EmInpsydeJsonplaceholder.php';
use EmInpsydeJsonplaceholder\EmInpsydeJsonplaceholder;

new EmInpsydeJsonplaceholder;
