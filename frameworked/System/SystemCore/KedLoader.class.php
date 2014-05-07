<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.04.14
 * Time: 2:33
 */

namespace System\SystemCore;

/**
 * Class KedLoader
 * @package System\SystemCore
 */
class KedLoader extends FrameworkKed {

    public function load(KedRouter $router )
    {
        if(file_exists(APP_CONTROLLERS_PATH.$router->getController().'.controller.php'))
        {
            include_once(APP_CONTROLLERS_PATH.$router->getController().'.controller.php');
            $class = $router->getController();
            var_dump($class::create()->index());
        }
    }
}