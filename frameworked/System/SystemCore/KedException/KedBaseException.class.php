<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.05.14
 * Time: 16:36
 */
namespace System\SystemCore\KedException;

class KedBaseException extends \Exception
{
    public function __toString()
    {
        return "[$this->message] in: \n" . $this->getTraceAsString();
    }
}