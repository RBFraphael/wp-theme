<?php

define("WPTHEME_PATH", get_template_directory());
define("WPTHEME_URL", get_template_directory_uri());
define("WPTHEME_VERSION", wp_get_theme()->get("Version"));
define("WPTHEME_TEXTDOMAIN", wp_get_theme()->get("TextDomain"));

include_once(WPTHEME_PATH . "/vendor/autoload.php");
\WpTheme\Main::Init();
