<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function getPhotoAttribute()
    {
        return \Storage::disk('public')->url($this->path);
    }
}
