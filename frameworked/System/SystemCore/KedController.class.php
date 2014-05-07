<?php
namespace System\SystemCore;

/**
 * Базовый контроллер
 *
 * Class KedController
 * @package System\SystemCore
 */
abstract class KedController
{
    /**
     * Метод для получения контроллеров
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Базовый метдот инициализации методов загрзуки
     * Котролеров, Хелперов, Утилит, Бизнес Котроллеров
     * Моделей
     *
     * @return KedPrimaryBootstrap
     */
    public function load()
    {
        return KedSingleton::getInstance('KedPrimaryBootstrap');
    }
}