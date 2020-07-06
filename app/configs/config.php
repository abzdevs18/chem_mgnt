
<?php
// DB params

//timezone is set to manila
date_default_timezone_set('Asia/Manila');
$date = Date("M. d, Y");
$time = date("h:i a");
$color = ['#283593','#4caf50','#424242','#424242','#455a64','#1b5e20'];

define('DEF_COLOR', $color);
define('DEF_TIME', $time);
define('DEF_DATE', $date);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'D3b1an!?');
define('DB_NAME', 'ch_mgnt');

// define('DB_HOST', '34.64.217.241');
// define('DB_USER', 'root');
// define('DB_PASS', 'D3b1an!?');
// define('DB_NAME', 'ch_mgnt');

//APP ROOT
define('APP_ROOT', dirname(dirname(__FILE__)));

//URL ROOT
define('URL_ROOT', '');

//SITE NAME
define('SITE_NAME', 'Chem Mngt. System');

//SALT
define('SECURE_SALT', 'k<UL?Gxr%6bTv[IX5h>s)vaEurK]4Sn');

?>