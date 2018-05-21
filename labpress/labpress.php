<?php
/*
Plugin Name: labpress
Plugin URI: https://github.com/paleolimbot/labpress
Description: Laboratory sample management plugin for wordpress sites.
Version: 0.0.1.9000
Author: Dewey Dunnington
Author URI: http://www.fishandwhistle.net/
License: GPLv2
*/

// register sample post type and taxonomies
require_once plugin_dir_path(__FILE__) . '/sample-post-type.php';
