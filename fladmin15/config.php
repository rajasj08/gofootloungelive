<?php
// HTTP
//define('HTTP_SERVER', 'http://localhost/GitHub/gofootlounge/fladmin15/');
define('HTTP_SERVER', 'https://https://gofootlounge.in//fladmin15/');


//define('HTTP_CATALOG', 'http://localhost/GitHub/gofootlounge/');
define('HTTP_CATALOG', 'https://https://gofootlounge.in//');


//$documentRoot = $_SERVER['DOCUMENT_ROOT'].'GitHub/gofootlounge/';
$documentRoot = "/var/app/current/";

define('DOCUMENT_ROOT', $documentRoot); 

// HTTPS
//define('HTTPS_SERVER', 'http://localhost/GitHub/gofootlounge/fladmin15/');
define('HTTPS_SERVER', 'https://https://gofootlounge.in//fladmin15/');

//define('HTTPS_CATALOG', 'http://localhost/GitHub/gofootlounge/');
define('HTTPS_CATALOG', 'https://https://gofootlounge.in//');

// DIR
define('DIR_APPLICATION', $documentRoot. 'fladmin15/');
define('DIR_SYSTEM', $documentRoot. 'system/');
define('DIR_DATABASE', $documentRoot. 'system/database/');
define('DIR_LANGUAGE', $documentRoot. 'fladmin15/language/');
define('DIR_TEMPLATE', $documentRoot. 'fladmin15/view/template/');
define('DIR_CONFIG', $documentRoot. 'system/config/');
define('DIR_IMAGE', $documentRoot. 'image/');
define('DIR_CACHE', $documentRoot. 'system/cache/');
define('DIR_DOWNLOAD', $documentRoot. 'download/');
define('DIR_LOGS', $documentRoot. 'system/logs/');
define('DIR_CATALOG', $documentRoot. 'catalog/');

// DB

define('DB_DRIVER', 'mysql');
define('DB_HOSTNAME', 'aa7twz1l2thang.cvwrkeif9dtm.ap-south-1.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'Welcome!23');
define('DB_DATABASE', 'ebdb');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

/*define('DB_DRIVER', 'mysql');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'gofootlounge');
define('DB_PREFIX', 'oc_');*/
?>