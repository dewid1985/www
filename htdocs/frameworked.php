<?php

/** Настройка ошибок */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/** Определение директорий фреймворка*/
define('FRAMPATH','..'.DIRECTORY_SEPARATOR.'frameworked'.DIRECTORY_SEPARATOR);
define('SYSPATH', FRAMPATH.'System'.DIRECTORY_SEPARATOR );
define('SYSCOREPATH', SYSPATH.'SystemCore'.DIRECTORY_SEPARATOR );

/** Определение деректорий приложения */
define('APPPATH', FRAMPATH.'Application'.DIRECTORY_SEPARATOR);
define('CONFPATH', APPPATH.'ApplicationsConfigs'.DIRECTORY_SEPARATOR);
define('CONTROLLER_PATH', APPPATH.'Controllers'.DIRECTORY_SEPARATOR);
define('APP_HELPERS_PATH_', APPPATH.'ApplicationsHelpers'.DIRECTORY_SEPARATOR);
define('APP_UTILS_PATH', APPPATH.'ApplicationsUtils'.DIRECTORY_SEPARATOR);
define('APP_BUSINESS_CONTROLLERS_PATH', APPPATH.'BusinessControllers'.DIRECTORY_SEPARATOR);
define('APP_CONTROLLERS_PATH', APPPATH.'Controllers'.DIRECTORY_SEPARATOR);
define('APP_MODELS_PATH', APPPATH.'Models'.DIRECTORY_SEPARATOR);


ini_set(
    'include_path', get_include_path() . PATH_SEPARATOR
    . CONFPATH . PATH_SEPARATOR
    . CONTROLLER_PATH . PATH_SEPARATOR
    . APP_BUSINESS_CONTROLLERS_PATH . PATH_SEPARATOR
    . APP_CONTROLLERS_PATH . PATH_SEPARATOR
    . APP_UTILS_PATH. PATH_SEPARATOR
    . APP_MODELS_PATH. PATH_SEPARATOR
);

require_once(SYSCOREPATH.'KedInit.class.php');

\System\SystemCore\KedInit::create()->load();




