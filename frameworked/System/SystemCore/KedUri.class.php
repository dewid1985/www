<?php

namespace System\SystemCore;

/**
 * Класс для обработки текущего урла и получение из него соответствующий значений
 * Пример: KedUri::create()->getController()
 *
 * Class KedUri
 * @package System\SystemCore
 */
class KedUri extends FrameworkKed
{
    /** @var null KedUri */
    public static $urlController = null;

    /** @var null KedUri */
    public static $urlAction = null;

    /** @var array KedUri */
    public static $urlVariables = array();

    /** @var null KedUri */
    public static $urlCurrent = null;

    /** @var null KedUri */
    public static $url = null;

    /** @var array  */
    public $temporaryUri = array();

    /**
     * Инициализирую Урл
     *
     * @return KedUri
     */
    public function initUri()
    {
        static::$urlCurrent = explode('?',static::$urlCurrent);
        static::$urlCurrent = explode('/', static::$urlCurrent[0]);
        return $this;
    }

    /**
     * Устанановка Конроллера
     *
     * @return KedUri
     */
    public function setController()
    {
        unset(static::$urlCurrent[0]);
        if(!empty(static::$urlCurrent[1]))
        {
            static::$urlController = ucfirst(static::$urlCurrent[1]);
            unset(static::$urlCurrent[1]);
            return $this;
        }
        return $this;

    }

    /**
     * Установка Экшена
     *
     * @return KedUri
     */
    public function setAction()
    {
        if(!empty(static::$urlCurrent))
        {
           if(!empty(static::$urlCurrent[2]))
           {
               static::$urlAction = static::$urlCurrent[2];
           }
        }
        return $this;
    }


    /**
     * Установка аргументов Экшена
     *
     * @return KedUri
     */
    public function setVariables()
    {
        static::$urlVariables = static::$urlCurrent;
        return $this;
    }

    /**
     * Получение Контроллера
     *
     * @return string
     */
    public function getController()
    {
        return static::$urlController;
    }

    /**
     * Получение текущего урла
     * Данное значение постоянно меняется
     *
     * @return null
     */
    public function getCurrentUrl()
    {
        return static::$urlCurrent;
    }


    /**
     * Получение Экшена
     *
     * @return string
     */
    public function getAction()
    {
        return static::$urlAction;
    }

    /**
     * Получение УРЛ
     *
     * @return string
     */
    public function getUrl()
    {
        return static::$url;
    }


    /**
     * Получение аргументов Экшена
     *
     * @return array
     */
    public function getVariables()
    {
        return static::$urlVariables;
    }

    /**
     * Установка текущего урла для дальнейше обработки
     *
     * @return mixed
     */
    public function setUrl()
    {
        static::$urlCurrent = str_replace($_SERVER['SCRIPT_NAME'],"",$_SERVER['REQUEST_URI']);
        static::$url = static::$urlCurrent;
        return $this;
    }
}



