<?php

if (!class_exists('EM_Inpsyde_Jsonplaceholder')) {
    /**
    Declaring class

    @category Wordpress_Plugin
    @package  Esmond-M
    @author   Esmond Mccain <esmondmccain@gmail.com>
    @license  https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
    @link     esmondmccain.com
    @return
     */

    class EM_Inpsyde_Jsonplaceholder
    {
        private static $_instance;
        /**
        Declaring constructor
         */
        private function __construct()
        {
            add_filter('the_content', array($this, 'emCustomEndpointUrl'));
            add_action('wp_enqueue_scripts', array($this, 'emInpsydeJsonplaceholderScripts'));
        }
        /**
        Declaring function for class instance

        @return self
         */
        public static function instance()
        {
            if (!isset(self::$instance)) {
                $className = __CLASS__;
                self::$_instance = new $className;
            }
            return self::$_instance;
        }

        /**
        Custom endpoint url function

        @return void
         */
        public function emCustomEndpointUrl()
        {
            $get_inpsyde_api = $_GET['inpsyde-api'];
            if (isset($get_inpsyde_api)) {
                ?>

                <input id="btn-load-json" type="button" value="Render JSON" id="Render JSON" />
                <br/>
                <table id="jsonTable" style="visibility:hidden">
                    <thead>
                    <tr>
                        <!-- The JSON downloaded from the URL above provides four attributes.-->
                        <th>id</th>
                        <th>name</th>
                        <th>username</th>
                    </tr>
                    </thead>
                </table>
                <?php
            }
        }

        /**
        Load scripts and/or styles for plugin

        @return void
         */
        public function emInpsydeJsonplaceholderScripts()
        {
            $rand = rand(1, 99999999999);
            wp_enqueue_script('em-Inpsyde-Jsonplaceholder-Scripts', plugin_dir_url(__FILE__) . 'lib/general.js', array('jquery'), $rand, true);
        }
    }
    EM_Inpsyde_Jsonplaceholder::instance();
}

