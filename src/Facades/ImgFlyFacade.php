<?php

namespace OtherCode\ImgFly\Facades;

use Illuminate\Support\Facades\Facade;
use OtherCode\ImgFly\ImgFly;

class ImgFlyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ImgFly::class;
    }

}
