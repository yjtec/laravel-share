<?php

namespace Yjtec\LaravelShare\Resources;

use Illuminate\Http\Resources\Json\Resource as JsonResource;

class Resource extends JsonResource
{
    public function with($request)
    {
        return [
            'errcode' => 0,
            'errmsg' => '成功'
        ];
    }
}
