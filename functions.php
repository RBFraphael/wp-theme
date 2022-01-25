<?php

define("STARTERTHEME_URL", get_template_directory_uri());
define("STARTERTHEME_PATH", get_template_directory());
define("STARTERTHEME_VERSION", "1.0.0");

include_once(STARTERTHEME_PATH."/includes/bootstrap.php");
new StarterTheme();

?>