<?php

namespace OtherCode\ImgFly\Facades;

use Illuminate\Support\Facades\Facade;
use OtherCode\ImgFly\Contracts\ImgFlyContract;
use OtherCode\ImgFly\ImgFly;

class ImgFlyFacade extends Facade
{
    protected static function getFacadeAccessor(): ImgFlyContract
    {
        return new ImgFly();
    }

}
