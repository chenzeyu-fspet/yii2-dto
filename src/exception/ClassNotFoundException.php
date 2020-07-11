<?php

namespace yii\dto\exception;

use RuntimeException;

class ClassNotFoundException extends RuntimeException
{
    protected $statusCode = 500;

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        if (0 == $code) {
            $this->code = $this->statusCode;
        }
    }
}
