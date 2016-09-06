<?php

namespace Skyling\Alidayu\Facade;
use Illuminate\Support\Facades\Facade;

/**
 * User: Frank
 * Date: 2016/9/6
 * Time: 15:25
 */
class Alidayu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'alidayu';
    }
}