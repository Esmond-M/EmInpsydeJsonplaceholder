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
            add_action('wp_enqueue_scripts', array($this, 'emInpsydeJsonScripts'));
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
                <p id="jsonTable-ld-top"
                   style="visibility:hidden;padding-bottom: 4rem;"></p>
                <div class="em-jsonTable-wrapper">
                <hr>
                <br/>
                <table id="jsonTable" style="visibility:hidden">
                    <thead>
                    <tr>
                        <th  colspan="3" style="color: red;text-align: center;">
                            Main Users table</th>
                    </tr>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>username</th>
                    </tr>
                    </thead>
                </table>
                </div>
                <?php
            }
        }

        /**
        Load scripts and/or styles for plugin

        @return void
         */
        public function emInpsydeJsonScripts()
        {
            $rand = rand(1, 99999999999);
            wp_enqueue_script(
                'em-Inpsyde-Jsonplaceholder-Scripts', plugin_dir_url(__FILE__)
                . 'assets/general.js', array('jquery'), $rand, true
            );
            wp_enqueue_style(
                'em-Inpsyde-Jsonplaceholder-Styles', plugin_dir_url(__FILE__)
                . 'assets/style.css', array(), $rand
            );
        }
    }
    EM_Inpsyde_Jsonplaceholder::instance();
}

