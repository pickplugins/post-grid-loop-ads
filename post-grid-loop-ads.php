<?php
/*
Plugin Name: Post Grid Loop Ads by PickPlugins
Plugin URI: https://www.pickplugins.com/item/post-grid-create-awesome-grid-from-any-post-type-for-wordpress/
Description: Awesome post grid for query post from any post type and display on grid.
Version: 3.2.20
Author: PickPlugins
Author URI: https://www.pickplugins.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

if( !class_exists( 'PostGridLoopAds' )){
    class PostGridLoopAds{

        public function __construct(){

            define('post_grid_la_plugin_url', plugins_url('/', __FILE__));
            define('post_grid_la_plugin_dir', plugin_dir_path(__FILE__));
            define('post_grid_la_plugin_basename', plugin_basename(__FILE__));
            define('post_grid_la_plugin_name', 'Post Grid - Loop Ads');
            define('post_grid_la_version', '1.0.0');

            include('templates/post-grid-hook.php');


            add_action('wp_enqueue_scripts', array($this, '_scripts_front'));
            add_action('admin_enqueue_scripts', array($this, '_scripts_admin'));

            add_action('plugins_loaded', array($this, '_textdomain'));

            register_activation_hook(__FILE__, array($this, '_activation'));
            register_deactivation_hook(__FILE__, array($this, '_deactivation'));


        }


        public function _textdomain(){

            $locale = apply_filters('plugin_locale', get_locale(), 'post-grid-loop-ads');
            load_textdomain('post-grid-loop-ads', WP_LANG_DIR . '/post-grid-loop-ads/post-grid-loop-ads-' . $locale . '.mo');

            load_plugin_textdomain('post-grid-loop-ads', false, plugin_basename(dirname(__FILE__)) . '/languages/');

        }

        public function _activation(){

            /*
             * Custom action hook for plugin activation.
             * Action hook: post_grid_la_activation
             * */
            do_action('post_grid_la_activation');

        }

        public function post_grid_la_uninstall(){

            /*
             * Custom action hook for plugin uninstall/delete.
             * Action hook: post_grid_la_uninstall
             * */
            do_action('post_grid_la_uninstall');
        }

        public function _deactivation(){

            /*
             * Custom action hook for plugin deactivation.
             * Action hook: post_grid_la_deactivation
             * */
            do_action('post_grid_la_deactivation');
        }


        public function _scripts_front(){

            //wp_register_style('post-grid-loop-ads', post_grid_la_plugin_url.'assets/frontend/css/style.css');


//            wp_register_script('post_grid_la_scripts', post_grid_la_plugin_url. 'assets/frontend/js/scripts.js', array( 'jquery' ));
//            wp_enqueue_script('mixitup');


            /*
             * Custom action hook for scripts front.
             * Action hook: post_grid_la_scripts_front
             * */
            do_action('post_grid_la_scripts_front');
        }


        public function _scripts_admin(){

            //wp_register_style('post-grid-style', post_grid_la_plugin_url.'assets/admin/css/style.css');
            //wp_enqueue_style('post-grid-style');

            /*
             * Custom action hook for scripts admin.
             * Action hook: post_grid_la_scripts_admin
             * */
            do_action('post_grid_la_scripts_admin');
        }


    }
}
new PostGridLoopAds();