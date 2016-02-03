<?php
    define('PERCH_LICENSE_KEY', 'P21501-NPW305-HKK245-CEV619-HSS005');

    define("PERCH_DB_USERNAME", 'root');
    define("PERCH_DB_PASSWORD", 'root');
    define("PERCH_DB_SERVER", "localhost");
    define("PERCH_DB_DATABASE", "perch");
    define("PERCH_DB_PREFIX", "perch2_");
    
    define('PERCH_TZ', 'UTC');

    define('PERCH_EMAIL_FROM', 'connor.baer@me.com');
    define('PERCH_EMAIL_FROM_NAME', 'Connor Bär');

    define('PERCH_EMAIL_METHOD', 'smtp');
    define('PERCH_EMAIL_HOST', 'smtp.gmail.com');
    define('PERCH_EMAIL_AUTH', true);
    define('PERCH_EMAIL_SECURE', 'ssl');
    define('PERCH_EMAIL_PORT', 465);
    define('PERCH_EMAIL_USERNAME', 'forward1999to2012@gmail.com');
    define('PERCH_EMAIL_PASSWORD', 'nodder1999to2012');

    define('PERCH_LOGINPATH', '/perch');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    
    define('PERCH_HTML5', true);

    define('PERCH_CLEAN_RESOURCES', false);

    define('PERCH_PRODUCTION_MODE', 'PERCH_DEVELOPMENT');

    define('PERCH_YOUTUBE_API_KEY', 'AIzaSyC7ITSKAHIhNtK2uuZbuZClmSnJaEyMiBU');

?>
