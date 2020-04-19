<?php

/**
Class file.
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

if (!class_exists('EmInpsydeJsonplaceholder')) {
    /**
    Declaring class

    @category Wordpress_Plugin
    @package  Esmond-M
    @author   Esmond Mccain <esmondmccain@gmail.com>
    @license  https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
    @link     esmondmccain.com
    @return
     */

    class EmInpsydeJsonplaceholder
    {

        /**
        Declaring constructor
         */
        public function __construct()
        {
            add_filter(
                'the_content',
                [$this, 'emCustomEndpointUrl']
            );
            add_action(
                'wp_enqueue_scripts',
                [$this, 'emInpsydeJsonScripts']
            );
        }

        /**
        Custom endpoint url function

        @return void
         */
        public function emCustomEndpointUrl()
        {
            $inpsydeEndpoint = filter_input( // validated input var
                INPUT_GET,
                'inpsyde-endpoint', FILTER_VALIDATE_URL
            );
            if (isset($inpsydeEndpoint)) {
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
                'em-Inpsyde-Jsonplaceholder-Scripts',
                EM_Inpsyde_Jsonplaceholder_Constants_URL
                . 'public/js/general.js',
                ['jquery'],
                $rand,
                true
            );
            wp_enqueue_style(
                'em-Inpsyde-Jsonplaceholder-Styles',
                EM_Inpsyde_Jsonplaceholder_Constants_URL
                . 'public/css/style.css',
                [],
                $rand
            );
        }
    }
}

