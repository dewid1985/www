<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06.04.14
 * Time: 14:00
 */

namespace System\SystemCore;

/**
 * Инициализатор Фреймворка
 *
 * Class kedInit
 * @package System\SystemCore
 */
class KedInit
{
    /**
     * @return KedInit
     */
    public static function create()
    {
        spl_autoload_register(array(__CLASS__, 'loaderFrameworkKedClass'));
        spl_autoload_register(array(__CLASS__, 'loaderFrameworkKedInterface'));
        return new self();
    }

    /**
     * Автозагрузчик классов
     *
     * @param $class
     */
    public static function loaderFrameworkKedClass($class)
    {
        $class = FRAMPATH . str_replace('\\', '/', $class) . '.class.php';
        if (file_exists($class)) {
            require($class);
        }
    }

    /**
     * Автозагрузчик интерфейсов
     *
     * @param $interface
     */
    public static function loaderFrameworkKedInterface($interface)
    {
        $interface = FRAMPATH . str_replace('\\', '/', $interface) . '.interface.php';
        if (file_exists($interface)) {
            require($interface);
        }
    }

    /**
     * Инициализирую загрузку
     */
    public function load()
    {
        KedLoader::create()
            ->load(
                KedRouter::create()
                    ->setRouterUri(
                        KedUri::create()
                            ->setUrl()
                    )
                    ->setRouterConfig(
                        KedConfig::create()
                            ->loadConfig('Router')
                    )
                    ->initRouter()
            );
    }
}