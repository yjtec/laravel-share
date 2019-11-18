<?php
namespace Yjtec\LaravelShare\Facades;
use Illuminate\Support\Facades\Facade;
class Share extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'share';
    }
}