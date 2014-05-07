<?php

namespace System\SystemCore;

/**
 * Class FrameworkKed
 * @package System\SystemCore
 */
abstract class FrameworkKed
{
    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
} 