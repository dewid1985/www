<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.04.14
 * Time: 1:55
 */

namespace System\SystemCore;

/**
 * Class KedConfig
 * @package System\SystemCore
 */
class KedConfig extends FrameworkKed{

    /**
     * @var KedConfig
     */
    private static $config;

    /**
     * @var KedConfig
     */
    private static $configName;

    /**
     * @var KedConfig
     */
    private $config_array;


    /**
     * Загрузиить конфиг
     *
     * @param null $configName
     * @return KedConfig
     */
    public function loadConfig($configName = null)
    {
        self::$configName = $configName;

        if ($configName != null && self::$configName == null)
        {
            self::$configName = $configName;
        }
        if (self::$config == null)
        {
            self::$config = new self();
        }
        return self::$config;
    }

    /**
     * Получение всего кофига
     *
     * @param null $configName
     * @return mixed
     */
    public function getConfig ($configName = null){
        if ($configName != null && self::$configName == null)
        {
            self::$configName = $configName;
        }
        $this->config_array = require(CONFPATH.self::$configName.'.config.php');
        return $this->config_array;
    }

    /**
     * Получение ключа из конфига
     *
     * @param $name
     * @param null $configName
     * @return mixed
     */
    public function configItem($name, $configName=null)
    {
        if ($configName != null && self::$configName == null)
        {
            self::$configName = $configName;
        }
        $this->config_array = require(CONFPATH.self::$configName.'.config.php');
        return $this->config_array[$name];
    }
}