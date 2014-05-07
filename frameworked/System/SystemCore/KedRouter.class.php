<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13.04.14
 * Time: 21:11
 */

namespace System\SystemCore;

/**
 * Class KedRouter
 * @package System\SystemCore
 */
class KedRouter extends FrameworkKed{

    /**
     * @var KedUri $uri
     */
    public $uri;

    /**
     * @var KedConfig $config
     */
    public $config;

    /**
     * @var null $controller
     */
    public static $controller = null;

    /**
     * @var null $action
     */
    public static $action = null;

    /**
     * @var array $variables
     */
    public static $variables = array();


    /**
     * Установка конфига роутера /Application/ApplicationsConfigs/Router.config.php
     *
     * @param KedConfig $config
     * @return $this
     */
    public function setRouterConfig(KedConfig $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Установка роутера из урл
     *
     * @param KedUri $uri
     * @return $this
     */
    public function setRouterUri(KedUri $uri)
    {
        $this->uri = $uri->initUri();
        return $this;
    }

    /**
     * Инициализация Роутера
     *
     * @return $this
     */
    public function initRouter()
    {
        $this->uri->setController();
        $this->setController();
        $this->uri->setAction();
        $this->setAction();
        if(empty(static::$variables))
        {
            $this->uri->setVariables();
        }
        $this->setVariables(array(),false);
        return $this;
    }

    /**
     * Установка Контроллера
     *
     * @return $this|string
     */
    public function setController()
    {


        if($this->uri->getController()  == null)
        {
            return $this->setControllerDefault();
        }
        foreach($this->config->getConfig() as $key => $val)
        {
            if($key[0]=='/')
            {
                $key = substr($key,1);
            }
            $key= explode('/',$key);
            if($key[0]==$this->uri->getController())
            {
                return static::$controller = $val['Controller'];
            }
            return static::$controller = $this->uri->getController();
        }
    }

    /**
     * Установка метода вызова
     *
     * @return $this|string
     */
    public function setAction()
    {
        foreach($this->config->getConfig() as $key => $val)
        {
            if($key[0]=='/')
            {
                $key = substr($key,1);
            }
            $key= explode('/',$key);

            if(isset($key[1]))
            {
                if(preg_match('/:[a-zA-Z]+/',$key[1]))
                {
                    if(static::$controller == $val['Controller'])
                    {
                        static::$action = $val['Action'];
                        return $this->setVariables($val['Variables'],true);
                    }
                }
                if($this->uri->getAction() == null)
                {
                    return static::$action = 'index';
                }
                static::$action = $this->uri->getAction();
                unset(KedUri::$urlCurrent[2]);
                return $this;
            }
        }
    }

    /**
     * Установка переменных
     *
     * @param array $variables
     * @param bool $flag
     * @return $this
     */
    public function setVariables($variables = array(), $flag = false)
    {
        $this->uri->setVariables();
        static::$variables = $this->uri->getVariables();
        return $this;
    }

    /**
     * Валидация переменных
     */
    public function checkVariables()
    {

    }

    /**
     * Получение контроллера
     *
     * @return static $controller
     */
    public function getController()
    {
        return static::$controller;
    }


    /**
     * Получение метода
     *
     * @return static $action
     */
    public function getAction()
    {
        return static::$action;
    }

    /**
     * Получение переменных
     *
     * @return array static $variables
     */
    public function getVariables()
    {
        return static::$variables;
    }

    /**
     * Установка дефолтного контроллера
     *
     * @return $this
     */
    public function setControllerDefault()
    {
        static::$controller = $this->config->configItem('default')['Controller'];
        return $this;
    }

    /**
     * Установка дефолтного метода
     *
     * @return $this
     */
    public function setActionDefault()
    {
        static::$action = $this->config->configItem('default')['Action'];
        return $this;
    }
}