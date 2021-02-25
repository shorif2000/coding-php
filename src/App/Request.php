<?php

namespace App;

use Exception;

class Request
{
    private array $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function get(int $paramPosition): string
    {
        if ($paramPosition >= count($this->params)) {
            if(in_array($paramPosition,[2,3]))
            {
                return '';
            }
            throw new Exception('Requested param at non-existent position');
        }

        return $this->params[$paramPosition];
    }
}
