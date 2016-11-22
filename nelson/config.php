<?php

// Database Details
define('SERVERNAME','localhost');
define('DBUSERNAME','root');  // Replace root with your database username. If unsure, leave as is.
define('DBPASSWORD','root');	// Replace root with your database user password.
define('DBNAME','askhere'); 	//Create a new database askhere on your server and replace YOUR_DB with it's name

Define('ANSWERS_PER_PAGE','10');
define('QUESTIONS_PER_PAGE','10');

//if you want to enable production mode vs debug mode (useful for error reporting)
//Possible values 1 = true or 0 = false
define('DEBUG_MODE','1');

// If you want only logged in users to view the site
define('ALLOW_VISITORS','1');

// Do not change salt after users have registered
define('SALT','yoursecurestringoverhere');

// Set default timezone if you want or comment the line below
date_default_timezone_set("America/New_York");

// root folder then set
// define('BASE_DIR','');
define('BASE_DIR','');

// If URL-Rewriting does not work then set
// define('BASE_PATH',BASE_DIR.'/index.php');
// If URL-Rewriting works, then leave the line below as is
define('BASE_PATH',BASE_DIR);
