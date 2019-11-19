<?php

namespace Yjtec\LaravelShare\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['type','title','desc','img','foreign_key','link'];

    public function getImgUrlAttribute(){
        $img = $this->attributes['img'];
        if($file = config('share.file')){ 
            return $this->attributes['img_url'] = $file::url($img);
        };
        return $this->attributes['img_url'] = \Storage::url($img);
    }
}
