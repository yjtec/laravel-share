<?php
namespace Yjtec\LaravelShare\Resources;

class Jsapi extends Resource
{
    public function toArray($request)
    {
        return [
            'timestamp' => $this['timestamp'],
            'nonceStr'  => $this['nonceStr'],
            'wxticket'  => $this['wxticket'],
            'signature' => $this['signature'],
            'appid'     => $this['appid'],
        ];
    }
}
