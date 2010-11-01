<?php

if (!defined('e107_INIT')) { exit; }

// need to pull the wowrecruit.css file so class colors and availability colors can be used globally.
// alternate method is to make anyone wanting to use this plugin edit their theme's stylesheet to include the CSS classes.

echo "<link rel='stylesheet' type='text/css' href='".e_PLUGIN_ABS."wowrecruit_menu/wowrecruit.css' />";

?>