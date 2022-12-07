<?php

namespace App\Exceptions;

class AbyssException extends \Exception
{
    public function render()
    {
        $code = $this->getCode() ?? 400;
        return response()->json(["code" => $code, "message" => $this->getMessage()], $code);
    }
}
