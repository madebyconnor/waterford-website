<?php

define("PERCH_DB_USERNAME", 'root');
define("PERCH_DB_PASSWORD", 'nodder1999to2012');
define("PERCH_DB_SERVER", "localhost");
define("PERCH_DB_DATABASE", "perch");
define("PERCH_DB_PREFIX", "perch2_");

define('PERCH_TZ', 'UTC');

define('PERCH_EMAIL_FROM', 'mail@nicolai.io');
define('PERCH_EMAIL_FROM_NAME', 'Nicolai Davies');

define('PERCH_LOGINPATH', '/perch');
define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');

define('PERCH_HTML5', true);
define('PERCH_DEBUG', true);

define('PERCH_CLEAN_RESOURCES', false);
