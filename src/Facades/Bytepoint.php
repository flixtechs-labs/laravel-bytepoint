<?php

namespace FlixtechsLabs\Bytepoint\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FlixtechsLabs\Bytepoint\Bytepoint
 */
class Bytepoint extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \FlixtechsLabs\Bytepoint\Bytepoint::class;
    }
}
