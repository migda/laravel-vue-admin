<?php

namespace App\Http\Requests;

abstract class ApiRequest extends Request
{
    /**
     * Return json even if failed
     *
     * @return bool
     */
    public function wantsJson()
    {
        return true;
    }
}
