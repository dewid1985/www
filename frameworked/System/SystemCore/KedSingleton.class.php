<?php
namespace System\SystemCore;

/**
 * Class KedSingleton
 * @package System\SystemCore
 */
class KedSingleton
{
    /**
     * @param $class
     * @return mixed
     */
    final public static function getInstance( $class )
    {
        return new $class();
    }
}