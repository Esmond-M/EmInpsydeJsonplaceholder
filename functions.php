<?php

if (!class_exists('EM_Inpsyde_Jsonplaceholder')) {
    /**
    Declaring class

    @category Wordpress
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

        }
        /**
        Declaring function for class instance

        @return param
         */
        public static function instance()
        {
            if (!isset(self::$instance)) {
                $className = __CLASS__;
                self::$_instance = new $className;
            }
            return self::$_instance;
        }

    }
    EM_Inpsyde_Jsonplaceholder::instance();
}

